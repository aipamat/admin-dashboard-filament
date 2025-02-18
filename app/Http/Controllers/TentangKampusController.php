<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangKampus;
use App\Models\Rektor;
use App\Models\WakilRektor;
use App\Models\StrukturOrganisasi;
use App\Models\KerjaSama;

class TentangKampusController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel slider_teks
        $tentangKampus = TentangKampus::first();
        $rektor = Rektor::first();
        $wakilRektor = WakilRektor::all();
        $strukturOrganisasi = StrukturOrganisasi::first();
        $kerjaSama = KerjaSama::all();

        return view('tentang-kampus', compact('tentangKampus', 'rektor', 'wakilRektor', 'strukturOrganisasi', 'kerjaSama'));
    }
}
