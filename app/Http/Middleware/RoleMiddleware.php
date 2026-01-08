<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Jika belum login, redirect ke login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Jika role user sesuai daftar role, lanjut
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika role user tidak sesuai
        if ($user->role === 'admin') {
            return redirect('/admin');
        } elseif ($user->role === 'customer') {
            return redirect('/Beranda');
        }

        // fallback
        return redirect('/login');
    }
}
