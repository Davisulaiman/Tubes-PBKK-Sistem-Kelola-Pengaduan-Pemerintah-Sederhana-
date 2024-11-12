<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObrolanPengaduanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Routes for Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}', [LaporanController::class, 'getById'])->name('laporan.lihat');
    Route::get('/daftar-pengaduan-saya', [LaporanController::class, 'daftarpengaduansaya'])->name('laporan.daftarpengaduansaya');
    Route::get('/kelola-pengaduan', [LaporanController::class, 'kelolapengaduan'])->name('laporan.kelolaPengaduan');
    Route::post('/laporan/{id}/update-status', [LaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
    Route::get('/laporan/print/{id}', [LaporanController::class, 'print'])->name('laporan.print');
    Route::get('laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

    // Routes for Obrolan Pengaduan
    Route::get('/obrolan/{laporanId}', [ObrolanPengaduanController::class, 'index'])->name('obrolan.index');
    Route::post('/obrolan/{laporanId}', [ObrolanPengaduanController::class, 'store'])->name('obrolan.store');
    Route::post('/obrolan/{obrolanId}/mark-as-read', [ObrolanPengaduanController::class, 'markAsRead'])->name('obrolan.markAsRead');

    // Routes for User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'getById'])->name('users.lihat');
    Route::post('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Add delete route for user
});

require __DIR__ . '/auth.php';
