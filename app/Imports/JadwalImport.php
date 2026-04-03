<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\TestPractice;
use App\Models\TestWritten;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JadwalImport implements ToCollection, WithHeadingRow
{
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function collection($rows)
    {
        foreach ($rows as $row) {

            if (empty($row['nisn'])) {
                continue;
            }

            $student = Student::where('nisn', $row['nisn'])
                ->whereHas('registration', function ($q) {
                    $q->where('status_verifikasi', 'Disetujui');
                })->first();

            if (!$student) {
                // Log::warning('Calon siswa tidak ditemukan saat import jadwal', [
                //     'nisn' => $row['nisn']
                // ]);
                continue;
            }

            if (!$row['tanggal'] || !$row['jam'] || !$row['lokasi']) {
                // throw new \Exception("Data jadwal tidak lengkap di NISN: " . $row['nisn']);
                continue;
            }

            $model = $this->type === 'praktik'
                ? new TestPractice()
                : new TestWritten();

            $model::updateOrCreate(
                [
                    'student_id' => $student->id,
                ],
                [
                    'tanggal' => $row['tanggal'] ?? '-',
                    'jam' => $row['jam'] ?? '-',
                    'lokasi' => $row['lokasi'] ?? '-',
                ]
            );
        }
    }
}
