<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Admin</title>

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
            <div class="col-md-6">

                <div class="card shadow-sm border-0">

                    <!-- Header -->
                    <div class="header-blue text-center">
                        <h5 class="mb-0">Edit Profil Admin</h5>
                    </div>

                    <!-- Body -->
                    <div class="card-body">

                        <form action="/admin/edit-profile" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_user"
                                    value="{{ auth()->user()->nama_user }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ auth()->user()->username }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Kosongkan jika tidak ingin ganti password">
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
