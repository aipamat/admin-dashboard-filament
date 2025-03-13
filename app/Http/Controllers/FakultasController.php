<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakultasDisplay;
use App\Models\Fakultas;
use App\Models\FakultasDetail;

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

    public function show($id)
    {
        $fakultas = FakultasDetail::with(['fakultas', 'pimpinan', 'programStudi'])->findOrFail($id);

        return view('fakultas.view', compact('fakultas'));
    }
}
