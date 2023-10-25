<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Produk;
use App\Http\Controllers\Api;

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

Route::get('/', [Dashboard::class, 'index'])->name('dashboard');

Route::get('api', [Api::class, 'index'])->name('api');
Route::get('getProduk', [Api::class, 'getProduk'])->name('getProduk');
Route::post('tambahProduk', [Api::class, 'tambahProduk'])->name('tambahProduk');
Route::post('editProduk', [Api::class, 'editProduk'])->name('editProduk');
Route::post('cariProduk', [Api::class, 'cariProduk'])->name('cariProduk');
Route::post('filterProduk', [Api::class, 'filterProduk'])->name('filterProduk');
