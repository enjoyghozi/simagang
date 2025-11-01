<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $fillable = ['nomor_surat', 'sifat', 'hal', 'tanggal_surat'];
}
