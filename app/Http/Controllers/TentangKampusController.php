<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangKampus;
use App\Models\VisiMisiTujuan;
use App\Models\Pimpinan;
use App\Models\StrukturOrganisasi;
use App\Models\KerjaSama;

class TentangKampusController extends Controller
{
    public function index()
    {
        $tentangKampusItems = TentangKampus::first();
        $visiMisiTujuanItems = VisiMisiTujuan::first();
        $pimpinanRektorItems = Pimpinan::where('status', 'Rektor')->first();
        $pimpinanWakilRektorItems = Pimpinan::where('status', 'Wakil Rektor')
        ->with('bidangs') // Ambil data bidang terkait
        ->get();
        $pimpinanDekanItems = Pimpinan::where('status', 'Dekan')
        ->with('namaFakultas') // Ambil data bidang terkait
        ->get();
        $strukturOrganisasiItems = StrukturOrganisasi::first();
        $kerjaSamaItems = KerjaSama::all();
        return view('tentang-kampus', compact('tentangKampusItems', 'visiMisiTujuanItems', 'pimpinanRektorItems', 'pimpinanWakilRektorItems', 'pimpinanDekanItems', 'strukturOrganisasiItems', 'kerjaSamaItems'));
    }
}
