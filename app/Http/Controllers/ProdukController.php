<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

// Controller untuk mengelola data produk toko
// Menghubungkan Model Produk dengan View
class ProdukController extends Controller
{
    // Method index: mengambil semua data produk dari database
    // lalu mengirimkan data ke view produk.index
    public function index()
    {
        // Mengambil semua data dari tabel produks via Eloquent ORM
        $produks = Produk::all();

        // Mengirim data ke view
        return view('produk.index', compact('produks'));
    }
}
