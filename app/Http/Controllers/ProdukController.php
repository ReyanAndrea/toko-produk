<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

// Controller untuk mengelola data produk toko
class ProdukController extends Controller
{
    // Menampilkan semua data produk dari database
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }
}
