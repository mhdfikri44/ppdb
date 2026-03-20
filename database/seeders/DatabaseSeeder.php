<?php

namespace Database\Seeders;

use App\Models\Guardian;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            OccupationSeeder::class,
            ReligionSeeder::class,
            EducationSeeder::class,
            TestSeeder::class,
        ]);

        // $distributions = [
        //     'draft' => 20,
        //     'isiData' => 20,
        //     'lengkap' => 30,
        //     'disetujui' => 20,
        //     'ditolak' => 10,
        // ];

        // foreach ($distributions as $state => $count) {
        //     Student::factory($count)
        //         ->has(Guardian::factory(), 'guardian')
        //         ->has(Registration::factory()->$state(), 'registration')
        //         ->create();
        // }

        $students = Student::factory(50)
            ->has(Guardian::factory(), 'guardian')
            ->has(Registration::factory()->isiData(), 'registration')
            ->create();

        $students->each(function ($student) {
            $student->registration->generateNoPendaftaran();
        });
    }
}
