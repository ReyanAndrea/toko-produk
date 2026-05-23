<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model Produk: merepresentasikan tabel produks
class Produk extends Model
{
    protected $fillable = [
        'nama_produk',
        'kategori',
        'kategori_id',
        'harga',
        'stok',
        'deskripsi'
    ];

    // Relasi: satu produk punya satu kategori
    public function dataKategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
