<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
    $faker = \Faker\Factory::create('id_ID');

    foreach (range(1, 100) as $index) {
    DB::table('pelanggan')->insert([
        'nama_awal_penerima'   => $faker->firstName,                  // Nama depan Indonesia
        'nama_akhir_penerima'  => $faker->lastName,                   // Nama belakang Indonesia
        'tgl_lahir'            => $faker->date('Y-m-d', '2005-12-31'),
        'kelamin'              => $faker->randomElement(['Laki-laki', 'Perempuan']),
        'email'                => $faker->unique()->safeEmail,
        'no_tlp'               => $faker->numerify('08##########'),   // Nomor Indonesia
        'role'                 => $faker->randomElement(['Administrator', 'Member', 'Mitra']),
        'created_at'           => now(),
        'updated_at'           => now(),
    ]);
    }
}
}
