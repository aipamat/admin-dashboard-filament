<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bidang extends Model
{
    use HasFactory;
    protected $fillable = [
        'bidang',
        'id_pimpinan'
    ];

    public function pimpinan(): BelongsTo
    {
        return $this->belongsTo(Pimpinan::class, 'id_pimpinan');
    }
}
