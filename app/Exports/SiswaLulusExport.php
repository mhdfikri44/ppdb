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
use PhpOffice\PhpSpreadsheet\Shared\Date;
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
            'registration',
            'guardian',
            'guardian.fatherEducation',
            'guardian.fatherJob',
            'guardian.fatherStatus',
            'guardian.motherEducation',
            'guardian.motherJob',
            'guardian.motherStatus',
            'guardian.waliEducation',
            'guardian.waliJob',
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
            'Anak Yatim',

            'Nama Ayah',
            'NIK Ayah',
            'Tempat Lahir Ayah',
            'Tanggal Lahir Ayah',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
            'HP Ayah',
            'Status Ayah',

            'Nama Ibu',
            'NIK Ibu',
            'Tempat Lahir Ibu',
            'Tanggal Lahir Ibu',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            'HP Ibu',
            'Status Ibu',

            'Nama Wali',
            'NIK Wali',
            'Tempat Lahir Wali',
            'Tanggal Lahir Wali',
            'Pendidikan Wali',
            'Pekerjaan Wali',
            'Penghasilan Wali',
            'HP Wali',
        ];
    }

    public function map($student): array
    {
        return [
            $this->no++,
            $student->nisn,
            $student->nama_lengkap,
            $student->nik,
            $student->tempat_lahir,
            Date::stringToExcel($student->tanggal_lahir),
            $student->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
            $student->religion?->name,
            $student->hobby?->name,
            $student->dream?->name,
            $student->funder?->name,
            $student->houseStatus?->name,
            $student->tahun_lulus,
            $student->asal_sekolah,
            $student->alamat_asal_sekolah,
            $student->prestasi,
            $student->penyakit,
            $student->no_kip_pkh_kks_kps,
            $student->no_kk,
            $student->alamat,
            $student->anak_keberapa,
            $student->jumlah_saudara,
            $student->transportasi,
            $student->jarak_tempuh . ' km',
            $student->waktu_tempuh . ' menit',
            $student->guardian?->fatherStatus?->name == "Sudah Meninggal" ? 'Yatim' : '',

            $student->guardian?->nama_ayah,
            $student->guardian?->nik_ayah,
            $student->guardian?->tempat_lahir_ayah,
            Date::stringToExcel($student->guardian?->tanggal_lahir_ayah),
            $student->guardian?->fatherEducation?->name,
            $student->guardian?->fatherJob?->name,
            $student->guardian?->penghasilan_ayah,
            $student->guardian?->hp_ayah,
            $student->guardian?->fatherStatus?->name,

            $student->guardian?->nama_ibu,
            $student->guardian?->nik_ibu,
            $student->guardian?->tempat_lahir_ibu,
            Date::stringToExcel($student->guardian?->tanggal_lahir_ibu),
            $student->guardian?->motherEducation?->name,
            $student->guardian?->motherJob?->name,
            $student->guardian?->penghasilan_ibu,
            $student->guardian?->hp_ibu,
            $student->guardian?->motherStatus?->name,

            $student->guardian?->nama_wali,
            $student->guardian?->nik_wali,
            $student->guardian?->tempat_lahir_wali,
            Date::stringToExcel($student->guardian?->tanggal_lahir_wali),
            $student->guardian?->waliEducation?->name,
            $student->guardian?->waliJob?->name,
            $student->guardian?->penghasilan_wali,
            $student->guardian?->hp_wali,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (in_array($cell->getColumn(), ['B', 'D', 'R', 'S', 'AB', 'AH', 'AK', 'AQ', 'AT', 'AZ'])) {
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
            'AB' => NumberFormat::FORMAT_TEXT,
            'AH' => NumberFormat::FORMAT_TEXT,
            'AK' => NumberFormat::FORMAT_TEXT,
            'AQ' => NumberFormat::FORMAT_TEXT,
            'AT' => NumberFormat::FORMAT_TEXT,
            'AZ' => NumberFormat::FORMAT_TEXT,

            'F'  => 'dd mmmm yyyy',
            'AD' => 'dd mmmm yyyy',
            'AM' => 'dd mmmm yyyy',
            'AV' => 'dd mmmm yyyy',

            'AG' => '_-Rp* #,##0_-',
            'AP' => '_-Rp* #,##0_-',
            'AY' => '_-Rp* #,##0_-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // Tinggi header
        $sheet->getRowDimension(1)->setRowHeight(30);

        // Header
        $sheet->getStyle('A1:AZ1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => 'B7DEE8'],
            ],
        ]);

        // Alignment
        $sheet->getStyle("A1:AZ{$lastRow}")->getAlignment()->setHorizontal('center')->setVertical('center');
        $sheet->getStyle("C2:C{$lastRow}")->getAlignment()->setHorizontal('left');
        $sheet->getStyle("O2:O{$lastRow}")->getAlignment()->setHorizontal('left');
        $sheet->getStyle("T2:T{$lastRow}")->getAlignment()->setHorizontal('left');
        $sheet->getStyle("AA2:AA{$lastRow}")->getAlignment()->setHorizontal('left');
        $sheet->getStyle("AJ2:AJ{$lastRow}")->getAlignment()->setHorizontal('left');

        // Border semua data
        $sheet->getStyle("A1:AZ{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                ],
            ],
        ]);
    }
}
