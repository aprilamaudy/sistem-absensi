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
        }

        .profile-header img {
            border: 4px solid rgba(255, 255, 255, 0.8);
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        .btn-outline-secondary:hover {
            background: #e9ecef;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">

                    <!-- HEADER PROFIL -->
                    <div class="profile-header text-center">
                        <img src="https://ui-avatars.com/api/?name=Admin&size=120" class="rounded-circle mb-3"
                            alt="Profile Photo">

                        <h4 class="mb-0 text-white">Admin</h4>
                        <p class="text-light">Administrator Sistem</p>
                    </div>

                    <!-- BODY -->
                    <div class="card-body">

                        <h5 class="mb-3 fw-bold">Informasi Profile</h5>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <div>
                            <p><strong>Nama:</strong> {{ auth()->user()->nama_user ?? 'Admin' }}</p>
                            <p><strong>Username:</strong> {{ auth()->user()->username ?? 'Admin' }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email ?? 'admin@example.com' }}</p>
                            <p><strong>Role:</strong> {{ auth()->user()->role ?? 'user' }}</p>
                        </div>

                        <hr>

                        <!-- TOMBOL -->
                        <a href="/admin/edit-profile" class="btn btn-primary w-100 mb-2">Edit Profile</a>

                    </div>

                </div>

            </div>
        </div>
    </div>

</body>

</html>
