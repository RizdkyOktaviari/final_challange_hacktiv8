<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//kategori
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori_index');
Route::get('/kategori-create', [App\Http\Controllers\KategoriController::class, 'create'])->name('kategori_create');
Route::post('/kategori-post', [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori_store');
Route::post('/kategori-post-ajax', [App\Http\Controllers\KategoriController::class, 'storeAjax'])->name('kategori_storeajax');
Route::get('/kategori-delete/{id}', [App\Http\Controllers\KategoriController::class, 'delete'])->name('kategori_delete');
Route::post('/kategori-update/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori_update');
//produk
Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk_index');
Route::get('/produk-create', [App\Http\Controllers\ProdukController::class, 'create'])->name('produk_create');
Route::get('/produk-edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk_edit');
Route::post('/produk-store', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk_store');
Route::post('/produk-update/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('produk_update');
Route::get('/produk-delete/{id}', [App\Http\Controllers\ProdukController::class, 'delete'])->name('produk_delete');
//order
Route::get('/admin/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('admin.transactions.index');
Route::post('/admin/transactions/export', [App\Http\Controllers\TransactionController::class, 'export'])->name('admin.transactions.export');