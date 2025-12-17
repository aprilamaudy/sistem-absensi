<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buat Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Buat Absen Baru</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="/dosen/buat-absen/save" method="POST">
                @csrf

                <!-- PILIH KELAS -->
                <div class="mb-3">
                    <label class="form-label">Pilih Kelas</label>
                    <select class="form-select" name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="TI-1A">TI-1A</option>
                        <option value="TI-1B">TI-1B</option>
                        <option value="TI-2A">TI-2A</option>
                        <option value="TI-2B">TI-2B</option>
                    </select>
                </div>

                <!-- KETERANGAN -->
                <div class="mb-3">
                    <label class="form-label">Keterangan / Pertemuan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Contoh: Pertemuan 5" required>
                </div>

                <!-- TANGGAL (mm/dd/yyyy) -->
                <div class="mb-3">
                    <label class="form-label">Tanggal (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" name="tanggal" placeholder="mm/dd/yyyy" required>
                </div>

                <!-- BATAS ABSEN -->
                <div class="mb-3">
                    <label class="form-label">Batas Absen (Jam)</label>
                    <input type="time" class="form-control" name="batas_absen" required>
                </div>

                <!-- VALIDASI LOKASI (RADIUS) -->
                <div class="mb-3">
                    <label class="form-label">Radius Validasi Lokasi (meter)</label>
                    <input type="number" class="form-control" name="radius" placeholder="Contoh: 50" required>
                </div>

                <!-- KOORDINAT LATITUDE -->
                <div class="mb-3">
                    <label class="form-label">Latitude Lokasi</label>
                    <input type="text" class="form-control" name="latitude" placeholder="-6.200001" required>
                </div>

                <!-- KOORDINAT LONGITUDE -->
                <div class="mb-3">
                    <label class="form-label">Longitude Lokasi</label>
                    <input type="text" class="form-control" name="longitude" placeholder="106.816666" required>
                </div>

                <button class="btn btn-primary w-100 mt-3">Simpan Absen</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
