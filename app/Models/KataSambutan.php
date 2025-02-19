<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KataSambutan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pimpinan',
        'kata_sambutan'
    ];

    public function pimpinan(): BelongsTo
    {
        return $this->belongsTo(Pimpinan::class, 'id_pimpinan');
    }
}
