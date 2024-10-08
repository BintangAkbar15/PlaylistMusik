<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class accessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $is_admin): Response
{
    // Cek apakah pengguna sudah login
    if (Auth::check()) {
        // Cek apakah user memiliki akses yang sesuai
        if (Auth::user()->is_admin == filter_var($is_admin, FILTER_VALIDATE_BOOLEAN)) {
            return $next($request);
        } else {
            // Redirect ke dashboard yang sesuai jika perannya tidak sesuai
            return Auth::user()->is_admin ? redirect()->route('adminDashboard') : redirect()->route('userDashboard');
        }
    }

    // Jika belum login, redirect ke login
    return redirect()->route('login.tampil');
}

}
