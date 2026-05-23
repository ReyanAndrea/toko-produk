<!DOCTYPE html>
<!-- View: Menampilkan daftar produk toko -->
<!-- Menggunakan Blade Template Engine Laravel -->
<!-- Data dikirim dari ProdukController@index -->
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #2c3e50;
        }

        .card-header {
            background-color: #2c3e50;
            color: white;
        }

        .badge-kategori {
            background-color: #3498db;
        }

        .stok-habis {
            color: #e74c3c;
            font-weight: bold;
        }

        .stok-ada {
            color: #27ae60;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark px-4 py-3 mb-4">
        <span class="navbar-brand fw-bold fs-4">🛒 Toko Produk</span>
        <span class="text-white-50">PBW - MVC Laravel</span>
    </nav>

    <div class="container">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <form action="/produk/search" method="GET" class="d-flex gap-2">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari produk...">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/produk" class="btn btn-secondary">Reset</a>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📦 Daftar Produk</h5>
                <a href="/produk/create" class="btn btn-success btn-sm">+ Tambah Produk</a>
            </div>
            <div class="card-body">
                @if($produks->isEmpty())
                <div class="alert alert-warning">Belum ada produk tersedia.</div>
                @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $index => $produk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $produk->nama_produk }}</strong></td>
                                <td>
                                    <span class="badge badge-kategori">
                                        {{ $produk->dataKategori->nama_kategori ?? '-' }}
                                    </span>
                                </td>
                                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>
                                    @if($produk->stok == 0)
                                    <span class="stok-habis">Habis</span>
                                    @else
                                    <span class="stok-ada">{{ $produk->stok }} pcs</span>
                                    @endif
                                </td>
                                <td>{{ $produk->deskripsi ?? '-' }}</td>
                                <td>
                                    <a href="/produk/{{ $produk->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/produk/{{ $produk->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <div class="card-footer text-muted">
                Total: {{ $produks->count() }} produk
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>