<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna memiliki peran Admin
        if ($request->user() && $request->user()->hasRole('Admin')) {
            return $next($request); // Izinkan akses ke tindakan berikutnya
        }

        // Jika tidak memiliki peran Admin, arahkan ke halaman lain (misalnya, beranda)
        return redirect('/dashboard'); // Ganti ini dengan URL yang sesuai
    }
}

