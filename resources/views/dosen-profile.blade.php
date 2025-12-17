<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 15px;
        }

        .profile-header {
            background: #0d6efd;
            color: white;
            padding: 25px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">

                <!-- BODY -->
                <div class="card-body">

                    <h5 class="mb-3 fw-bold">Edit Profil</h5>

                    <form action="/dosen/profile/update" method="POST">
                        @csrf

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ auth()->user()->nama_user }}"
                                   required>
                        </div>

                        <!-- USERNAME -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="{{ auth()->user()->username }}"
                                   required>
                        </div>

                        <!-- ROLE (READONLY) -->
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ auth()->user()->role }}"
                                   readonly>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Perubahan
                        </button>
                    </form>

                    <hr>

                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
