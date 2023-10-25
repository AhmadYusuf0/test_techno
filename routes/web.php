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
Route::post('add_produk', [Produk::class, 'add_produk'])->name('add_produk');
Route::get('produk', [Produk::class, 'index'])->name('produk');
Route::get('tambah_produk', [Produk::class, 'action_produk'])->name('tambah_produk');
Route::get('edit_produk/{id}', [Produk::class, 'action_produk'])->name('edit_produk');
Route::post('action_tambah_produk', [Produk::class, 'action_tambah_produk'])->name('action_tambah_produk');
Route::post('action_edit_produk', [Produk::class, 'action_edit_produk'])->name('action_edit_produk');
Route::post('action_del_produk', [Produk::class, 'index'])->name('action_del_produk');
