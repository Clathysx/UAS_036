<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Semua Koleksi - Museum Otomotif Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#f5f7fb; font-family:Arial, sans-serif; }
        .navbar { background:white; box-shadow:0 4px 15px rgba(0,0,0,.08); }
        .page-header {
            background:linear-gradient(120deg,#0b2447,#0d6efd);
            color:white;
            padding:100px 0 50px;
        }
        .feature-card {
            border:0;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
            height:100%;
            transition:.3s;
        }
        .feature-card:hover { transform:translateY(-8px); }
        .feature-card img { height:230px; object-fit:cover; }
        footer { background:#0b2447; color:white; padding:25px 0; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-primary">
            🚗 Museum Otomotif Indonesia
        </a>

        <div>
            <a href="{{ route('home') }}" class="btn btn-outline-primary me-2">Home</a>
            <a href="{{ route('login') }}" class="btn btn-primary">Login Admin</a>
        </div>
    </div>
</nav>

<section class="page-header text-center">
    <div class="container">
        <h1 class="fw-bold">Semua Koleksi Museum</h1>
        <p class="mb-0">Daftar lengkap koleksi kendaraan Museum Otomotif Indonesia.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($koleksis as $koleksi)
                <div class="col-md-4">
                    <div class="card feature-card">
                        @if($koleksi->gambar)
                            <img src="{{ asset('storage/'.$koleksi->gambar) }}" class="card-img-top">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:230px;">
                                <span class="text-muted">Tidak ada gambar</span>
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="fw-bold">{{ $koleksi->nama_koleksi }}</h5>
                            <p class="text-muted mb-1"><strong>Kategori:</strong> {{ $koleksi->kategori }}</p>
                            <p class="text-muted mb-1"><strong>Tahun:</strong> {{ $koleksi->tahun }}</p>
                            <p class="text-muted mb-1"><strong>Asal:</strong> {{ $koleksi->asal_koleksi }}</p>
                            <p class="text-muted"><strong>Lokasi:</strong> {{ $koleksi->lokasi_penyimpanan }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada data koleksi.</p>
            @endforelse
        </div>
    </div>
</section>

<footer class="text-center">
    <p class="mb-0">© 2026 Museum Otomotif Indonesia | UAS Rekayasa Web</p>
</footer>

</body>
</html>