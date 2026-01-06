<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width: 1180px;">

        <!-- Header -->
        <div class="text-center mb-4">
            <h3 class="fw-bold">Form Absensi Mahasiswa</h3>
            <p class="text-muted mb-0">Silakan lengkapi data absensi dengan benar</p>
        </div>

        <!-- Card -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <form action="{{ route('dosen.absensi.store') }}" method="POST">
                    @csrf

                    <!-- Mata Kuliah -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mata Kuliah</label>
                        <select name="matkul_id" class="form-select">
                            @foreach ($matkul as $m)
                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nama Absensi -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Absensi</label>
                        <input type="text" name="nama" class="form-control"
                            placeholder="Contoh: Pertemuan 1">
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi GPS</label>
                        <div class="row g-2">
                            <div class="col">
                                <input type="text" id="lat" name="lat" class="form-control"
                                    placeholder="Latitude" readonly>
                            </div>
                            <div class="col">
                                <input type="text" id="long" name="long" class="form-control"
                                    placeholder="Longitude" readonly>
                            </div>
                        </div>

                        <button type="button" onclick="ambilLokasi()"
                            class="btn btn-outline-primary w-100 mt-2">
                            📍 Ambil Lokasi Saat Ini
                        </button>
                    </div>

                    <!-- Radius -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Radius Absensi (meter)</label>
                        <input type="number" name="radius" class="form-control"
                            placeholder="Contoh: 50">
                    </div>

                    <!-- Waktu -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Waktu Absensi (WIB)</label>
                        <input type="datetime-local"
                               id="batas"
                               name="batas"
                               class="form-control bg-light"
                               readonly
                               style="pointer-events: none;">
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="des" class="form-control" rows="3"
                            placeholder="Keterangan tambahan absensi"></textarea>
                    </div>

                    <!-- Submit -->
                    <div class="d-grid">
                        <button class="btn btn-primary rounded-pill py-2">
                            Simpan Absensi
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

<script>
    // ===============================
    // AUTO TANGGAL & WAKTU WIB (LOCK)
    // ===============================
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById("batas");

        function setWIBTime() {
            const now = new Date();
            const wibTime = new Date(now.getTime() + (7 * 60 * 60 * 1000));
            input.value = wibTime.toISOString().slice(0, 16);
        }

        setWIBTime();
        input.addEventListener("change", setWIBTime);
        input.addEventListener("input", setWIBTime);
    });

    // ===============================
    // AMBIL LOKASI GPS
    // ===============================
    function ambilLokasi() {
        if (!navigator.geolocation) {
            alert("Browser tidak mendukung GPS");
            return;
        }

        navigator.geolocation.getCurrentPosition(
            function(position) {
                document.getElementById('lat').value =
                    position.coords.latitude.toFixed(7);
                document.getElementById('long').value =
                    position.coords.longitude.toFixed(7);
            },
            function(error) {
                alert("Gagal mengambil lokasi: " + error.message);
            }, {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    }
</script>

</html>
