<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penduduk;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penduduk::create([
            'nik' => '3758495300035413',
            'nama' => 'Budi Santoso',
            'jk' => 'L',
            'alamat' => 'Jl. Merdeka No.10 RT.01 RW.02'
        ]);

        Penduduk::create([
            'nik' => '9203495300035923',
            'nama' => 'Junamina',
            'jk' => 'P',
            'alamat' => 'Jl. Sakura No.2 RT.05 RW.02'
        ]);

        Penduduk::create([
            'nik' => '3558495301035234',
            'nama' => 'Lucas Saming',
            'jk' => 'L',
            'alamat' => 'Jl. Tanjung No.92 RT.01 RW.05'
        ]);
    }
}
