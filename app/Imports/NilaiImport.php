<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToCollection, WithHeadingRow
{
    public function collection($rows)
    {
        foreach ($rows as $row) {

            if (empty($row['nisn'])) {
                continue;
            }

            $student = Student::where('nisn', $row['nisn'])
                ->whereHas('registration', function ($q) {
                    $q->where('status_verifikasi', 'Disetujui');
                })
                ->whereHas('testPractice')
                ->whereHas('testWritten')
                ->first();

            if (!$student) {
                continue;
            }

            if ($row['nilai_praktik'] === null || $row['nilai_tertulis'] === null) {
                continue;
            }

            $nilaiPraktik = (int) $row['nilai_praktik'];
            $nilaiTertulis = (int) $row['nilai_tertulis'];

            $student->testPractice->update([
                'score' => $nilaiPraktik
            ]);

            $student->testWritten->update([
                'score' => $nilaiTertulis
            ]);
        }
    }
}
