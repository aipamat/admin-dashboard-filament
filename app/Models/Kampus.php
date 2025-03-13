<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kampus extends Model
{
    use HasFactory;
    protected $table = 'kampuses';
    protected $fillable = [
        'banner_utama',
        'deskripsi',
        'gambar_kampus',
        'nama_kampus',
        'alamat',
        'id_fasilitas'
    ];

    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }
}
