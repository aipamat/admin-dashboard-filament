<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_dekan'
    ];

    public function pimpinan(): BelongsTo
    {
        return $this->belongsTo(Pimpinan::class, 'id_dekan');
    }

}
