<?php

namespace Database\Seeders;

use App\Models\HouseStatus;
use Illuminate\Database\Seeder;

class HouseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Milik Sendiri',
            'Rumah Orang Tua',
            'Rumah Saudara/Kerabat',
            'Rumah Dinas',
            'Sewa/kontrak',
            'Lainnya'
        ];
        foreach ($items as $item) {
            HouseStatus::create(['name' => $item]);
        }
    }
}
