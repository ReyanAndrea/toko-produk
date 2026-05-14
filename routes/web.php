<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Route utama - halaman welcome Laravel
Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan daftar produk toko
// Mengarahkan ke ProdukController method index
Route::get('/produk', [ProdukController::class, 'index']);
