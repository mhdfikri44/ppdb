<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JadwalTemplateExport implements
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
            ->get()
            ->map(function ($item) {
                return [
                    'no_pendaftaran' => $item->registration->no_pendaftaran,
                    'nisn' => $item->nisn,
                    'nama_lengkap' => $item->nama_lengkap,
                    'tanggal' => '',
                    'jam' => '',
                    'lokasi' => '',
                ];
            });

        $this->rowCount = $data->count() + 1; // +1 untuk header
        return $data;
    }

    public function headings(): array
    {
        return [
            'no_pendaftaran',
            'nisn',
            'nama_lengkap',
            'tanggal',
            'jam',
            'lokasi',
        ];
    }

    // Semua kolom TEXT
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
        ];
    }

    // Lebar kolom
    public function columnWidths(): array
    {
        return [
            'A' => 20, // no_pendaftaran
            'B' => 20, // nisn
            'C' => 40, // nama_lengkap
            'D' => 20, // tanggal
            'E' => 20, // jam
            'F' => 20, // lokasi
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Tinggi header
        $sheet->getRowDimension(1)->setRowHeight(30);

        // Header
        $sheet->getStyle('A1:F1')->applyFromArray([
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
        $sheet->getStyle('A1:F' . $this->rowCount)
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                    ],
                ],
            ]);

        // Align center kolom A - F
        $sheet->getStyle('A1:F' . $this->rowCount)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        // Override kolom nama_lengkap jadi rata kiri
        $sheet->getStyle('C2:C' . $this->rowCount)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Warna untuk kolom protected (no_pendaftaran, nisn, nama_lengkap, tanpa header)
        $sheet->getStyle('A2:C' . $this->rowCount)
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
                $sheet->getStyle('A1:F' . $this->rowCount)
                    ->getProtection()
                    ->setLocked(true);

                // Unlock kolom input
                $sheet->getStyle('D2:F' . $this->rowCount)
                    ->getProtection()
                    ->setLocked(false);

                // Aktifkan proteksi + password
                $sheet->getProtection()->setPassword('#12345');
                $sheet->getProtection()->setSheet(true);
            }
        ];
    }
}
