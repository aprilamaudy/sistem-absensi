<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDataMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        return view('admin.data-mahasiswa', compact('mahasiswas'));
    }

    // 🔹 FORM TAMBAH
    public function tambah()
    {
        return view('admin.tambah-mahasiswa');
    }

    // 🔹 SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string',
            'nim'   => 'required|unique:users,nim',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required',
        ]);

        User::create([
            'nama_user' => $request->nama,
            'username'  => $request->nim, // login pakai NIM
            'nim'       => $request->nim,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'password'  => Hash::make($request->nim), // default password = NIM
            'role'      => 'mahasiswa',
        ]);

        return redirect()->route('admin-dataMahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    // 🔹 FORM EDIT
    public function edit($id)
    {
        $mahasiswa = User::findOrFail($id);
        return view('admin.edit-mahasiswa', compact('mahasiswa'));
    }

    // 🔹 UPDATE DATA
    public function update(Request $request, $id)
    {
        $mahasiswa = User::findOrFail($id);

        $request->validate([
            'nama'  => 'required',
            'nim'   => 'required|unique:users,nim,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'no_hp' => 'required',
        ]);

        $mahasiswa->update([
            'nama_user' => $request->nama,
            'nim'       => $request->nim,
            'username'  => $request->nim,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
        ]);

        return redirect()->route('admin-dataMahasiswa')
            ->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    // 🔹 HAPUS DATA
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin-dataMahasiswa')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
