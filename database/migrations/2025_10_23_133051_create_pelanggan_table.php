<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
        $table->increments('pelanggan_id');
        $table->string('nama_awal_penerima', 100);
        $table->string('nama_akhir_penerima', 100);
        $table->date('tgl_lahir')->nullable();
        $table->enum('kelamin', ['Male', 'Female', 'Other'])->nullable();
        $table->string('email')->unique();
        $table->string('no_tlp', 20)->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
