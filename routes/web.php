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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('home');
});

Route::get('/Beranda', function () {
    return view('home');
});

Route::get('/produk/1', function () {
    return view('detail');
});
//

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/kontak', function () {
    return view('kontak');
});

//Route::get('/admin', function () {
    //return view('admin.dashboard');
//})->middleware(['auth', 'nocache', RoleMiddleware::class . ':admin']);

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

// Kurang qty item
Route::get('/keranjang/kurang/{id}', [CartController::class, 'kurang']);
Route::get('/keranjang/tambah/{id}', [CartController::class, 'add']);
Route::get('/keranjang/hapus/{id}', [CartController::class, 'hapus']);
Route::get('/payment/{order}', [OrderController::class, 'payment'])
    ->name('payment.qris');


Route::middleware(['auth', 'nocache', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/buku', [AdminController::class, 'index'])->name('admin.buku.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/buku', [AdminController::class, 'store'])->name('admin.buku.store');
    Route::get('/admin/buku/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/buku/{id}', [AdminController::class, 'update']);
    Route::delete('/admin/buku/{id}', [AdminController::class, 'destroy']);
});

Route::middleware(['auth', 'nocache', RoleMiddleware::class . ':admin'])->prefix('admin')->group(function() {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
});


Route::prefix('admin')->group(function() {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/checkout', [CartController::class, 'checkout'])
    ->middleware(['auth', 'nocache'])
    ->name('cart.checkout');

Route::post('/pembayaran/konfirmasi', [OrderController::class, 'konfirmasi'])
    ->name('pembayaran.konfirmasi');

// Tampilkan form register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Proses registrasi
Route::post('/register', [AuthController::class, 'register']);
// Halaman sukses registrasi
Route::get('/register/success', function () {
    return view('auth.register-success');
})->name('register.success');
