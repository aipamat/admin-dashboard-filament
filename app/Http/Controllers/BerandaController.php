<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beranda;
use App\Models\TeksIklan;
use App\Models\Fakultas;
use App\Models\KerjaSama;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil data banner dari tabel berandas (ambil yang pertama jika ada banyak)
        $beranda = Beranda::first();
        $teksIklans = TeksIklan::all();
        $fakultasItems = Fakultas::all();
        $kerjasamaItems = KerjaSama::all();
        return view('index', compact('beranda', 'teksIklans', 'fakultasItems', 'kerjasamaItems'));
    }
}

