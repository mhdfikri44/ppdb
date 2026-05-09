<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SiswaLulusExport extends DefaultValueBinder implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithColumnFormatting, WithCustomValueBinder
{
    protected $no = 1;

    public function collection()
    {
        return Student::with([
            'religion',
            'hobby',
            'dream',
            'funder',
            'houseStatus',
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
            'NISN',
            'Nama Lengkap',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Hobi',
            'Cita-cita',
            'Sumber Dana',
            'Status Rumah',
            'Tahun Lulus',
            'Asal Sekolah',
            'Alamat Sekolah',
            'Prestasi',
            'Penyakit',
            'No KIP/PKH/KKS/KPS',
            'No KK',
            'Alamat',
            'Anak Ke',
            'Jumlah Saudara',
            'Transportasi',
            'Jarak Tempuh',
            'Waktu Tempuh',
        ];
    }

    public function map($student): array
    {
        return [
            $this->no++, // A
            $student->nisn, // B
            $student->nama_lengkap, // C
            $student->nik, // D
            $student->tempat_lahir, // E
            $student->tanggal_lahir, // F
            $student->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan', // G
            $student->religion?->name, // H
            $student->hobby?->name, // I
            $student->dream?->name, // J
            $student->funder?->name, // K
            $student->houseStatus?->name, // L
            $student->tahun_lulus, // M
            $student->asal_sekolah, // N
            $student->alamat_asal_sekolah, // O
            $student->prestasi, // P
            $student->penyakit, // Q
            $student->no_kip_pkh_kks_kps, // R
            $student->no_kk, // S
            $student->alamat, // T
            $student->anak_keberapa, // U
            $student->jumlah_saudara, // V
            $student->transportasi, // W
            $student->jarak_tempuh, // X
            $student->waktu_tempuh, // Y
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (in_array($cell->getColumn(), ['B', 'D', 'R', 'S'])) {
            $cell->setValueExplicit((string) $value, DataType::TYPE_STRING);
            return true;
        }

        return parent::bindValue($cell, $value);
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'R' => NumberFormat::FORMAT_TEXT,
            'S' => NumberFormat::FORMAT_TEXT,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],

            "A" => [
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
        ];
    }
}
