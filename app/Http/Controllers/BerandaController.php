<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderTeks;
use App\Models\Beranda;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel slider_teks
        $sliderTeks = SliderTeks::all();
        $beranda = Beranda::all();

        return view('index', compact('sliderTeks', 'beranda'));
    }
}
