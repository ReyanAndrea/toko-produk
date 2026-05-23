<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Menampilkan semua produk dengan relasi kategori
    public function index()
    {
        $produks = Produk::with('datakategori')->get();
        return view('produk.index', compact('produks'));
    }

    // Form tambah produk
    public function create()
    {
        $kategoris = Kategori::all();
        return view('produk.create', compact('kategoris'));
    }

    // Simpan produk baru menggunakan create()
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
        ]);

        Produk::create($request->all());
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Form edit produk menggunakan find()
    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategoris = Kategori::all();
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    // Update produk menggunakan update()
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
        ]);

        $produk = Produk::find($id);
        $produk->update($request->all());
        return redirect('/produk')->with('success', 'Produk berhasil diupdate!');
    }

    // Hapus produk menggunakan delete()
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/produk')->with('success', 'Produk berhasil dihapus!');
    }

    // Cari produk menggunakan where()
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $produks = Produk::with('datakategori')
            ->where('nama_produk', 'like', "%$keyword%")
            ->get();
        return view('produk.index', compact('produks'));
    }
}
