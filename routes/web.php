<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('home');
});

Route::get('/Beranda', function () {
    return view('home');
})->middleware(['auth', 'nocache', RoleMiddleware::class . ':customer']);

Route::get('/produk/1', function () {
    return view('detail');
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
})->middleware(['auth', 'nocache', RoleMiddleware::class . ':admin']);

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

Route::middleware(['auth', 'nocache'])->group(function () {

    Route::get('/keranjang', [CartController::class, 'index']);
    Route::post('/keranjang/tambah/{id}', [CartController::class, 'add']);
});

Route::middleware(['guest', 'nocache'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/pendidikan', [BukuController::class, 'pendidikan']);
Route::get('/olahraga', [BukuController::class, 'olahraga']);
Route::get('/fiksi', [BukuController::class, 'fiksi']);
Route::get('/desain', [BukuController::class, 'desain']);    