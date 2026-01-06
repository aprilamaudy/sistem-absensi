<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3 class="fw-bold mb-4">Data Dosen</h3>

        <div class="card shadow-sm">
            <div class="card-body">

                <a href="{{ route('admin-dataDosen-tambah') }}" class="btn btn-primary mb-3">+ Tambah Dosen</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dosens as $no => $dosen)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $dosen->nama_user }}</td>
                                <td>{{ $dosen->nip }}</td>
                                <td>{{ $dosen->email }}</td>
                                <td>{{ $dosen->no_hp }}</td>
                                <td>
                                    <a href="{{ route('admin-dataDosen-edit', $dosen->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin-dataDosen-delete', $dosen->id) }}" method="POST"
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
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>

    </div>

</body>

</html>
