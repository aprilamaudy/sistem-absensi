<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDataDosenController extends Controller
{
    public function index()
    {
        $dosens = User::where('role', 'dosen')->get();
        return view('admin.data-dosen', compact('dosens'));
    }

    // 🔹 FORM TAMBAH
    public function tambah()
    {
        return view('admin.tambah-dosen');
    }

    // 🔹 SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string',
            'nip'   => 'required|unique:users,nip',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required',
        ]);


        User::create([
            'nama_user' => $request->nama,
            'username'  => $request->nip, // username = nip
            'nip'       => $request->nip,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'password'  => Hash::make($request->nip), // default password = nip
            'role'      => 'dosen',
        ]);

        return redirect()->route('admin-dataDosen')
            ->with('success', 'Data dosen berhasil ditambahkan');
    }

    // 🔹 FORM EDIT
    public function edit($id)
    {
        $dosen = User::findOrFail($id);
        return view('admin.edit-dosen', compact('dosen'));
    }

    // 🔹 UPDATE DATA
    public function update(Request $request, $id)
    {
        $dosen = User::findOrFail($id);

        $request->validate([
            'nama'  => 'required',
            'nip'   => 'required|unique:users,nip,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'no_hp' => 'required',
        ]);

        $dosen->update([
            'nama_user' => $request->nama,
            'nip'       => $request->nip,
            'username'  => $request->nip,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
        ]);

        return redirect()->route('admin-dataDosen')
            ->with('success', 'Data dosen berhasil diperbarui');
    }

    // 🔹 HAPUS DATA
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin-dataDosen')
            ->with('success', 'Data dosen berhasil dihapus');
    }
}
