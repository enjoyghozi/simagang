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
       Schema::create('berkas_magang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id'); // ID Mahasiswa
            $table->string('jenis_berkas');             // Laporan Mingguan/Akhir
            $table->integer('minggu_ke')->nullable();   // Untuk laporan mingguan
            $table->string('file_path');                // Lokasi file
            $table->date('tanggal_upload');             // Tanggal upload
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_magang');
    }
};
