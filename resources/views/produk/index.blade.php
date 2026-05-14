<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Toko</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h5 class="mb-0">📦 Daftar Produk</h5>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $index => $produk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $produk->nama_produk }}</strong></td>
                                <td>
                                    <span class="badge badge-kategori">
                                        {{ $produk->kategori }}
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

</body>

</html>