@extends('layouts.admin')

@section('content')

<h2>Edit Koleksi Museum</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('koleksi.update',$koleksi->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>ID Koleksi</label>
                <input type="text" name="id_koleksi" value="{{ $koleksi->id_koleksi }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Koleksi</label>
                <input type="text" name="nama_koleksi" value="{{ $koleksi->nama_koleksi }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" value="{{ $koleksi->tahun }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ $koleksi->kategori }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Lokasi Penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" value="{{ $koleksi->lokasi_penyimpanan }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Asal Koleksi</label>
                <input type="text" name="asal_koleksi" value="{{ $koleksi->asal_koleksi }}" class="form-control">
            </div>

            <div class="mb-3">

                @if($koleksi->gambar)
                    <img src="{{ asset('storage/'.$koleksi->gambar) }}" width="150" class="mb-3">
                @endif

                <label>Gambar Baru</label>
                <input type="file" name="gambar" class="form-control" id="gambarInput" accept="image/*">
                <img id="previewGambar" class="mt-3 rounded shadow-sm" width="200" style="display:none;">
            </div>

            <button class="btn btn-warning">
                Update
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