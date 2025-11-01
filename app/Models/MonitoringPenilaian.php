<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringPenilaian extends Model
{
    use HasFactory;

     protected $table = 'monitoring_penilaian';

    protected $fillable = [
        'peserta_id',
        'pembimbing_id',
        'minggu_ke',
        'tanggal_penilaian',
        'kehadiran',
        'catatan_kegiatan',
        'nilai_sikap',
        'nilai_kehadiran',
        'nilai_hasil_kerja',
        'catatan_pembimbing',
        'total_nilai',
    ];

    // Relasi ke Peserta
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    // Relasi ke User (pembimbing)
    public function pembimbing()
    {
        return $this->belongsTo(User::class, 'pembimbing_id');
    }

}
