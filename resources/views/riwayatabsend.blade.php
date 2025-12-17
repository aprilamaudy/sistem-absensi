<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2 class="fw-bold mb-4">Riwayat Absen Mahasiswa</h2>

    <!-- FILTER -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="#" method="GET" class="row g-3">

                <!-- Filter Bulan -->
                <div class="col-md-6">
                    <label class="form-label">Bulan</label>
                    <select name="bulan" class="form-select">
                        <option value="">-- Pilih Bulan --</option>
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                    </select>
                </div>

                <!-- Filter Mata Kuliah -->
                <div class="col-md-6">
                    <label class="form-label">Mata Kuliah</label>
                    <select name="matkul" class="form-select">
                        <option value="">-- Semua Mata Kuliah --</option>
                        <option>Pemrograman Web</option>
                        <option>Basis Data</option>
                        <option>Matematika Diskrit</option>
                        <option>Jaringan Komputer</option>
                    </select>
                </div>

                <!-- Button -->
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-primary px-4">Filter</button>
                </div>

            </form>

        </div>
    </div>

    <!-- TABEL RIWAYAT -->
    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="fw-semibold mb-3">Daftar Riwayat Absen</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Mata Kuliah</th>
                            <th>Jam Absen</th>
                            <th>Keterangan</th>
                            <th>Validasi Lokasi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>01/10/2025</td>
                            <td>Pemrograman Web</td>
                            <td>08:15</td>
                            <td><span class="badge bg-success">Hadir</span></td>
                            <td><span class="badge bg-success">Valid</span></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>03/10/2025</td>
                            <td>Basis Data</td>
                            <td>-</td>
                            <td><span class="badge bg-warning text-dark">Izin</span></td>
                            <td><span class="badge bg-secondary">N/A</span></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>05/10/2025</td>
                            <td>Jaringan Komputer</td>
                            <td>-</td>
                            <td><span class="badge bg-danger">Alpa</span></td>
                            <td><span class="badge bg-danger">Tidak Valid</span></td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
