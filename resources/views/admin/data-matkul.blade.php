<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <h3 class="fw-bold mb-4">Data Mata Kuliah</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <a href="{{ route('admin-matkul-tambah') }}"
               class="btn btn-primary mb-3">+ Tambah Mata Kuliah</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($matkuls as $no => $mk)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $mk->kode }}</td>
                    <td>{{ $mk->nama }}</td>
                    <td>{{ $mk->des }}</td>
                    <td>
                        <a href="{{ route('admin-matkul-edit', $mk->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin-matkul-delete', $mk->id) }}"
                              method="POST" class="d-inline">
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
