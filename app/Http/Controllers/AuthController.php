<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect('admin/dashboard')->with('success', 'Login berhasil');
                    break;
                case 'petugas':
                    return redirect('petugas/dashboard')->with('success', 'Login berhasil');
                    break;
                case 'tamu':
                    return redirect('tamu/dashboard')->with('success', 'Login berhasil');
                    break;
                default:
                    return redirect('auth/login')->with('error', 'Peran tidak dikenali');
            }
        } else {
            return redirect('auth/login')->with('error', 'Email dan password Anda tidak valid.');
        }

        if (Auth::guard('petugas')->attempt($credentials)) {
            // Authentication passed for 'petugas'
            return redirect()->route('petugas.dashboard')->with('success', 'Login berhasil');
        } else {
            return redirect('auth/login')->with('error', 'Email dan password Anda tidak valid.');
        }
    }

    function registerForm()
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus :min karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect('/email/verify');
    }



    function logout()
    {
        Auth::logout();
        return redirect('auth/login')->with('success', 'Berhasil Logout');
    }
}
