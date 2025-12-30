<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('home');
});

Route::get('/produk/1', function () {
    return view('detail');
});

Route::get('/Beranda', function () {
    return view('home');
});

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/pendidikan', function () {
    return view('kategori.pendidikan');
});
Route::get('/olahraga', function () {
    return view('kategori.olahraga');
});
Route::get('/fiksi', function () {
    return view('kategori.fiksi');
});
Route::get('/desain', function () {
    return view('kategori.desain');
});

Route::get('/login', function () {
    return view('admin.login');
});


Route::get('/keranjang', [CartController::class, 'index']);
Route::post('/keranjang/tambah/{id}', [CartController::class, 'add']);

