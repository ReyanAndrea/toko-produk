<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/produk', [ProdukController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
