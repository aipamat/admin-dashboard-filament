<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JurusanFakultas extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_fakultas',
        'nama_fakultas',
        'id_dekan'
    ];

    public function dekan(): BelongsTo
    {
        return $this->belongsTo(Dekan::class, 'id_dekan');
    }
}
