<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Sistem Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika berhasil login
            $user = Auth::user();

            // Periksa apakah pengguna memiliki peran (role) yang valid
            if ($user->role_id === 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id === 2) {
                return redirect()->route('petugas.dashboard');
            } elseif ($user->role_id === 3) {
                return redirect()->route('peminjam.dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            // Jika login gagal
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    // Sistem Register
    public function register(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name_lengkap' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        // Buat user baru
        $user = User::create([
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
            'email' => $validatedData['email'],
            'name_lengkap' => $validatedData['name_lengkap'],
            'alamat' => $validatedData['alamat'],
            'role_id' => 3, 
        ]);

        // Redirect pengguna setelah registrasi
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
