<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::create([
            'name' => 'Tes Praktik',
            'test_date' => '2023-08-12',
            'start_time' => '08:00:00',
            'duration' => 120,
        ]);

        Test::create([
            'name' => 'Tes Tertulis',
            'test_date' => '2023-08-10',
            'start_time' => '08:00:00',
            'duration' => 90,
        ]);
    }
}
