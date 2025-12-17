<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function register()
{
    return view('register');
}

    public function register_action(Request $request)
{
    $request->validate([
        'username'  => 'required|string|max:255|unique:users,username',
        'password'  => 'required|string|min:4',
        'role'      => 'required|in:mahasiswa,dosen'
    ]);

    if ($request->username === $request->password) {
        return back()
            ->withErrors(['password' => 'Password tidak boleh sama dengan username'])
            ->withInput();
    }

    User::create([
        'nama_user' => $request->username,
        'username'  => $request->username,
        'password'  => Hash::make($request->password),
        'role'      => $request->role
    ]);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil. Silakan login.');
}



    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek login
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {

            $user = Auth::user();

            // SESSION YANG DIPAKAI MIDDLEWARE
            Session::put('login', true);
            Session::put('user_id', $user->id);
            Session::put('name', $user->name);
            Session::put('username', $user->username);
            Session::put('role', $user->role);

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Login berhasil');
            } elseif ($user->role === 'dosen') {
                return redirect()->route('dosen.dashboard')
                    ->with('success', 'Login berhasil');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard')
                    ->with('success', 'Login berhasil');
            }

            // Jika role tidak dikenal
            Auth::logout();
            Session::flush();
            return redirect('/')
                ->with('error', 'Role tidak dikenali');

        }

        return redirect()->route('login')
            ->with('error', 'Username atau password salah');
    }
}
