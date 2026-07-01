@extends('layouts.admin')

@section('content')

<h2>Tambah Koleksi Museum</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('koleksi.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>ID Koleksi</label>
                <input type="text" name="id_koleksi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Koleksi</label>
                <input type="text" name="nama_koleksi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option>Mobil Klasik</option>
                    <option>Mobil Sport</option>
                    <option>Motor Klasik</option>
                    <option>Supercar</option>
                    <option>Hypercar</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Lokasi Penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Asal Koleksi</label>
                <input type="text" name="asal_koleksi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" id="gambarInput" accept="image/*">
                <img id="previewGambar" class="mt-3 rounded shadow-sm" width="200" style="display:none;">
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('koleksi.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewGambar');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
</script>
@endsection