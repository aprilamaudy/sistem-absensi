<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Kehadiran Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2 class="fw-bold mb-4">Lihat Kehadiran Mahasiswa</h2>

    <!-- FILTER -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="#" method="GET" class="row g-3">

                <!-- KELAS -->
                <div class="col-md-6">
                    <label class="form-label">Pilih Kelas</label>
                    <select name="kelas" class="form-select">
                        <option value="">-- Pilih Kelas --</option>
                        <option value="TI-1A">TI-1A</option>
                        <option value="TI-1B">TI-1B</option>
                        <option value="TI-2A">TI-2A</option>
                    </select>
                </div>

                <!-- Pertemuan -->
                <div class="col-md-4">
                    <label class="form-label">Pertemuan</label>
                    <select name="pertemuan" class="form-select">
                        <option value="">-- Pilih Pertemuan --</option>
                        <option>Pertemuan 1</option>
                        <option>Pertemuan 2</option>
                        <option>Pertemuan 3</option>
                    </select>
                </div>

                <!-- Button -->
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-primary w-100">Tampilkan</button>
                </div>

            </form>

        </div>
    </div>

    <!-- DATA TABEL -->
    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-3 fw-semibold">Daftar Mahasiswa</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad Rizky</td>
                            <td>12345678</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Dewi Lestari</td>
                            <td>87654321</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Budi Saputra</td>
                            <td>11223344</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
