<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function ubah()
    {
        return view('admin.edit-profile');
    }

    // 🔹 UPDATE PROFILE
    public function update(Request $request)
    {
        $user = auth()->user();

        // VALIDASI
        $request->validate([
            'nama_user' => 'required|string|max:100',
            'username'  => 'required|string|max:50|unique:users,username,' . $user->id,
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|min:6',
        ]);

        // UPDATE DATA
        $user->nama_user = $request->nama_user;
        $user->username  = $request->username;
        $user->email     = $request->email;

        // JIKA PASSWORD DIISI
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/admin/profile')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
