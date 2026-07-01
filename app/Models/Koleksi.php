<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $fillable = [
        'id_koleksi',
        'gambar',
        'nama_koleksi',
        'tahun',
        'kategori',
        'lokasi_penyimpanan',
        'asal_koleksi',
    ];
}