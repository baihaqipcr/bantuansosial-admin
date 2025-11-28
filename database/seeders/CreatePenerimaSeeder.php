<?php

namespace Database\Seeders;

use App\Models\Penerima;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'program_id' => 1,
                'warga_id'   => 21,
                'keterangan' => 'Penerima bantuan tahap pertama',
            ],
            [
                'program_id' => 2,
                'warga_id'   => 22,
                'keterangan' => 'Diprioritaskan karena kondisi ekonomi',
            ],
            [
                'program_id' => 3,
                'warga_id'   => 23,
                'keterangan' => 'Sedang proses verifikasi akhir',
            ],
            [
                'program_id' => 1,
                'warga_id'   => 24,
                'keterangan' => 'Bantuan sudah disalurkan',
            ],
            [
                'program_id' => 2,
                'warga_id'   => 25,
                'keterangan' => 'Menunggu konfirmasi penerimaan',
            ],
        ];

        Penerima::insert($data);
    }
}
