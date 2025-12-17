<?php

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

        Route::get('/dosen', [MenuController::class, 'adminDataDosen']);
        Route::get('/dosen/tambah', [MenuController::class, 'adminTambahDosen']);

        Route::get('/mahasiswa', [MenuController::class, 'adminDataMahasiswa']);
        Route::get('/mahasiswa/tambah', [MenuController::class, 'adminTambahMahasiswa']);

        Route::get('/pengaturan', [MenuController::class, 'adminPengaturan']);
        Route::get('/semua-data', [MenuController::class, 'adminSemuaData']);
        Route::get('/laporan', [MenuController::class, 'adminLaporan']);

        Route::get('/profile', [MenuController::class, 'profile']);
        Route::get('/ubah-password', [MenuController::class, 'adminUbahPassword']);
        Route::post('/ubah-password', [MenuController::class, 'adminUpdatePassword']);
        Route::get('/edit-profile', [MenuController::class, 'adminEditProfile']);
        Route::post('/edit-profile', [MenuController::class, 'adminUpdateProfile']);
});

Route::prefix('dosen')
    ->middleware('role:dosen')
    ->group(function () {

        Route::get('/dashboard', [MenuController::class, 'dosenDashboard'])->name('dosen.dashboard');
        Route::get('/daftar-siswa', [MenuController::class, 'dosenDaftarSiswa']);
        Route::get('/buat-absen', [MenuController::class, 'dosenBuatAbsen']);
        Route::post('/buat-absen/save', [MenuController::class, 'dosenSimpanAbsen']);
        Route::get('/validasi', [MenuController::class, 'dosenValidasiLokasi']);
        Route::get('/riwayat', [MenuController::class, 'dosenRiwayat']);
        Route::get('/profile', [MenuController::class, 'dosenProfile']);
        Route::post('/profile/update', [MenuController::class, 'updateProfile'])
        ->middleware('role:dosen');

});

Route::prefix('mahasiswa')
    ->middleware('role:mahasiswa')
    ->group(function () {

        Route::get('/dashboard', [MenuController::class, 'mahasiswaDashboard'])->name('mahasiswa.dashboard');
        Route::get('/lihat-absen', [MenuController::class, 'mahasiswaLihatAbsen']);
        Route::get('/qr', [MenuController::class, 'mahasiswaQr']);
        Route::get('/scan', [MenuController::class, 'mahasiswaScanQr']);
        Route::get('/form-absen', [MenuController::class, 'mahasiswaFormAbsen']);
        Route::post('/kirim-absen', [MenuController::class, 'mahasiswaKirimAbsen']);
        Route::get('/validasi', [MenuController::class, 'mahasiswaValidasi']);
        Route::get('/riwayat', [MenuController::class, 'mahasiswaRiwayat']);
        Route::get('/profile', [MenuController::class, 'mahasiswaProfile']);    
        Route::post('/profile/update', [MenuController::class, 'updateProfileMhs']);

});
