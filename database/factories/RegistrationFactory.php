<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition(): array
    // {
    //     $isLocked = fake()->boolean(30); // 30% kemungkinan terkunci
    //     $statusVerifikasi = fake()->randomElement(['Pending', 'Disetujui', 'Ditolak']);

    //     return [
    //         'no_pendaftaran' => fake()->unique()->bothify('P2026####'),

    //         'status_data' => fake()->boolean(80),
    //         'status_dokumen' => fake()->boolean(80),

    //         'is_locked' => $isLocked,
    //         'locked_at' => $isLocked ? now() : null,

    //         'status_verifikasi' => $statusVerifikasi,
    //         'rejected_message' => $statusVerifikasi === 'Ditolak'
    //             ? fake()->sentence()
    //             : null,

    //         'lulus' => $statusVerifikasi === 'Disetujui'
    //             ? fake()->boolean(70)
    //             : false,
    //     ];
    // }

    public function definition(): array
    {
        return [
            'no_pendaftaran' => null,
            'status_data' => false,
            'status_dokumen' => false,
            'is_locked' => false,
            'locked_at' => null,
            'status_verifikasi' => 'Pending',
            'rejected_message' => null,
            'lulus' => false,
        ];
    }

    // ====================
    // STATE
    // ====================

    // 1. Draft (baru daftar)
    public function draft()
    {
        return $this->state(fn() => [
            'status_data' => false,
            'status_dokumen' => false,
        ]);
    }

    // 2. Data sudah diisi (belum konfirmasi)
    public function isiData()
    {
        return $this->state(fn() => [
            'status_data' => true,
            'status_dokumen' => true,
        ]);
    }

    // 4. Disetujui (terverifikasi)
    public function disetujui()
    {
        return $this->state(fn() => [
            'no_pendaftaran' => fake()->unique()->bothify('P2026####'),
            'status_data' => true,
            'status_dokumen' => true,
            'is_locked' => true,
            'locked_at' => now(),
            'status_verifikasi' => 'Disetujui',
        ]);
    }

    // 5. Ditolak
    public function ditolak()
    {
        return $this->state(fn() => [
            'no_pendaftaran' => fake()->unique()->bothify('P2026####'),
            'status_data' => true,
            'status_dokumen' => true,
            'is_locked' => true,
            'locked_at' => now(),
            'status_verifikasi' => 'Ditolak',
            'rejected_message' => fake()->sentence(),
        ]);
    }
}
