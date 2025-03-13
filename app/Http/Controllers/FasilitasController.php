<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kampus;

class FasilitasController extends Controller
{
    public function index()
    {   
        $kampusUtama = Kampus::first();
        $detailKampus = Kampus::all();
        return view('kampus', compact('kampusUtama', 'detailKampus'));
    }
}
