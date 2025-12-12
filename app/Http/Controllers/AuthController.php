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
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto_profil')) {
            $fotoPath = $request->file('foto_profil')->store('foto_profil', 'public');
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto_profil' => $fotoPath,
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

    public function profile()
    {
        $user = Auth::user(); // user yang sedang login
        return view('dashboard.profile', compact('user'));
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
