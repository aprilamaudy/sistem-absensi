<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3 class="fw-bold mb-4">Tambah Data Mata Kuliah</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- WARNING GLOBAL --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin-matkul-store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    {{-- KODE MATKUL --}}
                    <div class="col-md-6">
                        <label class="form-label">Kode</label>
                        <input type="text" name="kode"
                            value="{{ old('kode') }}"
                            class="form-control @error('kode') is-invalid @enderror">

                        @error('kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- NAMA MATKUL --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama"
                            value="{{ old('nama') }}"
                            class="form-control @error('nama') is-invalid @enderror">

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                    {{-- DESKRIPSI --}}
                    <div class="col-md-6">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="des"
                            class="form-control @error('des') is-invalid @enderror"
                            rows="3">{{ old('des') }}</textarea>

                        @error('des')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('admin-matkul') }}" class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
