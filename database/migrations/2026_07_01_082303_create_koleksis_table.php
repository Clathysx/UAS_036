<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('koleksis', function (Blueprint $table) {
    $table->id();
    $table->string('id_koleksi')->unique();
    $table->string('gambar')->nullable();
    $table->string('nama_koleksi');
    $table->year('tahun');
    $table->string('kategori');
    $table->string('lokasi_penyimpanan');
    $table->string('asal_koleksi');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksis');
    }
};
