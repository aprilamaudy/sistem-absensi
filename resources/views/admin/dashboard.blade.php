<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            background: #0d6efd;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 20px;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            border-radius: 10px;
            color: #eaeaea;
            text-decoration: none;
            margin-bottom: 10px;
            transition: 0.3s;
            font-size: 16px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        .card {
            border-radius: 15px;
        }

        .topbar {
            background: white;
            padding: 15px 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>Admin Dashboard</h4>

        <a href="/admin/dashboard">Dashboard</a>
        <a href="{{route('admin-dataDosen')}}">Data Dosen</a>
        <a href="{{route('admin-dataMahasiswa')}}">Data Mahasiswa</a>
        <a href="{{route('admin-matkul')}}">Data Matakuliah</a>
        <a href="{{route('admin-laporanAbsensi')}}">Laporan Absensi</a>
        {{-- <a href="/admin/pengaturan">Pengaturan</a> --}}

        <!-- MENU PROFIL BARU
        <a href="/admin/profile">Profile</a> -->

        <a href="/logout">🚪 Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h3 class="m-0">Selamat Datang, Admin</h3>

            <!-- TOMBOL PROFIL SUDAH DIUBAH -->
            <!-- <a href="/admin/profile" class="btn btn-outline-primary">Profil</a> -->
        </div>

        <!-- CARDS -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm">
                    <h5>Total Dosen</h5>
                    <h2 class="text-primary">{{$jumlahDosen}}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 shadow-sm">
                    <h5>Total Mahasiswa</h5>
                    <h2 class="text-success">{{$jumlahMahasiswa}}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 shadow-sm">
                    <h5>Total Admin</h5>
                    <h2 class="text-warning">{{$jumlahAdmin}}</h2>
                </div>
            </div>
        </div>

        <!-- MENU AKSI CEPAT -->
        <div class="mt-5">
            <h4>Menu Aksi Cepat</h4>
            <div class="list-group mt-3 shadow-sm">

                <a class="list-group-item list-group-item-action" href="{{route('admin-dataDosen-tambah')}}">
                    ➕ Tambah Data Dosen
                </a>

                <a class="list-group-item list-group-item-action" href="{{route('admin-dataDosen-tambah')}}">
                    ➕ Tambah Data Mahasiswa
                </a>

                <a class="list-group-item list-group-item-action" href="{{route('admin-laporanAbsensi')}}">
                    📊 Laporan
                </a>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
