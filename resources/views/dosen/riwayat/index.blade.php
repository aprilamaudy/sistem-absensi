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
                        @foreach ($dataKehadiran as $kehadiran)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kehadiran->created_at }}</td>
                                <td>{{ $kehadiran->absensi->matkul->nama }}</td>
                                <td>{{ $kehadiran->created_at }}</td>
                                <td><span
                                    @if ($kehadiran->ket == 'hadir')
                                        class="badge bg-success"
                                    @endif
                                    @if ($kehadiran->ket == 'izin')
                                        class="badge bg-warning"
                                    @endif
                                    @if ($kehadiran->ket == 'alpha')
                                        class="badge bg-danger"
                                    @endif
                                    >{{ $kehadiran->ket }}</span></td>
                                <td><span @if ($kehadiran->valid == 'valid')
                                        class="badge bg-success"
                                    @endif
                                    @if ($kehadiran->valid == 'n/a')
                                        class="badge bg-warning"
                                    @endif
                                    @if ($kehadiran->valid == 'tidak valid')
                                        class="badge bg-danger"
                                    @endif
                                    >{{ $kehadiran->valid }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
