<?php

namespace Database\Seeders;

use App\Models\Funder;
use Illuminate\Database\Seeder;

class FunderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Orang Tua',
            'Wali/Orang Tua Asuh',
            'Tanggungan Sendiri',
        ];
        foreach ($items as $item) {
            Funder::create(['name' => $item]);
        }
    }
}
