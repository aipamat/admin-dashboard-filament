<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakultasDisplay;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    public function index(){
        
        // Fakultas Utama
        $fakultasUtamaItems = FakultasDisplay::first();
        $fakultasUtamaFST = Fakultas::where('nama_fakultas', 'Fakultas Sains dan Teknologi')
        ->first();
        $fakultasUtamaFISB = Fakultas::where('nama_fakultas', 'Fakultas Ilmu Sosial dan Bisnis')
        ->first();
        $fakultasUtamaPasca = Fakultas::where('nama_fakultas', 'Fakultas Pascasarjana')
        ->first();

        return view('fakultas/fakultas', compact('fakultasUtamaItems', 'fakultasUtamaFST', 'fakultasUtamaFISB', 'fakultasUtamaPasca'));
    }
}
