<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksis = Koleksi::latest()->get();
        return view('admin.koleksi.index', compact('koleksis'));
    }

    public function create()
    {
        return view('admin.koleksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_koleksi' => 'required|unique:koleksis,id_koleksi',
            'nama_koleksi' => 'required',
            'tahun' => 'required|digits:4',
            'kategori' => 'required',
            'lokasi_penyimpanan' => 'required',
            'asal_koleksi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('koleksi', 'public');
        }

        Koleksi::create($data);

        return redirect()->route('koleksi.index')->with('success', 'Data koleksi berhasil ditambahkan.');
    }

    public function edit(Koleksi $koleksi)
    {
        return view('admin.koleksi.edit', compact('koleksi'));
    }

    public function update(Request $request, Koleksi $koleksi)
    {
        $request->validate([
            'id_koleksi' => 'required|unique:koleksis,id_koleksi,' . $koleksi->id,
            'nama_koleksi' => 'required',
            'tahun' => 'required|digits:4',
            'kategori' => 'required',
            'lokasi_penyimpanan' => 'required',
            'asal_koleksi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($koleksi->gambar) {
                Storage::disk('public')->delete($koleksi->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('koleksi', 'public');
        }

        $koleksi->update($data);

        return redirect()->route('koleksi.index')->with('success', 'Data koleksi berhasil diperbarui.');
    }

    public function destroy(Koleksi $koleksi)
    {
        if ($koleksi->gambar) {
            Storage::disk('public')->delete($koleksi->gambar);
        }

        $koleksi->delete();

        return redirect()->route('koleksi.index')->with('success', 'Data koleksi berhasil dihapus.');
    }

    public function exportPdf()
    {
        $koleksis = Koleksi::latest()->get();

        $pdf = Pdf::loadView('admin.koleksi.pdf', compact('koleksis'));

        return $pdf->download('laporan-data-koleksi-museum.pdf');
    }
}