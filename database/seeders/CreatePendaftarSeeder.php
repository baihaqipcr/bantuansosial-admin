<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['program_id' => 1, 'warga_id' => 10, 'keterangan' => 'Pendaftar tahap pertama'],
            ['program_id' => 2, 'warga_id' => 11, 'keterangan' => 'Mengajukan bantuan untuk kebutuhan mendesak'],
            ['program_id' => 1, 'warga_id' => 12, 'keterangan' => 'Verifikasi sedang diproses'],
            ['program_id' => 3, 'warga_id' => 13, 'keterangan' => 'Dokumen lengkap'],
            ['program_id' => 2, 'warga_id' => 14, 'keterangan' => 'Belum melengkapi persyaratan'],

            ['program_id' => 1, 'warga_id' => 15, 'keterangan' => 'Pendaftar baru'],
            ['program_id' => 2, 'warga_id' => 16, 'keterangan' => 'Sedang menunggu verifikasi'],
            ['program_id' => 3, 'warga_id' => 17, 'keterangan' => 'Dokumen belum lengkap'],
            ['program_id' => 1, 'warga_id' => 18, 'keterangan' => 'Survey lapangan dijadwalkan'],
            ['program_id' => 2, 'warga_id' => 19, 'keterangan' => 'Penerima terpilih'],

            ['program_id' => 3, 'warga_id' => 20, 'keterangan' => 'Masih dalam antrian'],
            ['program_id' => 1, 'warga_id' => 21, 'keterangan' => 'Pendaftar tahap kedua'],
            ['program_id' => 2, 'warga_id' => 22, 'keterangan' => 'Pengajuan ulang'],
            ['program_id' => 1, 'warga_id' => 23, 'keterangan' => 'Verifikasi lapangan selesai'],
            ['program_id' => 3, 'warga_id' => 24, 'keterangan' => 'Butuh melengkapi dokumen tambahan'],

            ['program_id' => 1, 'warga_id' => 25, 'keterangan' => 'Pendaftar kategori prioritas'],
            ['program_id' => 2, 'warga_id' => 26, 'keterangan' => 'Menunggu persetujuan camat'],
            ['program_id' => 3, 'warga_id' => 27, 'keterangan' => 'Berhasil diverifikasi'],
            ['program_id' => 1, 'warga_id' => 28, 'keterangan' => 'Survey lanjutan diperlukan'],
            ['program_id' => 2, 'warga_id' => 29, 'keterangan' => 'Menunggu hasil survey'],

            ['program_id' => 3, 'warga_id' => 30, 'keterangan' => 'Pemeriksaan dokumen'],
            ['program_id' => 1, 'warga_id' => 31, 'keterangan' => 'Pendaftar rekomendasi RT'],
            ['program_id' => 2, 'warga_id' => 32, 'keterangan' => 'Pengajuan mendadak'],
            ['program_id' => 3, 'warga_id' => 33, 'keterangan' => 'Dokumen rusak'],
            ['program_id' => 1, 'warga_id' => 34, 'keterangan' => 'Verifikasi ulang dibutuhkan'],

            ['program_id' => 2, 'warga_id' => 35, 'keterangan' => 'Antrian panjang'],
            ['program_id' => 1, 'warga_id' => 36, 'keterangan' => 'Pendaftar non prioritas'],
            ['program_id' => 3, 'warga_id' => 37, 'keterangan' => 'Dokumen diterima'],
            ['program_id' => 2, 'warga_id' => 38, 'keterangan' => 'Penerima cadangan'],
            ['program_id' => 1, 'warga_id' => 39, 'keterangan' => 'Survey belum dijadwalkan'],

            // 60 more generated data
        ];

        for ($i = 40; $i <= 109; $i++) {
            $data[] = [
                'program_id' => rand(1, 3),
                'warga_id' => $i,
                'keterangan' => [
                    'Pendaftar tahap awal',
                    'Menunggu verifikasi',
                    'Dokumen lengkap',
                    'Dokumen belum lengkap',
                    'Survey lapangan diperlukan',
                    'Belum memenuhi syarat',
                    'Penerima sementara',
                    'Dalam antrian proses',
                    'Pengajuan baru',
                    'Pengajuan ditinjau ulang',
                    'Sedang diproses'
                ][array_rand([
                    'Pendaftar tahap awal',
                    'Menunggu verifikasi',
                    'Dokumen lengkap',
                    'Dokumen belum lengkap',
                    'Survey lapangan diperlukan',
                    'Belum memenuhi syarat',
                    'Penerima sementara',
                    'Dalam antrian proses',
                    'Pengajuan baru',
                    'Pengajuan ditinjau ulang',
                    'Sedang diproses'
                ])]
            ];
        }
    }
}
