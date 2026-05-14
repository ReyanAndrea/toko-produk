<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model Produk: merepresentasikan tabel produks di database
// Menggunakan Eloquent ORM bawaan Laravel
class Produk extends Model
{
    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'nama_produk',  // Nama produk
        'kategori',     // Kategori produk
        'harga',        // Harga produk dalam rupiah
        'stok',         // Jumlah stok tersedia
        'deskripsi'     // Deskripsi singkat produk
    ];
}
