<?php

// Migration: Membuat tabel produks di database
// Berisi kolom nama_produk, kategori, harga, stok, deskripsi

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Membuat tabel produks
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('kategori');
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    // Menghapus tabel produks
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
