<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToCollection, WithHeadingRow
{
    public $total = 0;
    public $success = 0;
    public $failed = 0;
    public $errors = [];

    public function collection($rows)
    {
        $this->total = count($rows);

        foreach ($rows as $index => $row) {
            $nisn = (string) $row['nisn'];

            if (empty($nisn)) {
                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . " : NISN kosong";
                continue;
            }

            $student = Student::where('nisn', $nisn)
                ->whereHas('registration', function ($q) {
                    $q->where('status_verifikasi', 'Disetujui');
                })
                ->whereHas('testPractice')
                ->whereHas('testWritten')
                ->first();

            if (!$student) {
                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . " : NISN $nisn tidak ditemukan";
                continue;
            }

            if ($row['nilai_praktik'] === null || $row['nilai_tertulis'] === null) {
                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . " : Nilai tidak lengkap";
                continue;
            }

            if ($row['nilai_praktik'] < 0 || $row['nilai_praktik'] > 100) {
                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . ": Nilai praktik antara 0 - 100";
                continue;
            }
            if ($row['nilai_tertulis'] < 0 || $row['nilai_tertulis'] > 100) {
                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . ": Nilai tertulis antara 0 - 100";
                continue;
            }

            try {
                $nilaiPraktik = (int) $row['nilai_praktik'];
                $nilaiTertulis = (int) $row['nilai_tertulis'];

                $student->testPractice->update([
                    'score' => $nilaiPraktik
                ]);

                $student->testWritten->update([
                    'score' => $nilaiTertulis
                ]);

                $this->success++;
            } catch (\Exception $e) {
                Log::error('Import nilai gagal', [
                    'row' => $row,
                    'error' => $e->getMessage()
                ]);

                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . ": Gagal simpan";
            }
        }
    }
}
