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
        $faker = Faker::create('id_ID');

        /**
         * 🔹 JIKA PENDAFTAR KOSONG → BUAT DUMMY
         */
        if (Pendaftar::count() === 0) {
            $this->command->warn('⚠️ Tabel pendaftar kosong, membuat data dummy...');

            for ($i = 1; $i <= 5; $i++) {
                Pendaftar::create([
                    'program_id' => rand(1, 3)
                ]);
            }
        }

        /**
         * 🔹 AMBIL SEMUA ID PENDAFTAR
         */
        $pendaftarIds = Pendaftar::pluck('pendaftar_id');

        foreach ($pendaftarIds as $id) {
            VerifikasiLapangan::create([
                'pendaftar_id'       => $id,
                'petugas'            => $faker->name(),
                'nama_pelanggan'     => $faker->name(),
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

        $this->command->info('✅ Seeder Verifikasi Lapangan berhasil (auto-create pendaftar)');
    }
}
