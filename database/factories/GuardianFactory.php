<?php

namespace Database\Factories;

use App\Models\Education;
use App\Models\Occupation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // // ===== AYAH =====
            // 'nama_ayah' => fake()->name('male'),
            // 'nik_ayah' => str_pad(fake()->numberBetween(0, 9999999999), 16, '0', STR_PAD_LEFT),
            // 'tempat_lahir_ayah' => fake()->city(),
            // 'tanggal_lahir_ayah' => fake()->date(),
            // 'father_education_id' => Education::inRandomOrder()->value('id'),
            // 'father_occupation_id' => Occupation::inRandomOrder()->value('id'),
            // 'penghasilan_ayah' => fake()->numberBetween(500000, 10000000),
            // 'hp_ayah' => fake()->phoneNumber(),
            // 'keterangan_ayah' => fake()->randomElement(['Hidup', 'Meninggal']),

            // // ===== IBU =====
            // 'nama_ibu' => fake()->name('female'),
            // 'nik_ibu' => str_pad(fake()->numberBetween(0, 9999999999), 16, '0', STR_PAD_LEFT),
            // 'tempat_lahir_ibu' => fake()->city(),
            // 'tanggal_lahir_ibu' => fake()->date(),
            // 'mother_education_id' => Education::inRandomOrder()->value('id'),
            // 'mother_occupation_id' => Occupation::inRandomOrder()->value('id'),
            // 'penghasilan_ibu' => fake()->numberBetween(500000, 10000000),
            // 'hp_ibu' => fake()->phoneNumber(),
            // 'keterangan_ibu' => fake()->randomElement(['Hidup', 'Meninggal']),
        ];
    }
}
