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
            SettingSeeder::class,
            AdminSeeder::class,
            OccupationSeeder::class,
            ReligionSeeder::class,
            EducationSeeder::class,
            FunderSeeder::class,
            StatusSeeder::class,
            HouseStatusSeeder::class,
            HobbySeeder::class,
            DreamSeeder::class,
        ]);

        Student::factory(10)
            ->has(Guardian::factory(), 'guardian')
            ->has(Registration::factory(), 'registration')
            ->create();
    }
}
