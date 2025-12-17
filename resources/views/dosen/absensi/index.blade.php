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


                <div class="col-md-2 d-flex align-items-end">
                    <a href="{{ route('dosen.absensi.create') }}" class="btn btn-primary mb-3">
                        + Buat Absensi
                    </a>
                </div>

            </div>
        </div>

        <!-- DATA TABEL -->
        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="mb-3 fw-semibold">Daftar Mahasiswa</h5>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>Nama Absensi</th>
                                <th>Radius</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($absensi as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->matkul->nama }}</td>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->radius }} m</td>
                                    <td>
                                        <a href="{{ route('dosen.absensi.edit', $a->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('dosen.absensi.destroy', $a->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
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
