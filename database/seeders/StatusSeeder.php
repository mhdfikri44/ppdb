<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Masih Hidup',
            'Sudah Meninggal',
            'Tidak Diketahui'
        ];
        foreach ($items as $item) {
            Status::create(['name' => $item]);
        }
    }
}
