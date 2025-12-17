<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kehadiran;
use App\Models\Matkul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        $jumlahDosen = User::where('role', 'dosen')->count();
        $jumlahMahasiswa = User::where('role', 'mahasiswa')->count();
        $jumlahAdmin = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact('jumlahDosen', 'jumlahMahasiswa', 'jumlahAdmin'));
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
        $jumlahMahasiswa = User::where('role', 'mahasiswa')->count();
        $jumlahMatkul = Matkul::count();
        $jumlahAbsenHariIni = Absensi::where('created_at', now())->count();

        return view('dosen', compact('jumlahMahasiswa', 'jumlahMatkul', 'jumlahAbsenHariIni'));
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
        $dataMahasiswa = User::where('role', 'mahasiswa')->get();
        return view('dosen.daftar-mahasiswa.index', compact('dataMahasiswa'));
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
        $dataKehadiran = Kehadiran::all();
        return view('dosen.riwayat.index', compact('dataKehadiran'));
    }
    public function dosenProfile()
    {
        // if (session('role') !== 'dosen') {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman dosen!');
        // }
        return view('dosen-profile');
    }

    public function dosenProfileUpdate(Request $request)
    {
        $user = auth()->user();

        // VALIDASI
        $request->validate([
            'nama_user' => 'required|string|max:100',
            'nip'  => 'required|unique:users,nip,' . $user->id,
            'username'  => 'required|string|max:50|unique:users,username,' . $user->id,
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required|string|max:15',
            'password'  => 'nullable|min:6',
        ]);

        // UPDATE DATA
        $user->nama_user = $request->nama_user;
        $user->nip = $request->nip;
        $user->username  = $request->username;
        $user->email     = $request->email;
        $user->no_hp     = $request->no_hp;

        // JIKA PASSWORD DIISI
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/dosen/dashboard')
            ->with('success', 'Profil berhasil diperbarui');
    }

    // ======================
    // MAHASISWA
    // ======================

    public function updateProfileMhs(Request $request)
    {
        // VALIDASI
        $user = auth()->user();


        // VALIDASI
        $request->validate([
            'nama_user' => 'required|string|max:100',
            'nim'  => 'required|unique:users,nim,' . $user->id,
            'username'  => 'required|string|max:50|unique:users,username,' . $user->id,
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required|string|max:15',
            'password'  => 'nullable|min:6',
        ]);

        // UPDATE DATA
        $user->nama_user = $request->nama_user;
        $user->nim = $request->nim;
        $user->username  = $request->username;
        $user->email     = $request->email;
        $user->no_hp     = $request->no_hp;

        // JIKA PASSWORD DIISI
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // REDIRECT
        return redirect('/mahasiswa/dashboard')->with('success', 'Profil berhasil diperbarui');
    }


    public function mahasiswaDashboard()
    {
        $jumlahAbsensiHariIni = Kehadiran::where('user_id', auth()->id())
            ->whereDate('created_at', today())
            ->count();

        $totalPertemuan = Kehadiran::where('user_id', auth()->id())->count();
        $presentasiKehadiran = $totalPertemuan / Absensi::count() * 100;
        return view('mahasiswa', compact('jumlahAbsensiHariIni', 'totalPertemuan', 'presentasiKehadiran'));
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

        $dataAbsensi = Absensi::all();

        return view('mahasiswa.scan-qr', compact('dataAbsensi')); // video scanner
    }

    public function mahasiswaShowQr(Request $request)
    {

        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }

        $dataAbsensi = Absensi::find($request->absensi_id);

        return view('mahasiswa.show', compact('dataAbsensi')); // video scanner
    }

    public function mahasiswaShowQrForm($absensi_id)
    {
        $user = User::find(auth()->id());
        $absensi = Absensi::find(decrypt($absensi_id));
        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return view('mahasiswa.form', compact('user', 'absensi'));
    }

    private function hitungJarak($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // meter

        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos($lat1) * cos($lat2) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return round($earthRadius * $c, 2); // meter
    }


    public function mahasiswaSubmitAbsen(Request $request)
    {
        if (Session::get('role') !== 'mahasiswa') {
            return back()->with('error', 'Anda tidak memiliki akses!');
        }

        $request->validate([
            'absensi_id' => 'required',
            'lat' => 'nullable',
            'long' => 'nullable',
            'ket' => 'required|in:hadir,izin,alpha',
        ]);

        $absensi = Absensi::findOrFail($request->absensi_id);

        // DEFAULT
        $jarak = null;
        $valid = 'n/a';

        // JIKA HADIR → HITUNG JARAK
        if ($request->ket === 'hadir') {

            $jarak = $this->hitungJarak(
                $absensi->lat,
                $absensi->long,
                $request->lat,
                $request->long
            );

            // CEK RADIUS
            if ($jarak <= $absensi->radius) {
                $valid = 'valid';
            } else {
                $valid = 'tidak valid';
            }
        }

        $exist = Kehadiran::where('user_id', auth()->id())->where('absensi_id', $absensi->id)->exists();
        if (!$exist) {
            Kehadiran::create([
                'absensi_id' => $absensi->id,
                'user_id' => auth()->id(),
                'ket' => $request->ket,
                'jarak' => $jarak,
                'valid' => $valid,
            ]);
        }

        return redirect('/mahasiswa/riwayat')
            ->with('success', 'Absensi berhasil dikirim!');
    }

    public function mahasiswaRiwayat()
    {
        if (Session::get('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }

        $dataKehadiran = Kehadiran::where('user_id', auth()->user()->id)->get();
        return view('mahasiswa.riwayat', compact('dataKehadiran'));
    }

    public function mahasiswaProfile()
    {
        if (session('role') !== 'mahasiswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa!');
        }
        return view('mahasiswa-profile');
    }
}
