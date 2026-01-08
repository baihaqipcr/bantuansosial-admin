<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use App\Models\VerifikasiLapangan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VerifikasiLapanganSeeder extends Seeder
{
    public function run(): void
    {
        // Faker Indonesia
        $faker = Faker::create('id_ID');

        $pendaftarIds = Pendaftar::pluck('pendaftar_id');

        if ($pendaftarIds->isEmpty()) {
            $this->command->error('❌ Tabel pendaftar masih kosong!');
            return;
        }

        foreach ($pendaftarIds as $id) {
            VerifikasiLapangan::create([
                'pendaftar_id'       => $id,
                'nama_pelanggan'     => $faker->name(),
                'petugas'            => $faker->name(),
                'tanggal_verifikasi' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'catatan'            => $faker->randomElement([
                    'Data sesuai dengan kondisi di lapangan.',
                    'Rumah layak huni dan sesuai kriteria.',
                    'Perlu verifikasi lanjutan dari kelurahan.',
                    'Ditemukan ketidaksesuaian data ringan.',
                    'Kondisi ekonomi sesuai dengan pengajuan.',
                ]),
                'skor'               => $faker->numberBetween(65, 100),
                'foto_verifikasi'    => null,
            ]);
        }

        $this->command->info('✅ Seeder Verifikasi Lapangan (Indonesia) berhasil dijalankan.');
    }
}
