<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password | SIM Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);
            font-family: "Segoe UI", sans-serif;
        }

        .forgot-wrapper {
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
            margin-bottom: 5px;
        }

        .brand p {
            margin: 0;
            opacity: .9;
        }

        .forgot-card {
            background: white;
            border-radius: 22px;
            padding: 35px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .15);
        }

        .forgot-card h2 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .forgot-card .description {
            color: #6b7280;
            margin-bottom: 25px;
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

        .btn-reset:hover {
            color: white;
            opacity: .95;
        }

        .back-login {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="forgot-wrapper">

    
    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <h1>SIM Mahasiswa</h1>
        <p>Sistem Informasi Data Mahasiswa</p>
    </div>

    
    <div class="forgot-card">

        <h2>Lupa Password?</h2>

        <p class="description">
            Jangan khawatir. Masukkan email yang
            terdaftar dan kami akan mengirimkan
            link untuk mengatur ulang password Anda.
        </p>

        
        <?php if(session('status')): ?>
            <div class="alert alert-success d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <form method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control"
                           placeholder="Masukkan email Anda"
                           value="<?php echo e(old('email')); ?>"
                           required
                           autofocus>
                </div>
            </div>

            <button type="submit" class="btn btn-reset w-100">
                <i class="bi bi-envelope-arrow-up me-2"></i>
                Kirim Link Reset Password
            </button>
        </form>

        
        <div class="back-login">
            <a href="<?php echo e(route('login')); ?>" class="text-primary text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Login
            </a>
        </div>

    </div>

    
    <div class="text-center text-white mt-4">
        <small>
            © <?php echo e(date('Y')); ?> SIM Mahasiswa
        </small>
    </div>

</div>

</body>
</html><?php /**PATH C:\laragon\www\sim-mahasiswa\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>