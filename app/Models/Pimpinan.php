<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    use HasFactory;
    protected $table = 'pimpinans';
    protected $fillable = [
        'foto',
        'nama',
        'status'
    ];

    public function bidangs()
    {
        return $this->hasMany(Bidang::class, 'id_pimpinan', 'id');
    }

    public function namaFakultas()
    {
        return $this->hasMany(Fakultas::class, 'id_pimpinan', 'id');
    }
}
