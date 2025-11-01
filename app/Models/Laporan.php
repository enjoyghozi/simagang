<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'file',
        'jenis',
    ];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
