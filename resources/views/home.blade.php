<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Otomotif Indonesia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { font-family: Arial, sans-serif; background:#f5f7fb; }
        .navbar { background:white; box-shadow:0 4px 15px rgba(0,0,0,.08); }
        .hero {
            min-height:90vh;
            background:linear-gradient(120deg, rgba(8,27,56,.88), rgba(13,110,253,.65)),
            url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            background-position:center;
            color:white;
            display:flex;
            align-items:center;
        }
        .hero h1 { font-size:58px; font-weight:800; }
        .section-title { font-weight:800; color:#0b2447; }
        .feature-card {
            border:0;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
            transition:.3s;
            height:100%;
        }
        .feature-card:hover { transform:translateY(-8px); }
        .feature-card img { height:230px; object-fit:cover; }
        .stat-box {
            background:white;
            border-radius:18px;
            padding:30px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
            text-align:center;
        }
        .stat-box h3 { font-size:38px; color:#0d6efd; font-weight:800; }
        footer { background:#0b2447; color:white; padding:25px 0; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">
            🚗 Museum Otomotif Indonesia
        </a>

        <div>
            <a href="#koleksi" class="btn btn-outline-primary me-2">Koleksi</a>
            <a href="{{ route('login') }}" class="btn btn-primary">Login Admin</a>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="col-md-8">
            <h1>Jelajahi Sejarah Otomotif Dunia</h1>
            <p class="lead mt-3">
                Museum Otomotif Indonesia menghadirkan koleksi kendaraan klasik,
                sport, supercar, hingga mobil legendaris dari berbagai era.
            </p>
            <a href="#koleksi" class="btn btn-warning btn-lg mt-3">Lihat Koleksi</a>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Tentang Museum</h2>
        <p class="text-center text-muted mx-auto" style="max-width:800px;">
            Museum Otomotif Indonesia adalah ruang edukasi dan pameran yang menampilkan
            perkembangan dunia otomotif dari masa ke masa. Setiap koleksi memiliki nilai
            sejarah, desain, dan teknologi yang menjadi bagian penting dalam perkembangan kendaraan.
        </p>
    </div>
</section>

<section class="py-5 bg-white" id="koleksi">
    <div class="container">
        <h2 class="section-title text-center mb-5">Koleksi Unggulan</h2>

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

        <div class="text-center mt-5">
            <a href="{{ route('koleksi.publik') }}" class="btn btn-primary btn-lg">
                Lihat Semua Koleksi
            </a>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-box">
                    <h3>{{ \App\Models\Koleksi::count() }}+</h3>
                    <p>Koleksi Kendaraan</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-box">
                    <h3>{{ \App\Models\Koleksi::distinct('asal_koleksi')->count('asal_koleksi') }}+</h3>
                    <p>Asal Koleksi</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-box">
                    <h3>{{ \App\Models\Koleksi::distinct('kategori')->count('kategori') }}+</h3>
                    <p>Kategori Koleksi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title text-center mb-5">Informasi Kunjungan</h2>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="stat-box h-100">
                    <h4 class="fw-bold text-primary">📍 Lokasi Museum</h4>
                    <p class="text-muted mb-0">
                        Jl. Otomotif Raya No. 10, Tangerang Selatan, Banten.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="stat-box h-100">
                    <h4 class="fw-bold text-primary">🕘 Jam Operasional</h4>
                    <p class="text-muted mb-1">Senin - Jumat: 09.00 - 17.00 WIB</p>
                    <p class="text-muted mb-0">Sabtu - Minggu: 09.00 - 20.00 WIB</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="text-center">
    <p class="mb-0">
        © 2026 Museum Otomotif Indonesia | UAS Rekayasa Web - Vikka Putri Herlian
    </p>
</footer>

</body>
</html>