<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\TestPractice;
use App\Models\TestWritten;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use function Livewire\str;

class JadwalImport implements ToCollection, WithHeadingRow
{
    protected $type;
    public $total = 0;
    public $success = 0;
    public $failed = 0;
    public $errors = [];

    public function __construct($type)
    {
        $this->type = $type;
    }

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
                })->first();

            if (!$student) {
                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . " : NISN $nisn tidak ditemukan";
                continue;
            }

            if (!$row['tanggal'] || !$row['jam'] || !$row['lokasi']) {
                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . " : Data tidak lengkap";
                continue;
            }

            try {
                $model = $this->type === 'praktik'
                    ? new TestPractice()
                    : new TestWritten();

                $model::updateOrCreate(
                    ['student_id' => $student->id],
                    [
                        'tanggal' => $row['tanggal'],
                        'jam' => $row['jam'],
                        'lokasi' => $row['lokasi'],
                    ]
                );

                $this->success++;
            } catch (\Exception $e) {
                Log::error('Import gagal', [
                    'row' => $row,
                    'error' => $e->getMessage()
                ]);

                $this->failed++;
                $this->errors[] = "Baris " . ($index + 1) . ": Gagal simpan";
            }
        }
    }
}
