<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTeks extends Model
{
    use HasFactory;

    protected $table = 'slider_teks';
    protected $fillable = [
        'slider_teks'
    ];
}
