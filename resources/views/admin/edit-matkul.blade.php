<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3 class="fw-bold mb-4">Tambah Data Mahasiswa</h3>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('admin-matkul-update', $matkul->id) }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label>Kode</label>
                            <input type="text" name="kode" value="{{ $matkul->kode }}" class="form-control mb-2">
                        </div>

                        <div class="col-md-6">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" name="nama" value="{{ $matkul->nama }}" class="form-control mb-2">
                        </div>

                        <div class="col-md-6">
                            <label>Deskripsi</label>
                            <textarea name="des" class="form-control mb-3">{{ $matkul->des }}</textarea>

                        </div>
                        
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <a href="{{ route('admin-matkul') }}" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
