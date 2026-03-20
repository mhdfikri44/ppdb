<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Islam',
            'Kristen Protestan',
            'Katolik',
            'Hindu',
            'Buddha',
            'Khonghucu'
        ];
        foreach ($items as $item) {
            Religion::create(['name' => $item]);
        }
    }
}
