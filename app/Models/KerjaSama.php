<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjaSama extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar_kerja_sama',
        'nama',
        'deskripsi',
        'tanggal'
    ];
}
