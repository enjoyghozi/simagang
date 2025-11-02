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
         Schema::create('pendaftaran_magang', function (Blueprint $table) {
        $table->bigInteger('id')->autoIncrement();
        $table->string('nama_lengkap')->nullable();
        $table->string('nim')->nullable();
        $table->string('prodi')->nullable();
        $table->string('semester')->nullable();
        $table->string('instansi')->nullable();
        $table->string('no_hp')->nullable();
        $table->text('alamat')->nullable();
        $table->string('email')->nullable();
        $table->string('surat_pengantar')->nullable(); // nama file upload
        $table->string('bidang_magang')->nullable();
        $table->date('mulai_magang')->nullable();
        $table->date('selesai_magang')->nullable();
        $table->enum('status', ['diterima', 'ditolak', 'pending', 'selesai'])->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_magang');
    }
};
