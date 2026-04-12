<?php

namespace Database\Seeders;

use App\Models\Dream;
use Illuminate\Database\Seeder;

class DreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'PNS',
            'TNI/Polri',
            'Guru/Dosen',
            'Pegawai Swasta',
            'Dokter',
            'Politikus',
            'Wiraswasta',
            'Seniman/Artis',
            'Ilmuwan',
            'Agamawan',
        ];
        foreach ($items as $item) {
            Dream::create(['name' => $item]);
        }
    }
}
