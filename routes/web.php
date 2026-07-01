<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KoleksiController;

use App\Models\Koleksi;

Route::get('/', function () {
    $koleksis = Koleksi::latest()->take(6)->get();
    return view('home', compact('koleksis'));
})->name('home');

Route::get('/koleksi-publik', function () {
    $koleksis = Koleksi::latest()->get();
    return view('koleksi-publik', compact('koleksis'));
})->name('koleksi.publik');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Export PDF
    Route::get('/koleksi/export/pdf', [KoleksiController::class, 'exportPdf'])
        ->name('koleksi.export.pdf');

    // CRUD
    Route::resource('koleksi', KoleksiController::class);
});