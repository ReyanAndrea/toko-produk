<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model Kategori: merepresentasikan tabel kategoris
class Kategori extends Model
{
    protected $fillable = ['nama_kategori', 'deskripsi'];

    // Relasi: satu kategori punya banyak produk
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
