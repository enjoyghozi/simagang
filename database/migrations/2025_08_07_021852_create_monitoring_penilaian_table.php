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
       Schema::create('monitoring_penilaian', function (Blueprint $table) {
        $table->id();
        $table->foreignId('peserta_id')->constrained('peserta')->onDelete('cascade');
        $table->foreignId('pembimbing_id')->constrained('users')->onDelete('cascade');
        $table->integer('minggu_ke');
        $table->date('tanggal_penilaian');
        $table->enum('kehadiran', ['Hadir', 'Tidak Hadir', 'Izin', 'Sakit']);
        $table->text('catatan_kegiatan')->nullable();
        $table->integer('nilai_sikap')->nullable();
        $table->integer('nilai_kehadiran')->nullable();
        $table->integer('nilai_hasil_kerja')->nullable();
        $table->text('catatan_pembimbing')->nullable();
        $table->integer('total_nilai')->nullable(); // bisa dihitung otomatis di controller nanti
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_penilaian');
    }
};
