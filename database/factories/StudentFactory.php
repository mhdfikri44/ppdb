<?php

namespace Database\Factories;

use App\Models\Religion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => str_pad(fake()->numberBetween(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'nama_lengkap' => fake()->name(),
            'password' => Hash::make(fake()->word()),

            'nik' => str_pad(fake()->numberBetween(0, 9999999999), 16, '0', STR_PAD_LEFT),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'religion_id' => Religion::inRandomOrder()->value('id'),

            'hobi' => fake()->word(),
            'cita_cita' => fake()->jobTitle(),
            'prestasi' => fake()->sentence(),
            'penyakit' => fake()->word(),

            'anak_keberapa' => fake()->numberBetween(1, 5),
            'jumlah_saudara' => fake()->numberBetween(0, 5),
            'tempat_tinggal' => fake()->randomElement(['Orang Tua', 'Wali', 'Asrama']),
            'transportasi' => fake()->randomElement(['Jalan Kaki', 'Sepeda', 'Motor', 'Mobil']),
            'jarak_tempuh' => fake()->randomFloat(2, 0, 20),
            'waktu_tempuh' => fake()->numberBetween(10, 60),

            'no_kk' => str_pad(fake()->numberBetween(0, 9999999999), 16, '0', STR_PAD_LEFT),
            'no_kip_pkh_kks_kps' => str_pad(fake()->numberBetween(0, 9999999999), 10, '0', STR_PAD_LEFT),

            'tahun_lulus' => fake()->year(),
            'asal_sekolah' => fake()->company() . ' School',
            'alamat_asal_sekolah' => fake()->address(),
        ];
    }
}
