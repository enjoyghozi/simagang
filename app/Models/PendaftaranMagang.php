<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranMagang extends Model
{
    use HasFactory;

      protected $table = 'pendaftaran_magang'; // sesuaikan dengan nama tabel di database jika perlu
    protected $guarded = [];
}
