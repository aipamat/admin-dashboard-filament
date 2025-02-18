<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;

    protected $fillable = [
        'slider',
        'gambar_dekor1',
        'gambar_dekor2'
    ];
}
