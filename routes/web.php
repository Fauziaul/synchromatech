<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landingpage');
Route::get('/kategori/{id}', [HomeController::class, 'produk'])->name('kategori.show');
Route::get('/order/{id}', [HomeController::class, 'order'])->name('produk.order');
Route::post('/buat-pesanan', [HomeController::class, 'buatPesanan'])->name('produk.pesan');
Route::get('/export/{id}', [ExportController::class, 'export'])->name('pesanan.export');
Route::get('/sukses', [HomeController::class, 'sukses'])->name('pesanan.sukses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes();
Route::middleware('auth')->prefix('admin')->group(function () {
        
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/banner')->group(function () {
        Route::get('/', [App\Http\Controllers\BannerController::class, 'index'])->name('admin.banner.index');
        Route::get('/show', [App\Http\Controllers\BannerController::class, 'show'])->name('admin.banner.show');
        Route::post('/store', [App\Http\Controllers\BannerController::class, 'store'])->name('admin.banner.store');
        Route::post('/status/{id}', [App\Http\Controllers\BannerController::class, 'status'])->name('admin.banner.status');
        Route::delete('/destroy/{id}', [App\Http\Controllers\BannerController::class, 'destroy'])->name('admin.banner.delete');
    });

    Route::prefix('/produk')->group(function () {
        Route::get('/', [App\Http\Controllers\ProdukController::class, 'index'])->name('admin.produk.index');
        Route::get('/show', [App\Http\Controllers\ProdukController::class, 'show'])->name('admin.produk.show');
        Route::post('/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('admin.produk.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::post('/update/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('admin.produk.update');
        Route::post('/status/{id}', [App\Http\Controllers\ProdukController::class, 'status'])->name('admin.produk.status');
        Route::delete('/destroy/{id}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('admin.produk.destroy');
        Route::get('/detail/{id}', [App\Http\Controllers\ProdukController::class, 'detail'])->name('admin.produk.detail');
    });

    Route::prefix('/kategori')->group(function () {
        Route::get('/', [App\Http\Controllers\KategoriController::class, 'index'])->name('admin.kategori.index');
        Route::get('/show', [App\Http\Controllers\KategoriController::class, 'show'])->name('admin.kategori.show');
        Route::post('/store', [App\Http\Controllers\KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::post('/update/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::post('/status/{id}', [App\Http\Controllers\KategoriController::class, 'status'])->name('admin.kategori.status');
        Route::delete('/destroy/{id}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    });

    Route::prefix('/pesanan')->group(function () {
        Route::get('/', [App\Http\Controllers\PesananController::class, 'index'])->name('admin.pesanan.index');
        Route::get('/show', [App\Http\Controllers\PesananController::class, 'show'])->name('admin.pesanan.show');
        Route::post('/store', [App\Http\Controllers\PesananController::class, 'store'])->name('admin.pesanan.store');
        Route::get('/edit/{id}', [App\Http\Controllers\PesananController::class, 'edit'])->name('admin.pesanan.edit');
        Route::post('/update/{id}', [App\Http\Controllers\PesananController::class, 'update'])->name('admin.pesanan.update');
        Route::post('/status/{id}', [App\Http\Controllers\PesananController::class, 'status'])->name('admin.pesanan.status');
        Route::delete('/destroy/{id}', [App\Http\Controllers\PesananController::class, 'destroy'])->name('admin.pesanan.destroy');
        Route::get('/unduh/{id}', [App\Http\Controllers\PesananController::class, 'unduh'])->name('admin.pesanan.unduh');
    });
});

