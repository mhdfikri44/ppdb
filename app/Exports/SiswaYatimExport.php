<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaYatimExport implements FromCollection, WithHeadings, WithMapping
{
    protected $no = 1;

    public function collection()
    {
        return Student::with([
            'guardian',
            'registration'
        ])
            ->whereHas('registration', function ($query) {
                $query->where('lulus', 1);
            })
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'No Pendaftaran',
            'Nama Lengkap',
            'Status'
        ];
    }

    public function map($student): array
    {
        return [
            $this->no++,
            $student->registration->no_pendaftaran,
            $student->nama_lengkap,
            $student->guardian->fatherStatus->name = "Sudah Meninggal" ? "Yatim" : "-"
        ];
    }
}
