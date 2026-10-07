<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password | SIM Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);
            font-family: "Segoe UI", sans-serif;
        }

        .reset-wrapper {
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        .brand {
            text-align: center;
            color: white;
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .brand h1 {
            font-size: 32px;
            font-weight: 700;
        }

        .brand p {
            opacity: .9;
        }

        .reset-card {
            background: white;
            border-radius: 22px;
            padding: 35px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .15);
        }

        .form-control {
            min-height: 46px;
        }

        .input-group-text {
            background: white;
        }

        .btn-reset {
            min-height: 52px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: white;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="reset-wrapper">

    {{-- BRAND --}}
    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <h1>SIM Mahasiswa</h1>
        <p>Sistem Informasi Data Mahasiswa</p>
    </div>

    {{-- CARD --}}
    <div class="reset-card">

        <h2 class="fw-bold mb-2">Buat Password Baru</h2>

        <p class="text-muted mb-4">
            Masukkan password baru untuk akun Anda.
        </p>

        {{-- ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            {{-- TOKEN --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- EMAIL --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $request->email) }}"
                           required>
                </div>
            </div>

            {{-- PASSWORD --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Password Baru</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password baru"
                           minlength="8"
                           required>
                </div>
            </div>

            {{-- CONFIRM --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Ulangi password baru"
                           minlength="8"
                           required>
                </div>
            </div>

            <button type="submit" class="btn btn-reset w-100">
                <i class="bi bi-shield-check me-2"></i>
                Reset Password
            </button>
        </form>

    </div>

</div>

</body>
</html>