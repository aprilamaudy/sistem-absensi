


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Kehadiran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">



        <!-- CARD -->
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <!-- TITLE -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold">Scan QR Kehadiran</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <!-- Informasi Agenda -->
                                <div class="agenda-info mb-4">
                                    <h5 class="text-primary">{{$dataAbsensi->nama}}</h5>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        {{ \Carbon\Carbon::parse($dataAbsensi->created_at)->translatedFormat('d F Y') }}
                                    </p>
                                    <div class="deskripsi-kegiatan mt-3">
                                        <h6 class="text-dark">Deskripsi Kegiatan:</h6>
                                        <div class="bg-light p-3 rounded text-left">
                                            {{$dataAbsensi->des}}
                                        </div>
                                    </div>
                                </div>

                                <!-- QR Code Container -->
                                <div class="qr-container mb-4">
                                    <div class="card bg-light">
                                        <div class="card-body text-center py-4">
                                            {!! QrCode::size(250)->generate(url('mahasiswa/scan/show-qr/'.encrypt($dataAbsensi->id))) !!}
                                            <p class="text-muted mt-3 mb-0">Scan QR code di atas untuk melakukan
                                                absensi</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informasi Tambahan -->
                                <div class="additional-info">
                                    <div class="alert alert-info">
                                        <h6><i class="fas fa-info-circle mr-2"></i>Petunjuk Penggunaan:</h6>
                                        <ul class="mb-0 pl-3">
                                            <li>Buka aplikasi scanner QR code di smartphone Anda</li>
                                            <li>Arahkan kamera ke QR code di atas</li>
                                            <li>Ikuti instruksi untuk melakukan absensi</li>
                                            <li>Pastikan lokasi GPS Anda aktif</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="action-buttons mt-4">
                                    <a href="/mahasiswa/dashboard" class="btn btn-warning">
                                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
                                    </a>
                                    <button onclick="window.print()" class="btn btn-primary">
                                        <i class="fas fa-print mr-2"></i>Cetak QR Code
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
