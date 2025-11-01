<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasMagang extends Model
{
    use HasFactory;

    protected $table = 'berkas_magang';

    protected $fillable = [
        'mahasiswa_id',
        'jenis_berkas',
        'minggu_ke',
        'file_path',
        'tanggal_upload',
    ];

     public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
