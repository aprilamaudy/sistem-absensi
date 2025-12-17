<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border-radius: 15px;
        }

        .header-blue {
            background: #0d6efd;
            color: white;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm border-0">

                <!-- Header -->
                <div class="header-blue text-center">
                    <h5 class="mb-0">Ubah Password</h5>
                </div>

                <div class="card-body">

                    {{-- Tidak ada session alert --}}

                    {{-- Form Ubah Password --}}
                    <form action="{{ url('/admin/ubah-password') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Password Lama</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>

                        <div class="mb-3">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>

                        <div class="mb-3">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="confirm_password" required>
                        </div>

                        <button class="btn btn-primary w-100">Simpan Perubahan</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

</body>

</html>
