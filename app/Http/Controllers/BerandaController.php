<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderTeks;
use App\Models\Beranda;
use App\Models\JurusanFakultas;
use App\Models\KerjaSama;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel slider_teks
        $sliderTeks = SliderTeks::all();
        $beranda = Beranda::first();
        $kerjaSama = KerjaSama::all();
        

        return view('index', compact('sliderTeks', 'beranda', 'kerjaSama'));
    }
}
