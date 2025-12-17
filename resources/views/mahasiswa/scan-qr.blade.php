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

    <!-- TITLE -->
    <div class="text-center mb-4">
        <h3 class="fw-bold">Scan QR Kehadiran</h3>
        <p class="text-muted mb-0">Pilih absensi untuk memulai absensi</p>
    </div>

    <!-- CARD -->
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <form action="{{route('mahasiswaShowQr')}}" method="POST">
                        @csrf

                        <!-- MATA KULIAH -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Absensi</label>
                            <select name="absensi_id" class="form-select" required>
                                <option value="">-- Pilih Absensi --</option>
                                @foreach ($dataAbsensi as $absensi)
                                    <option value="{{$absensi->id}}">{{$absensi->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid">
                            <button class="btn btn-primary">
                                Lanjutkan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
