<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NilaiTemplateExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    WithColumnFormatting,
    WithColumnWidths,
    WithEvents
{
    protected $rowCount;

    public function collection()
    {
        $data = Student::whereHas('registration', function ($q) {
            $q->where('status_verifikasi', 'Disetujui');
        })
            ->whereHas('testPractice')
            ->whereHas('testWritten')
            ->with(['testPractice', 'testWritten'])
            ->get()
            ->map(function ($item) {
                return [
                    'nisn' => $item->nisn,
                    'nama_lengkap' => $item->nama_lengkap,
                    'nilai_praktik' => '',
                    'nilai_tertulis' => '',
                ];
            });

        $this->rowCount = $data->count() + 1; // +1 untuk header
        return $data;
    }

    public function headings(): array
    {
        return [
            'nisn',
            'nama_lengkap',
            'nilai_praktik',
            'nilai_tertulis',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_NUMBER,
            'D' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 40,
            'C' => 20,
            'D' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Tinggi header
        $sheet->getRowDimension(1)->setRowHeight(30);

        // Header
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => 'B7DEE8'],
            ],
        ]);

        // Border hanya sampai data terakhir
        $sheet->getStyle('A1:D' . $this->rowCount)
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                    ],
                ],
            ]);

        // Align center kolom A - D
        $sheet->getStyle('A1:D' . $this->rowCount)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        // Override kolom B jadi rata kiri
        $sheet->getStyle('B2:B' . $this->rowCount)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Warna untuk kolom protected (A & B, tanpa header)
        $sheet->getStyle('A2:B' . $this->rowCount)
            ->applyFromArray([
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => 'D9D9D9'], // abu-abu
                ],
            ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                // Freeze header
                $sheet->freezePane('A2');

                // Lock semua cell
                $sheet->getStyle('A1:D' . $this->rowCount)
                    ->getProtection()
                    ->setLocked(true);

                // Unlock kolom input
                $sheet->getStyle('C2:D' . $this->rowCount)
                    ->getProtection()
                    ->setLocked(false);

                // Aktifkan proteksi + password
                $sheet->getProtection()->setPassword('#12345');
                $sheet->getProtection()->setSheet(true);
            }
        ];
    }
}
