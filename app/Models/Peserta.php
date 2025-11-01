<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';
    protected $fillable = [
        'id',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'jurusan',
        'instansi',
        'status',
        'surat_balasan',
        'surat_selesai'
    ];
    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
