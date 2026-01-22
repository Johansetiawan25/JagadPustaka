<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role === 'customer') {
                return redirect('/Beranda');
            }

            // fallback jika role lain
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('logout_message', 'Sesi Anda telah berakhir. Anda sudah Logout. Terima kasih');
    }

    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');  // Menampilkan form register
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ],
        [
            'password.confirmed' => 'Konfirmasi password tidak sama dengan password.',
            'password.min' => 'Password minimal 6 karakter.',
        ]
    );

        // Buat akun baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',  // Role default customer
        ]);

        // Login otomatis
        Auth::login($user);

        // Redirect ke halaman sukses dengan pesan
        return redirect('/register/success')->with('status', 'Akun berhasil dibuat!');  
    }

}