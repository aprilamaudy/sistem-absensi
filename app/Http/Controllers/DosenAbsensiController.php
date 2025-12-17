<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Matkul;
use Illuminate\Http\Request;

class DosenAbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('matkul')->get();
        return view('dosen.absensi.index', compact('absensi'));
    }

    public function create()
    {
        $matkul = Matkul::all();
        return view('dosen.absensi.tambah', compact('matkul'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'matkul_id' => 'required',
            'nama' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'radius' => 'required|numeric',
            'batas' => 'required'
        ]);

        Absensi::create($request->all());

        return redirect()->route('dosen.absensi')->with('success', 'Absensi berhasil dibuat');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $matkul = Matkul::all();
        return view('dosen.absensi.edit', compact('absensi', 'matkul'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('dosen.absensi')->with('success', 'Absensi berhasil diperbarui');
    }

    public function destroy($id)
    {
        Absensi::findOrFail($id)->delete();
        return back()->with('success', 'Absensi dihapus');
    }
}
