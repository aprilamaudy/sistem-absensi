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

                        <!-- KODE -->
                        <div class="col-md-6">
                            <label>Kode</label>
                            <input 
                                type="text" 
                                name="kode" 
                                value="{{ old('kode', $matkul->kode) }}" 
                                class="form-control mb-1 @error('kode') is-invalid @enderror"
                            >

                          
                               
                        </div>

                        <!-- NAMA -->
                        <div class="col-md-6">
                            <label>Nama Mata Kuliah</label>
                            <input 
                                type="text" 
                                name="nama" 
                                value="{{ old('nama', $matkul->nama) }}" 
                                class="form-control mb-1 @error('nama') is-invalid @enderror"
                            >

                            @error('nama')
                                <small class="text-danger">
                                    Nama mata kuliah wajib diisi
                                </small>
                            @enderror
                        </div>

                        <!-- DESKRIPSI -->
                        <div class="col-md-6">
                            <label>Deskripsi</label>
                            <textarea 
                                name="des" 
                                class="form-control mb-1 @error('des') is-invalid @enderror"
                            >{{ old('des', $matkul->des) }}</textarea>

                            @error('des')
                                <small class="text-danger">
                                    Deskripsi wajib diisi
                                </small>
                            @enderror
                        </div>

                    </div>

                     <small class="text-danger">
                                    Kode tidak boleh sama
                                </small>

                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin-matkul') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                        <button class="btn btn-primary">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
