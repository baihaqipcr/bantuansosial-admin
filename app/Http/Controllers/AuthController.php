<?php

namespace App\Http\Controllers;

use App\Models\User; // gunakan model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ===========================
    //  FORM LOGIN
    // ===========================
    public function showLoginForm()
    {
        return view('admin.login-form');
    }

    // ===========================
    //  FORM REGISTER
    // ===========================
    public function showRegisterForm()
    {
        return view('admin.register-form');
    }

    // ===========================
    //  REGISTER ACCOUNT
    // ===========================
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // Simpan user
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'nama_lengkap' => $request->nama_lengkap,  ← kalau kamu pakai
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ===========================
    //  LOGIN ACCOUNT
    // ===========================
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah username ada di database
        $users = User::where('username', $request->username)->first();

        if (!$users) {
            return back()->withErrors([
                'login_error' => 'Akun belum terdaftar!',
            ]);
        }

        // Cek password
        if (!Hash::check($request->password, $users->password)) {
            return back()->withErrors([
                'login_error' => 'Password salah!',
            ]);
        }

        // Login manual (tanpa Auth::attempt)
        Auth::login($users);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    // ===========================
    //  LOGOUT
    // ===========================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
