<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('#superAdmin'),
            'role' => 'superadmin',
        ]);

        Admin::create([
            'name' => 'Sri Wahyuningsih',
            'email' => 'panitia1@gmail.com',
            'password' => Hash::make('panitia123'),
            'role' => 'admin',
        ]);

        Admin::create([
            'name' => 'Sari Duma',
            'email' => 'panitia2@gmail.com',
            'password' => Hash::make('panitia123'),
            'role' => 'admin',
        ]);
    }
}
