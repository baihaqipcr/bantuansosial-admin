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
         Schema::create('penerima', function (Blueprint $table) {
            $table->id('penerima_id');
            $table->string('program_id');
            $table->string('warga_id');
            $table->string('keterangan')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timestamps_penerima');
    }
};
