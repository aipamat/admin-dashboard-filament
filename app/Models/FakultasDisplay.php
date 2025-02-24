<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakultasDisplay extends Model
{
    use HasFactory;
    
    protected $table = 'fakultas_displays';
    protected $fillable = [
        'banner_utama',
        'deskripsi'
    ];
}
