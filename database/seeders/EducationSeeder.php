<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'SD/Sederajat',
            'SMP/Sederajat',
            'SMA/Sederajat',
            'D1',
            'D2',
            'D3',
            'D4/S1',
            'S2',
            'S3',
            'Tidak Bersekolah',
            'Lainnya',
        ];
        foreach ($items as $item) {
            Education::create(['name' => $item]);
        }
    }
}
