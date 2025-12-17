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

        <h2 class="fw-bold mb-4">Abseni Mahasiswa</h2>

        <!-- FILTER -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">


                <form action="{{ route('dosen.absensi.store') }}" method="POST">
                    @csrf

                    <select name="matkul_id" class="form-control mb-2">
                        @foreach ($matkul as $m)
                            <option value="{{ $m->id }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>

                    <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Absensi">

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

                    <input type="number" name="radius" class="form-control mt-2" placeholder="Radius (meter)">
                    <input type="datetime-local" name="batas" class="form-control mt-2">

                    <textarea name="des" class="form-control mt-2" placeholder="Deskripsi"></textarea>

                    <button class="btn btn-primary mt-3">Simpan</button>
                </form>


            </div>
        </div>
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
