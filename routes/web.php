<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangKampusController;
use App\Http\Controllers\FakultasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/', [BerandaController::class, 'index']);

Route::get('/tentang-kampus', function () {
    return view('tentang-kampus');
});

Route::get('/tentang-kampus', [TentangKampusController::class, 'index']);

Route::get('/fakultas', function () {
    return view('fakultas/fakultas');
});

Route::get('/fakultas', [FakultasController::class, 'index']);

Route::get('/fakultas-fst', function () {
    return view('fakultas/fakultas-fst');
});

Route::get('/fakultas-fisb', function () {
    return view('fakultas/fakultas-fisb');
});

Route::get('/fakultas-pasca', function () {
    return view('fakultas/fakultas-pasca');
});

Route::get('/fasilitas', function () {
    return view('kampus');
});