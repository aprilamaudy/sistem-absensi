<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class AdminMatkulController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::all();
        return view('admin.data-matkul', compact('matkuls'));
    }

    // 🔹 FORM TAMBAH
    public function tambah()
    {
        return view('admin.tambah-matkul');
    }

    // 🔹 SIMPAN DATA
    public function store(Request $request)
{
    $validated = $request->validate([
        'kode' => 'required|unique:matkuls,kode',
        'nama' => 'required',
        'des'  => 'nullable',
    ], [
        'kode.required' => 'Kode mata kuliah wajib diisi',
        'kode.unique'   => 'Kode mata kuliah sudah digunakan',
        'nama.required' => 'Nama mata kuliah wajib diisi',
    ]);

    Matkul::create($validated);

    return redirect()->route('admin-matkul')
        ->with('success', 'Mata kuliah berhasil ditambahkan');
    
}

    // 🔹 FORM EDIT
    public function edit($id)
    {
        $matkul = Matkul::findOrFail($id);
        return view('admin.edit-matkul', compact('matkul'));
    }

    // 🔹 UPDATE DATA
    public function update(Request $request, $id)
    {
        $matkul = Matkul::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:matkuls,kode,' . $id,
            'nama' => 'required',
            'des'  => 'nullable',
        ]);

        $matkul->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'des'  => $request->des,
        ]);

        return redirect()->route('admin-matkul')
            ->with('success', 'Mata kuliah berhasil diperbarui');
    }

    // 🔹 HAPUS DATA
    public function destroy($id)
    {
        Matkul::findOrFail($id)->delete();

        return redirect()->route('admin-matkul')
            ->with('success', 'Mata kuliah berhasil dihapus');
    }
}
