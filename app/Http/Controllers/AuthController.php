<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        // Jika sudah login, langsung ke dashboard admin
        if (Auth::check()) {
            return redirect('/admin');
        }
        
        // Tampilkan form login
        return view('auth.login');
    }

    // Memproses data dari form login
    public function login(Request $request)
    {
        // Validasi wajib isi untuk email & password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kecocokan data dengan database
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Jika cocok, perbarui sesi dan masuk ke admin
            $request->session()->regenerate();
            return redirect()->intended('/admin')->with('success', 'Berhasil login sebagai Admin.');
        }

        // Jika salah, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    // Memproses fitur logout
    public function logout(Request $request)
    {
        // Proses keluar (hapus status login)
        Auth::logout();

        // Hapus memori/sesi aktif demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Kembali ke halaman login
        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}
