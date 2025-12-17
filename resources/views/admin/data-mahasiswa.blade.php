<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3 class="fw-bold mb-4">Data Mahasiswa</h3>

        <div class="card shadow-sm">
            <div class="card-body">

                <a href="/admin/mahasiswa/tambah" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mahasiswas as $no => $mhs)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $mhs->nama_user }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->email }}</td>
                                <td>{{ $mhs->no_hp }}</td>
                                <td>
                                    <a href="{{ route('admin-dataMahasiswa-edit', $mhs->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin-dataMahasiswa-delete', $mhs->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>

    </div>

</body>

</html>
