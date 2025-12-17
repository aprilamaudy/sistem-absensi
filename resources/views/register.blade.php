<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Sistem Absensi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-card {
            width: 380px;
            padding: 25px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.1);
        }
        .register-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="register-card">

    <h3 class="register-title">Register</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register_action') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama lengkap</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Daftar Sebagai</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
            </select>
        </div>

        <button class="btn btn-success w-100">Daftar</button>

        <div class="text-center mt-3">
            <span>Sudah punya akun?</span><br>
            <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </form>

</div>

</body>
</html>
