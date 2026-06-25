<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
        // 1. Menampilkan Antarmuka Form Login
    public function showLogin() {
        return view('auth.login');
    }
 
    // 2. Memproses Validasi dan Pencocokan Kredensial Login
    public function processLogin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Alamat email tidak boleh dikosongkan.',
            'email.email' => 'Format penulisan email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.'
        ]);
 
        // Melakukan percobaan pencocokan data ke dalam database
        if (Auth::attempt($credentials)) {
            // Regenerasi Session ID untuk menangani celah keamanan Session Fixation Attacks
            $request->session()->regenerate();
 
            // Mengalihkan pengguna ke halaman tujuan semula sebelum dicegat, atau ke halaman utama
            return redirect()->intended('/surat')->with('sukses', 'Selamat Datang Kembali di Aplikasi Simpel-K!');
        }
 
        // Jika pencocokan gagal, kembalikan ke form login dengan pesan kesalahan eksplisit
        return back()->withErrors([
            'login_error' => 'Kombinasi alamat email atau kata sandi Anda salah.',
        ])->onlyInput('email');
    }
 
    // 3. Menampilkan Antarmuka Form Registrasi Warga
    public function showRegister() {
        return view('auth.register');
    }
 
    // 4. Memproses Pendaftaran dan Enkripsi Akun Warga Baru
    public function storeRegister(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed' // Input konfirmasi wajib bernama: password_confirmation
        ], [
            'email.unique' => 'Alamat email ini telah terdaftar di dalam sistem.',
            'password.confirmed' => 'Konfirmasi kata sandi baru Anda tidak cocok.'
        ]);
 
        // Enkripsi password menggunakan facade Hash::make sebelum disimpan ke MySQL
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'warga' // Setiap pendaftar mandiri otomatis diset sebagai warga biasa
        ]);
 
        return redirect()->route('login')->with('sukses', 'Proses pendaftaran berhasil! Silakan masuk.');
    }
 
    // 5. Memproses Logout dan Pemusnahan Sesi Aktif Server
    public function logout(Request $request) {
        Auth::logout();
 
        // Menghancurkan session data dan meregenerasi token CSRF agar tidak disalahgunakan
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect()->route('login')->with('sukses', 'Anda telah berhasil keluar dari sistem.');
    }

}
