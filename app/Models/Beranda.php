<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;

    protected $table = 'berandas';
    protected $fillable = [
        'banner',
        'gambar_dekorasi_besar',
        'gambar_dekorasi_kecil'
    ];
}
