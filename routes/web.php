<?php

use App\Http\Controllers\AdminDataDosenController;
use App\Http\Controllers\AdminDataMahasiswaController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\AdminMatkulController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\DosenAbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login-action', [LoginController::class, 'login_action'])->name('login_action');
// Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-action', [LoginController::class, 'register_action'])->name('register_action');


Route::get('/logout', function () {
    Session::flush();
    return redirect()->route('login');
})->name('logout');


Route::prefix('admin')
    ->middleware('role:admin')
    ->group(function () {

        Route::get('/dashboard', [MenuController::class, 'adminDashboard'])->name('admin.dashboard');

        Route::get('/dosen', [AdminDataDosenController::class, 'index'])
            ->name('admin-dataDosen');

        Route::get('/dosen/tambah', [AdminDataDosenController::class, 'tambah'])
            ->name('admin-dataDosen-tambah');

        Route::post('/dosen/store', [AdminDataDosenController::class, 'store'])
            ->name('admin-dataDosen-store');

        Route::get('/dosen/edit/{id}', [AdminDataDosenController::class, 'edit'])
            ->name('admin-dataDosen-edit');

        Route::post('/dosen/update/{id}', [AdminDataDosenController::class, 'update'])
            ->name('admin-dataDosen-update');

        Route::delete('/dosen/delete/{id}', [AdminDataDosenController::class, 'destroy'])
            ->name('admin-dataDosen-delete');

        Route::get('/mahasiswa', [AdminDataMahasiswaController::class, 'index'])
            ->name('admin-dataMahasiswa');

        Route::get('/mahasiswa/tambah', [AdminDataMahasiswaController::class, 'tambah'])
            ->name('admin-dataMahasiswa-tambah');

        Route::post('/mahasiswa/store', [AdminDataMahasiswaController::class, 'store'])
            ->name('admin-dataMahasiswa-store');

        Route::get('/mahasiswa/edit/{id}', [AdminDataMahasiswaController::class, 'edit'])
            ->name('admin-dataMahasiswa-edit');

        Route::post('/mahasiswa/update/{id}', [AdminDataMahasiswaController::class, 'update'])
            ->name('admin-dataMahasiswa-update');

        Route::delete('/mahasiswa/delete/{id}', [AdminDataMahasiswaController::class, 'destroy'])
            ->name('admin-dataMahasiswa-delete');

        Route::get('/matkul', [AdminMatkulController::class, 'index'])
            ->name('admin-matkul');

        Route::get('/matkul/tambah', [AdminMatkulController::class, 'tambah'])
            ->name('admin-matkul-tambah');

        Route::post('/matkul/store', [AdminMatkulController::class, 'store'])
            ->name('admin-matkul-store');

        Route::get('/matkul/edit/{id}', [AdminMatkulController::class, 'edit'])
            ->name('admin-matkul-edit');

        Route::post('/matkul/update/{id}', [AdminMatkulController::class, 'update'])
            ->name('admin-matkul-update');

        Route::delete('/matkul/delete/{id}', [AdminMatkulController::class, 'destroy'])
            ->name('admin-matkul-delete');

        Route::get('/pengaturan', [MenuController::class, 'adminPengaturan']);
        Route::get('/semua-data', [MenuController::class, 'adminSemuaData']);
        Route::get('/laporan', [AdminLaporanController::class, 'index'])->name('admin-laporanAbsensi');

        Route::get('/profile', [AdminProfileController::class, 'index']);
        Route::get('/edit-profile', [AdminProfileController::class, 'ubah']);
        Route::post('/edit-profile', [AdminProfileController::class, 'update']);
    });

Route::prefix('dosen')
    ->middleware('role:dosen')
    ->group(function () {

        Route::get('/dashboard', [MenuController::class, 'dosenDashboard'])->name('dosen.dashboard');
        Route::get('/daftar-siswa', [MenuController::class, 'dosenDaftarSiswa']);

        Route::get('/absensi', [DosenAbsensiController::class, 'index'])->name('dosen.absensi');
        Route::get('/absensi/tambah', [DosenAbsensiController::class, 'create'])->name('dosen.absensi.create');
        Route::post('/absensi/store', [DosenAbsensiController::class, 'store'])->name('dosen.absensi.store');
        Route::get('/absensi/{id}/edit', [DosenAbsensiController::class, 'edit'])->name('dosen.absensi.edit');
        Route::post('/absensi/{id}/update', [DosenAbsensiController::class, 'update'])->name('dosen.absensi.update');
        Route::delete('/absensi/{id}', [DosenAbsensiController::class, 'destroy'])->name('dosen.absensi.destroy');

        Route::get('/riwayat', [MenuController::class, 'dosenRiwayat']);

        Route::get('/profile', [MenuController::class, 'dosenProfile']);
        Route::post('/profile', [MenuController::class, 'dosenProfileUpdate'])->name('dosenProfileUpdate');

        Route::post('/profile/update', [MenuController::class, 'updateProfile']);
    });

Route::prefix('mahasiswa')
    ->middleware('role:mahasiswa')
    ->group(function () {

        Route::get('/dashboard', [MenuController::class, 'mahasiswaDashboard'])->name('mahasiswa.dashboard');
        Route::get('/lihat-absen', [MenuController::class, 'mahasiswaLihatAbsen']);
        Route::get('/qr', [MenuController::class, 'mahasiswaQr']);

        Route::get('/scan', [MenuController::class, 'mahasiswaScanQr'])->name('mahasiswaScanQr');
        Route::post('/scan/show-qr', [MenuController::class, 'mahasiswaShowQr'])->name('mahasiswaShowQr');
        Route::get('/scan/show-qr/{id}', [MenuController::class, 'mahasiswaShowQrForm'])->name('mahasiswaShowQrForm');
        Route::post('/scan/show-qr/submit', [MenuController::class, 'mahasiswaSubmitAbsen'])->name('mahasiswaSubmitAbsen');

        Route::get('/form-absen', [MenuController::class, 'mahasiswaFormAbsen']);
        Route::post('/kirim-absen', [MenuController::class, 'mahasiswaKirimAbsen']);
        Route::get('/validasi', [MenuController::class, 'mahasiswaValidasi']);
        Route::get('/riwayat', [MenuController::class, 'mahasiswaRiwayat']);
        Route::get('/profile', [MenuController::class, 'mahasiswaProfile']);
        Route::post('/profile', [MenuController::class, 'updateProfileMhs'])->name('mahasiswaProfileUpdate');
        Route::post('/profile/update', [MenuController::class, 'updateProfileMhs']);
    });
