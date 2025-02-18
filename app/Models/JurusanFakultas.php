<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JurusanFakultas extends Model
{
    use HasFactory;
    protected $table = 'jurusan_fakultas';
    protected $fillable = [
        'banner_fakultas',
        'gambar_fakultas',
        'nama_fakultas',
        'deskripsi',
        'id_dekan'
    ];

    public function dekan(): BelongsTo
    {
        return $this->belongsTo(Dekan::class, 'id_dekan');
    }
}
