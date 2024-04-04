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
        Schema::create('tb_tenda', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tenda');
            $table->string('kapasitas');
            $table->string('ukuran');
            $table->string('harga');
            $table->string('kebutuhan');
            $table->string('deskripsi');
            $table->string('path_gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tenda');
    }
};