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

        <div class="text-center mb-4">
            <h2 class="fw-bold mb-4">Abseni Mahasiswa</h2>
        </div>

        <!-- FILTER -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">


                <form action="{{ route('mahasiswaSubmitAbsen') }}" method="POST">
                    @csrf

                    <input type="text" name="absensi_id" value="{{ $absensi->id }}" hidden>
                    <input type="text" name="nama_user" class="form-control mb-2" value="{{ $user->nama_user }}"
                        readonly>
                    <input type="text" name="nim" class="form-control mb-2" value="{{ $user->nim }}" readonly>
                    <input type="text" name="email" class="form-control mb-2" value="{{ $user->email }}" readonly>
                    <input type="text" name="no_hp" class="form-control mb-2" value="{{ $user->no_hp }}" readonly>

                    <div class="row">
                        <div class="col">
                            <input type="text" id="lat" name="lat" class="form-control"
                                placeholder="Latitude" readonly>
                        </div>
                        <div class="col">
                            <input type="text" id="long" name="long" class="form-control"
                                placeholder="Longitude" readonly>
                        </div>
                    </div>

                    <button type="button" onclick="ambilLokasi()" class="btn btn-info mt-2">
                        📍 Ambil Lokasi Saat Ini
                    </button>

                    <br>
                    <br>

                    <select name="ket" class="form-select" required>
                        <option value="">-- Keterangan --</option>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="alpha">Alpha</option>
                    </select>

                    <br>

                    <button class="btn btn-primary mt-3">Simpan</button>
                </form>

            </div>
        </div>
         <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>

<script>
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

                console.log("Akurasi:", position.coords.accuracy, "meter");
            },
            function(error) {
                alert("Gagal mengambil lokasi: " + error.message);
            }, {
                enableHighAccuracy: true, // 🔥 INI KUNCI
                timeout: 10000,
                maximumAge: 0
            }
        );
    }
</script>



</html>
