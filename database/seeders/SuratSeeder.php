<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\Penduduk;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil sampel penduduk pertama dari database
        $warga1 = Penduduk::find(1);
        $warga2 = Penduduk::find(2);
        $warga3 = Penduduk::find(3);

        if ($warga1) {
            Surat::create([
                'nomor_surat' => '001/MK/2026',
                'jenis_surat' => 'Surat Keterangan Usaha (SKU)',
                'tanggal_ajuan' => '2026-05-15',
                'penduduk_id' => $warga1->id
            ]);
            Surat::create([
                'nomor_surat' => '002/MK/2026',
                'jenis_surat' => 'Surat Pengantar SKCK',
                'tanggal_ajuan' => '2026-05-18',
                'penduduk_id' => $warga1->id
            ]);
        }

        if ($warga2) {
            Surat::create([
                'nomor_surat' => '003/MK/2026',
                'jenis_surat' => 'Surat Keterangan Usaha (SKU)',
                'tanggal_ajuan' => '2026-07-15',
                'penduduk_id' => $warga2->id
            ]);
            Surat::create([
                'nomor_surat' => '004/MK/2026',
                'jenis_surat' => 'Surat Pengantar SKCK',
                'tanggal_ajuan' => '2026-05-20',
                'penduduk_id' => $warga2->id
            ]);
        }

        if ($warga3) {
            Surat::create([
                'nomor_surat' => '005/MK/2026',
                'jenis_surat' => 'Surat Keterangan Usaha (SKU)',
                'tanggal_ajuan' => '2026-04-15',
                'penduduk_id' => $warga3->id
            ]);
            Surat::create([
                'nomor_surat' => '006/MK/2026',
                'jenis_surat' => 'Surat Pengantar SKCK',
                'tanggal_ajuan' => '2026-05-08',
                'penduduk_id' => $warga3->id
            ]);
        }
    }
}
