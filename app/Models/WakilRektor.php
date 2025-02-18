<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WakilRektor extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto_wakil_rektor',
        'status',
        'bidang',
        'nama_wakil_rektor'
    ];
}
