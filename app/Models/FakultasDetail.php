<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakultasDetail extends Model
{
    use HasFactory;

    protected $table = 'detail_fakultas';

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }

    public function pimpinan()
    {
        return $this->belongsTo(Pimpinan::class, 'id_pimpinan');
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_program_studi');
    }
}
