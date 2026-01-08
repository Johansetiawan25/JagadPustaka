<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
})->middleware([RoleMiddleware::class . ':admin']);

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
})->name('login');

Route::get('/keranjang', [CartController::class, 'index']);
Route::post('/keranjang/tambah/{id}', [CartController::class, 'add']);

// Route POST untuk menangani submit login
Route::post('/login', function (\Illuminate\Http\Request $request) {
    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        $request->session()->regenerate();

        if ($user->role === 'admin') return redirect('/admin');
        else return redirect('/Beranda');
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
});


Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
