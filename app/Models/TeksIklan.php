<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeksIklan extends Model
{
    use HasFactory;
    protected $table = 'teks_iklans';
    protected $fillable = [
        'kata_iklan'
    ];
}
