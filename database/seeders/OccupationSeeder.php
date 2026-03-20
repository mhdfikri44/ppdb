<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Tidak Bekerja',
            'Pensiunan',
            'PNS',
            'TNI/Polisi',
            'Guru/Dosen',
            'Pegawai Swasta',
            'Wiraswasta',
            'Pengacara/Jaksa/Hakim/Notaris',
            'Seniman/Pelukis/Artis/Sejenis',
            'Dokter/Bidan/Perawat',
            'Pilot/Pramugara',
            'Pedagang',
            'Petani/Peternak',
            'Nelayan',
            'Buruh (Tani/Pabrik/Bangunan)',
            'Sopir/Masinis/Kondektur',
            'Politikus',
            'Lainnya'
        ];
        foreach ($items as $item) {
            Occupation::create(['name' => $item]);
        }
    }
}
