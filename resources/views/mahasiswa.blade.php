<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .topbar {
            background: white;
            padding: 18px 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .list-group-item {
            padding: 15px 20px;
            font-size: 16px;
            border-radius: 12px !important;
            margin-bottom: 10px;
            border: none;
            box-shadow: 0 1px 5px rgba(0,0,0,0.06);
            transition: .3s;
        }

        .list-group-item:hover {
            background: #0d6efd;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container py-4">

        <div class="topbar d-flex justify-content-between align-items-center">
            <h3 class="m-0">Dashboard Mahasiswa</h3>
            <a href="/mahasiswa/profile" class="btn btn-primary">Profil</a>
        </div>

        <!-- Stat Cards -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4">
                    <h6>Presensi Hari Ini</h6>
                    <h2 class="text-primary">{{$jumlahAbsensiHariIni}}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    <h6>Total Pertemuan</h6>
                    <h2 class="text-success">{{$totalPertemuan}}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    <h6>Kehadiran</h6>
                    <h2 class="text-warning">{{$presentasiKehadiran}}%</h2>
                </div>
            </div>
        </div>

        <h4 class="mt-5">Menu Aksi</h4>

        <div class="list-group mt-3">
            <a href="/mahasiswa/scan" class="list-group-item">📷 Scan QR Code</a>
            <a href="/mahasiswa/riwayat" class="list-group-item">📅 Riwayat Absen</a>
        </div>

        <!-- LOGOUT -->
        <hr class="mt-5">

        <div class="text-center mt-3">
            <a href="{{ route('logout') }}"
               class="btn btn-danger px-5"
               onclick="return confirm('Yakin ingin logout?')">
                Logout
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
