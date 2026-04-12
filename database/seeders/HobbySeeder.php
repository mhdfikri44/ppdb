<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Olahraga',
            'Kesenian',
            'Membaca',
            'Menulis',
            'Jalan-jalan',
            'Lainnya'
        ];
        foreach ($items as $item) {
            Hobby::create(['name' => $item]);
        }
    }
}
