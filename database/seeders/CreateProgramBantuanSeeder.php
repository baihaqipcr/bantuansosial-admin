<?php

namespace Database\Seeders;

use App\Models\ProgramBantuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProgramBantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode'         => 'PRG-001',
                'nama_program' => 'Bantuan Pendidikan',
                'tahun'        => 2024,
                'deskripsi'    => 'Program bantuan pendidikan untuk warga kurang mampu.',
                'anggaran'     => 50000000,
            ],
            [
                'kode'         => 'PRG-002',
                'nama_program' => 'Bantuan Kesehatan',
                'tahun'        => 2024,
                'deskripsi'    => 'Program bantuan kesehatan berupa pemeriksaan gratis.',
                'anggaran'     => 25000000,
            ],
            [
                'kode'         => 'PRG-003',
                'nama_program' => 'Bantuan Modal UMKM',
                'tahun'        => 2023,
                'deskripsi'    => 'Pemberian modal usaha bagi pelaku UMKM pemula.',
                'anggaran'     => 75000000,
            ],
            [
                'kode'         => 'PRG-004',
                'nama_program' => 'Perbaikan Rumah Tidak Layak Huni',
                'tahun'        => 2023,
                'deskripsi'    => 'Renovasi rumah warga yang tidak layak huni.',
                'anggaran'     => 120000000,
            ],
            [
                'kode'         => 'PRG-005',
                'nama_program' => 'Pelatihan Keterampilan Kerja',
                'tahun'        => 2024,
                'deskripsi'    => 'Pelatihan kerja untuk meningkatkan skill tenaga kerja muda.',
                'anggaran'     => 30000000,
            ],
        ];

        ProgramBantuan::insert($data);
    }
}
