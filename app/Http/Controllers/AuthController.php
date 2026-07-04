<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /** Tampilkan form login */
    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'customer') {
                return redirect('/');
            }
            return redirect('/dashboard');
        }
        return view('login');
    }

    /** Tampilkan info lupa password */
    public function showLupaPassword()
    {
        return view('lupa-password');
    }

    /** Proses login pakai username/email + password */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'ID Karyawan, Username, atau Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $loginInput = trim($request->username);

        // Cari user berdasarkan username (case-insensitive) atau email
        $user = User::where('username', strtoupper($loginInput))
                    ->orWhere('email', $loginInput)
                    ->first();

        // Cek user ada & password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();
            
            if ($user->role === 'customer') {
                return redirect('/');
            }
            return redirect()->intended('/dashboard');
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'ID Karyawan, Username, Email, atau password salah.']);
    }

    /** Tampilkan form register customer */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('register');
    }

    /** Proses registrasi customer baru */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3|max:100',
            'username' => 'required|string|unique:users,username|max:30|alpha_num',
            'email'    => 'required|email|unique:users,email|max:100',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'name.min'          => 'Nama lengkap minimal 3 karakter.',
            'username.required' => 'Username wajib diisi.',
            'username.unique'   => 'Username ini sudah terdaftar.',
            'username.alpha_num'=> 'Username hanya boleh huruf dan angka.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'username' => strtoupper(trim($request->username)),
            'email'    => strtolower(trim($request->email)),
            'role'     => 'customer',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')->with('sukses_register', 'Akun customer berhasil dibuat! Silakan lakukan booking.');
    }

    /** Logout */
    public function logout(Request $request)
    {
        $role = Auth::user() ? Auth::user()->role : 'guest';
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        if ($role === 'customer') {
            return redirect('/')->with('sukses_logout', 'Berhasil logout. Sampai jumpa! 👋');
        }
        return redirect('/login')->with('sukses_logout', 'Berhasil logout. Sampai jumpa! 👋');
    }
}
