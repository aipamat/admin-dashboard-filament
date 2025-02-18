<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dekan extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto_dekan',
        'status',
        'nama_dekan',
        'kata_sambutan'
    ];
}
