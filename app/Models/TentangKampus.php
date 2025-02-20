<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKampus extends Model
{
    use HasFactory;
    protected $table = 'tentang_kampuses';
    protected $fillable = [
        'banner',
        'deskripsi',
        'gambar_sejarah',
        'deskripsi_sejarah'
    ];
}
