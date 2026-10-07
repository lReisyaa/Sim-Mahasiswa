<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - SIM Mahasiswa</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <style>
        body {
            background-color: #f8f9fa;
        }

        /* ============================================================
           SIDEBAR (DESKTOP)
        ============================================================ */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            transition: transform .3s ease;
        }

        .main-content {
            margin-left: 260px;
            padding: 2rem;
            transition: margin .3s ease;
        }

        /* ============================================================
           TOMBOL HAMBURGER (☰) — default sembunyi di desktop
        ============================================================ */
        .sidebar-toggle {
            display: none;
            border: 0;
            background: transparent;
            font-size: 26px;
            color: #374151;
            margin-right: 12px;
        }

        /* ============================================================
           OVERLAY (background gelap saat sidebar terbuka di mobile)
        ============================================================ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.45);
            z-index: 99;
        }
        .sidebar-overlay.show {
            display: block;
        }

        /* ============================================================
           RESPONSIVE — MOBILE (max-width: 991px)
        ============================================================ */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            .sidebar-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>

    
    <div id="sidebar" class="sidebar d-flex flex-column p-3">

        <a href="<?php echo e(route('dashboard')); ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4 fw-bold text-primary">
                <i class="bi bi-mortarboard-fill me-2"></i>SIM Mahasiswa
            </span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-1">
                <span class="text-uppercase text-muted fw-bold px-3 mb-2 d-block" style="font-size: 0.75rem;">MENU UTAMA</span>
            </li>
            <li class="nav-item mb-1">
                <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : 'link-dark'); ?>">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="<?php echo e(route('mahasiswa.index')); ?>" class="nav-link <?php echo e(request()->routeIs('mahasiswa.*') ? 'active' : 'link-dark'); ?>">
                    <i class="bi bi-people-fill me-2"></i> Data Mahasiswa
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="<?php echo e(route('prodi.index')); ?>" class="nav-link <?php echo e(request()->routeIs('prodi.*') ? 'active' : 'link-dark'); ?>">
                    <i class="bi bi-journal-bookmark-fill me-2"></i> Program Studi
                </a>
            </li>

            <li class="nav-item mt-4 mb-1">
                <span class="text-uppercase text-muted fw-bold px-3 mb-2 d-block" style="font-size: 0.75rem;">PENGATURAN</span>
            </li>
            <li class="nav-item mb-1">
                <a href="<?php echo e(route('profile.edit')); ?>" class="nav-link <?php echo e(request()->routeIs('profile.*') ? 'active' : 'link-dark'); ?>">
                    <i class="bi bi-person-circle me-2"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="nav-link link-danger border-0 bg-transparent w-100 text-start">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    
    <div class="main-content">

        
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow-sm px-4 mb-4">
            <div class="container-fluid px-0">

                
                <div class="d-flex align-items-center">

                    
                    <button id="sidebarToggle" class="sidebar-toggle" type="button" aria-label="Toggle Sidebar">
                        <i class="bi bi-list"></i>
                    </button>

                    <div>
                        <h4 class="mb-0 fw-bold"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h4>
                        <small class="text-muted">Sistem Informasi Data Mahasiswa</small>
                    </div>
                </div>

                
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center text-dark text-decoration-none">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; font-weight: bold;">
                            <?php echo e(strtoupper(substr(auth()->user()->name ?? 'A', 0, 1))); ?>

                        </div>
                        <div class="d-none d-md-block text-start">
                            <div class="fw-semibold"><?php echo e(auth()->user()->name ?? 'Administrator'); ?></div>
                            <small class="text-muted" style="font-size: 0.75rem;">Administrator</small>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        
        <div class="container-fluid px-0">

            
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Terdapat kesalahan:</strong>
                <ul class="mb-0 mt-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ============================================================
        // TOGGLE SIDEBAR untuk MOBILE
        // ============================================================
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const toggle  = document.getElementById('sidebarToggle');
            const overlay = document.getElementById('sidebarOverlay');

            // Buka/tutup sidebar saat tombol ☰ diklik
            toggle?.addEventListener('click', function () {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });

            // Tutup sidebar saat overlay diklik
            overlay?.addEventListener('click', function () {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\laragon\www\sim-mahasiswa\resources\views/layouts/app.blade.php ENDPATH**/ ?>