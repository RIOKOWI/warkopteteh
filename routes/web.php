<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Models\DetailPenjualan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/bahan', [BahanBakuController::class, 'index'])->name('bahan.index');
    Route::get('/bahan/status/{status}', [BahanBakuController::class, 'filter'])->name('bahan.filter');
});


Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/bahan/create', [BahanBakuController::class, 'create'])->name('bahan.create');
    Route::post('/bahan', [BahanBakuController::class, 'store'])->name('bahan.store');
    Route::get('/bahan/{bahan}/edit', [BahanBakuController::class, 'edit'])->name('bahan.edit');
    Route::put('/bahan/{bahan}', [BahanBakuController::class, 'update'])->name('bahan.update');
    Route::delete('/bahan/{bahan}', [BahanBakuController::class, 'destroy'])->name('bahan.destroy');

});

Route::middleware(['auth', 'verified', 'role:kasir'])->group(function () {
    Route::resource('pelanggan', PelangganController::class);

    Route::resource('penjualan', PenjualanController::class);
});




require __DIR__.'/auth.php';
