@extends('layouts.admin')

@section('content')

<h2 class="fw-bold">Dashboard Admin</h2>
<p class="text-muted">Selamat datang di halaman pengelolaan data Museum Otomotif Indonesia.</p>

<div class="row g-4 mt-2">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body">
                <h5>Total Koleksi</h5>
                <h2>{{ \App\Models\Koleksi::count() }}</h2>
                <p class="mb-0">Data koleksi tersimpan</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-success text-white">
            <div class="card-body">
                <h5>Supercar</h5>
                <h2>{{ \App\Models\Koleksi::where('kategori', 'Supercar')->count() }}</h2>
                <p class="mb-0">Koleksi kategori supercar</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning text-dark">
            <div class="card-body">
                <h5>Mobil Klasik</h5>
                <h2>{{ \App\Models\Koleksi::where('kategori', 'Mobil Klasik')->count() }}</h2>
                <p class="mb-0">Koleksi mobil klasik</p>
            </div>
        </div>
    </div>

</div>

<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <h5 class="fw-bold">Menu Pengelolaan</h5>
        <p>Kelola data koleksi kendaraan, asal koleksi, tahun, kategori, lokasi penyimpanan, dan gambar koleksi.</p>

        <a href="{{ route('koleksi.index') }}" class="btn btn-primary">
            Kelola Data Koleksi
        </a>

        <a href="{{ route('home') }}" class="btn btn-outline-primary">
            Lihat Website
        </a>
    </div>
</div>

@endsection