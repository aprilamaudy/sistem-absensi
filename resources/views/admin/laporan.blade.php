<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3 class="fw-bold mb-4">Laporan Absensi</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Matkul</th>
                        <th>Tanggal</th>
                        <!-- <th>Jarak</th> -->
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($dataKehadiran as $no => $kehadiran)
                        
                        <tr>
                            <td>{{$no + 1}}</td>
                            <td>{{$kehadiran->user->nama_user}}</td>
                            <td>{{$kehadiran->absensi->matkul->nama}}</td>
                            <td>{{$kehadiran->created_at}}</td>
                            <!-- <td>{{$kehadiran->jarak}}</td> -->
                            <td>{{$kehadiran->ket}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>

</body>
</html>
