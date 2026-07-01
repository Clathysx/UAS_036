@extends('layouts.admin')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Data Koleksi Museum</h2>
                <p class="text-muted mb-0">Daftar koleksi Museum Otomotif Indonesia.</p>
            </div>

            <div>
                <a href="{{ route('koleksi.create') }}" class="btn btn-primary">
                    + Tambah Koleksi
                </a>

                <a href="{{ route('koleksi.export.pdf') }}" class="btn btn-danger">
                    Export PDF
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table id="tabelKoleksi" class="table table-bordered table-striped align-middle w-100">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>ID Koleksi</th>
                        <th>Nama Koleksi</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Asal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($koleksis as $koleksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($koleksi->gambar)
                                <img src="{{ asset('storage/'.$koleksi->gambar) }}" width="90" class="rounded">
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>{{ $koleksi->id_koleksi }}</td>
                        <td>{{ $koleksi->nama_koleksi }}</td>
                        <td>{{ $koleksi->tahun }}</td>
                        <td>{{ $koleksi->kategori }}</td>
                        <td>{{ $koleksi->lokasi_penyimpanan }}</td>
                        <td>{{ $koleksi->asal_koleksi }}</td>
                        <td>
                            <a href="{{ route('koleksi.edit', $koleksi->id) }}" class="btn btn-warning btn-sm mb-1">
                                Edit
                            </a>

                            <form action="{{ route('koleksi.destroy', $koleksi->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm mb-1">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data koleksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    new DataTable('#tabelKoleksi');
</script>
@endsection