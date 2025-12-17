<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MenuController extends Controller
{
    // ======================
    // LOGIN (untuk semua role)
    // ======================
    public function login()
    {
        return view('login');
    }

   

    // ======================
    // ADMIN
    // ======================
    public function adminDashboard()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.dashboard');
    }

    public function adminDataDosen()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.data-dosen');
    }

    public function adminTambahDosen()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.tambah-dosen');
    }

    public function adminDataMahasiswa()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.data-mahasiswa');
    }

    public function adminTambahMahasiswa()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.tambah-mahasiswa');
    }

    public function adminPengaturan()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.pengaturan');
    }

    public function adminSemuaData()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.semua-data');
    }

    public function adminLaporan()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.laporan');
    }
    public function profile()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.profile');
    }
    public function adminUbahPassword()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.ubah-password');
    }
    public function adminEditProfile()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return view('admin.edit-profile');
    }

    public function adminUpdateProfile()
    {
        if (session('role') !== 'admin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman admin!');
        }
        return back();
    }

    // ======================
    // DOSEN
    // ======================
    public function dosenDashboard()
    
    {
        // // // Jika role bukan dosen, tetap di halaman itu (tidak diarahkan ke admin atau mahasiswa)
        // if (Session::get('role') !== 'dosen') {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman dosen!');
        // }

        return view('dosen');
    }
    public function updateProfile(Request $request)
    {
        // VALIDASI
        $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:50,' . Auth::id(),
        ]);

        // AMBIL USER LOGIN
        $user = Auth::user();

        // UPDATE DATA
        $user->nama_user = $request->name;
        $user->username  = $request->username;
        $user->save();

        // KEMBALI KE HALAMAN PROFIL
        return redirect('/dosen/dashboard')->with('success', 'Profil berhasil diperbarui');
    }

    public function dosenDaftarSiswa()
    {
        // if (Session::get('role') !== 'dosen') {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman dosen!');
        // }   
        return view('lihatDaftarMhs');
    }

    public function dosenBuatAbsen()
    {
        // if (Session::get('role') !== 'dosen') {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman dosen!');
        // }   
        return view('lihatDaftarMhs');
    }

    public function dosenValidasiLokasi()
    {
        // if (Session::get('role') !== 'dosen') {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman dosen!');
        // }
        return view('dosen.validasiLokasi');
    }

    public function dosenRiwayat()
    {
        // if (Session::get('role') !== 'dosen') {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman dosen!');
        // }
        return view('riwayatabsend');
    }
    public function dosenProfile()
    {
        // if (session('role') !== 'dosen') {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman dosen!');
        // }
        return view('dosen-profile');
    }

    // ======================
    // MAHASISWA
    // ======================

    public function updateProfileMhs(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nama_user' => 'required|string|max:100',
            'username' => 'required|string|max:50,' . Auth::id(),
        ]);

        // USER LOGIN
        $user = Auth::user();

        // UPDATE DATA
        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->save();

        // REDIRECT
        return redirect('/mahasiswa/dashboard')->with('success', 'Profil berhasil diperbarui');

    }


    public function mahasiswaDashboard()
    {
       
        return view('mahasiswa');
    }

    public function mahasiswaLihatAbsen()
    {
        
        return view('mahasiswa.lihatAbsen');
    }

    public function mahasiswaQr()
    {
        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return view('scan');
    }

    // ======================
    // SCAN QR → FORM ABSEN
    // ======================

    public function mahasiswaScanQr()
    {
        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return view('scan'); // video scanner
    }

    public function mahasiswaFormAbsen(Request $r)
    {
        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return view('formabsen', compact('qrData'));
    }

    public function mahasiswaKirimAbsen(Request $r)
    {   
        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return redirect('/mahasiswa/riwayat')
            ->with('success', 'Absensi berhasil dikirim!');
    }

    public function mahasiswaRiwayat()
    {
        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return view('riwayatabsend');
    }

    public function mahasiswaProfile()
    {
        if (session('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return view('mahasiswa-profile');
    }
}