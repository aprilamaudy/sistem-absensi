<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3 class="fw-bold mb-4">Tambah Data Dosen</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="/admin/dosen/store" method="POST">
                <!-- CSRF untuk Laravel -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mata Kuliah</label>
                        <input type="text" name="matkul" class="form-control" placeholder="Contoh: Basis Data, PBO">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jurusan</label>
                        <select class="form-select" name="jurusan" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                            <option>Manajemen Informatika</option>
                        </select>
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="/admin/dashboard" class="btn btn-secondary me-2">Kembali</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
