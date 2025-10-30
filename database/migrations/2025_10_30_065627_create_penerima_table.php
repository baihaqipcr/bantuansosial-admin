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
        //1. penerima_bantuan
        Schema::create('penerima', function (Blueprint $table) {
            $table->increments('penerima_id');
            $table->unsignedInteger('program_id');
            $table->unsignedInteger('warga_id');
            $table->string('keterangan')->unique();
            $table->timestamps();

            $table->foreign('program_id')->references('program_id')->on('program');
            $table->foreign('warga_id')->references('warga_id')->on('warga');
        });
        //2. pendaftar_bantuan
        Schema::create('pendaftar_bantuan', function (Blueprint $table) {
            $table->id('pendaftar_id');
            $table->foreignId('program_id')->constrained('program_bantuan')->onDelete('cascade');
            $table->foreignId('warga_id')->constrained('warga')->onDelete('cascade');
            $table->enum('status_seleksi', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
        //3. verifikasi_lapangan
        Schema::create('verifikasi_lapangan', function (Blueprint $table) {
            $table->id('verifikasi_id');
            $table->foreignId('pendaftar_id')->constrained('pendaftar_bantuan')->onDelete('cascade');
            $table->string('petugas');
            $table->date('tanggal');
            $table->text('catatan')->nullable();
            $table->integer('skor')->nullable();
            $table->timestamps();
        });
        //4. riwayat_penyaluran_bantuan  
         Schema::create('riwayat_penyaluran_bantuan', function (Blueprint $table) {
            $table->id('penyaluran_id');
            $table->foreignId('program_id')->constrained('program_bantuan')->onDelete('cascade');
            $table->foreignId('penerima_id')->constrained('penerima_bantuan')->onDelete('cascade');
            $table->integer('tahap_ke');
            $table->date('tanggal');
            $table->decimal('nilai', 15, 2)->nullable();
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyaluran_bantuan');
        Schema::dropIfExists('penerima_bantuan');
        Schema::dropIfExists('verifikasi_lapangan');
        Schema::dropIfExists('pendaftar_bantuan');
        Schema::dropIfExists('program_bantuan');
    }
};
