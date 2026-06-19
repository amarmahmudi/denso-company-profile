<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi menggunakan Auth Laravel (tanpa package tambahan).
     * Menggunakan Auth::attempt() untuk verifikasi kredensial dan membuat session.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Coba autentikasi menggunakan Auth::attempt()
        // Auth::attempt() otomatis mengecek Hash password dan membuat session
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenerate session ID untuk keamanan (mencegah session fixation)
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')
                ->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        // Login gagal
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['login' => 'Email atau password salah.']);
    }

    /**
     * Proses logout: hapus session autentikasi dan redirect.
     */
    public function logout(Request $request)
    {
        // Logout menggunakan Auth Laravel
        Auth::logout();

        // Invalidate session dan regenerate token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda berhasil logout.');
    }
}
