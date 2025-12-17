<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <h3 class="mb-4">Form Absensi</h3>

    <form action="/mahasiswa/kirim-absen" method="POST">
        @csrf

        <!-- data QR dari hasil scan -->
        <input type="hidden" name="qr_data" value="{{ request('qr') }}">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <select name="keterangan" class="form-control" required>
                <option value="Hadir">Hadir</option>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
                <option value="Alpa">Alpa</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Validasi Lokasi (GPS)</label>
            <input type="text" id="lokasi" name="lokasi" class="form-control" readonly required>
        </div>

        <button class="btn btn-success w-100">Kirim Absensi</button>
    </form>

</div>

<script>
navigator.geolocation.getCurrentPosition(function(position) {
    document.getElementById('lokasi').value =
        position.coords.latitude + "," + position.coords.longitude;
});
</script>

</body>
</html>
