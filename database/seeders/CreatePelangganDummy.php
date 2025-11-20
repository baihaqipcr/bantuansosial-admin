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
    $faker = Factory::create();

    foreach (range(1, 100) as $index) {
        DB::table('pelanggan')->insert([
            'nama_awal_penerima' => $faker->firstName,
            'nama_akhir_penerima'  => $faker->lastName,
            'tgl_lahir'   => $faker->date('Y-m-d', '2005-12-31'),
            'kelamin'     => $faker->randomElement(['Male', 'Female', 'Other']),
            'email'      => $faker->unique()->safeEmail,
            'no_tlp'      => $faker->phoneNumber,
        ]);
    }
}
}
