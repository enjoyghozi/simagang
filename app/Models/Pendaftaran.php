<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Supaya tidak jadi 'pendaftarans'
    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama',
        'no hp',
        'nim',
        'email',
        'jurusan',
        'surat_pengantar'
    ];
}
