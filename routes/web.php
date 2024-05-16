<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangPeminjamanController;
use App\Http\Controllers\BarangPengembalianController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.content.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});

// ProductList
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/ProductList', [ProductListController::class, 'index'])->name('productList');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('barang', BarangController::class);
Route::resource('barangmasuk', BarangMasukController::class);
Route::resource('barangkeluar', BarangKeluarController::class);
Route::resource('barangpeminjaman', BarangPeminjamanController::class);
Route::resource('barangpengembalian', BarangPengembalianController::class);
Route::resource('berita', BeritaController::class);
Route::resource('kategoriberita', KategoriBeritaController::class);
Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', MahasiswaController::class);

require __DIR__.'/auth.php';
