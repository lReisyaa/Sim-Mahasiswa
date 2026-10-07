

<?php $__env->startSection('title', 'Data Mahasiswa'); ?>
<?php $__env->startSection('page-title', 'Data Mahasiswa'); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Data Mahasiswa</h2>
        <p class="text-muted mb-0">Kelola data mahasiswa.</p>
    </div>

    
    <div class="d-flex gap-2">

        
        <a href="<?php echo e(route('mahasiswa.pdf', request()->query())); ?>"
           class="btn btn-danger"
           target="_blank">
            <i class="bi bi-file-earmark-pdf me-1"></i> Print PDF
        </a>

        
        <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </a>

    </div>
</div>



<div class="card mb-4">
    <div class="card-body">
        <form action="<?php echo e(route('mahasiswa.index')); ?>" method="GET">
            <div class="row g-3">

                
                <div class="col-lg-6 col-md-6">
                    <label class="form-label fw-semibold">Pencarian</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari NIM atau nama mahasiswa..."
                               value="<?php echo e(request('search')); ?>">
                    </div>
                </div>

                
                <div class="col-lg-4 col-md-4">
                    <label class="form-label fw-semibold">Program Studi</label>
                   <select name="prodi_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Program Studi</option>
                        <?php $__currentLoopData = $prodis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($prodi->id); ?>"
                                <?php echo e((string) request('prodi_id') === (string) $prodi->id ? 'selected' : ''); ?>>
                                <?php echo e($prodi->nama_prodi); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="col-lg-2 col-md-2 d-flex align-items-end">
                    <div class="d-flex gap-2 w-100">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>

                        <?php if(request()->filled('search') || request()->filled('prodi_id')): ?>
                            <a href="<?php echo e(route('mahasiswa.index')); ?>"
                               class="btn btn-outline-secondary"
                               title="Reset Filter">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>



<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <small class="text-muted">
            Menampilkan
            <strong><?php echo e($mahasiswas->firstItem() ?? 0); ?></strong>
            sampai
            <strong><?php echo e($mahasiswas->lastItem() ?? 0); ?></strong>
            dari
            <strong><?php echo e($mahasiswas->total()); ?></strong>
            mahasiswa
        </small>
    </div>

    
    <?php if(request('search') || request('prodi_id')): ?>
        <span class="badge bg-primary">
            <i class="bi bi-funnel me-1"></i> Filter aktif
        </span>
    <?php endif; ?>
</div>



<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4" style="width: 70px;">#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Jenis Kelamin</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>

                        
                        <td class="px-4">
                            <span class="text-muted">
                                <?php echo e($mahasiswas->firstItem() + $loop->index); ?>

                            </span>
                        </td>

                        
                        <td>
                            <span class="fw-semibold"><?php echo e($mahasiswa->nim); ?></span>
                        </td>

                        
                        <td>
                            <span class="fw-semibold"><?php echo e($mahasiswa->nama); ?></span>
                        </td>

                        
                        <td>
                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                <?php echo e($mahasiswa->prodi->nama_prodi); ?>

                            </span>
                        </td>

                        
                        <td>
                            <?php if($mahasiswa->jenis_kelamin === 'Laki-laki'): ?>
                                <span class="badge rounded-pill bg-info bg-opacity-10 text-info">
                                    <i class="bi bi-person-fill me-1"></i> Laki-laki
                                </span>
                            <?php else: ?>
                                <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-person-heart me-1"></i> Perempuan
                                </span>
                            <?php endif; ?>
                        </td>

                        
                        <td>
                            <div class="d-flex justify-content-center gap-1">

                                
                                <a href="<?php echo e(route('mahasiswa.show', $mahasiswa)); ?>"
                                   class="btn btn-sm btn-outline-info"
                                   title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>

                                
                                <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa)); ?>"
                                   class="btn btn-sm btn-outline-warning"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                
                                <form action="<?php echo e(route('mahasiswa.destroy', $mahasiswa)); ?>"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    
                    <tr>
                        <td colspan="6" class="py-5">
                            <div class="text-center">

                                <div class="mx-auto mb-3 rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center"
                                     style="width:70px; height:70px;">
                                    <i class="bi bi-people fs-3"></i>
                                </div>

                                <h5 class="fw-bold">Data Mahasiswa Tidak Ditemukan</h5>

                                <p class="text-muted">
                                    <?php if(request('search') || request('prodi_id')): ?>
                                        Tidak ada mahasiswa yang sesuai dengan filter.
                                    <?php else: ?>
                                        Belum ada data mahasiswa.
                                    <?php endif; ?>
                                </p>

                                
                                <?php if(request('search') || request('prodi_id')): ?>
                                    <a href="<?php echo e(route('mahasiswa.index')); ?>"
                                       class="btn btn-outline-primary">
                                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                                        Reset Filter
                                    </a>
                                <?php else: ?>
                                    
                                    <a href="<?php echo e(route('mahasiswa.create')); ?>"
                                       class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-1"></i>
                                        Tambah Mahasiswa
                                    </a>
                                <?php endif; ?>

                            </div>
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>
            </table>
        </div>


        
        <?php if($mahasiswas->hasPages()): ?>
            <div class="pagination-wrapper">

                
                <div class="pagination-info">
                    Menampilkan
                    <strong><?php echo e($mahasiswas->firstItem()); ?></strong>
                    -
                    <strong><?php echo e($mahasiswas->lastItem()); ?></strong>
                    dari
                    <strong><?php echo e($mahasiswas->total()); ?></strong>
                    data
                </div>

                
                <nav aria-label="Navigasi halaman mahasiswa">
                    <ul class="pagination-custom">

                        
                        <?php if($mahasiswas->onFirstPage()): ?>
                            <li class="disabled">
                                <span aria-disabled="true" aria-label="Previous">
                                    <i class="bi bi-chevron-left"></i>
                                </span>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e($mahasiswas->previousPageUrl()); ?>" aria-label="Previous">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = $mahasiswas->getUrlRange(
                                max(1, $mahasiswas->currentPage() - 2),
                                min($mahasiswas->lastPage(), $mahasiswas->currentPage() + 2)
                            ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $mahasiswas->currentPage()): ?>
                                <li class="active">
                                    <span aria-current="page"><?php echo e($page); ?></span>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($mahasiswas->hasMorePages()): ?>
                            <li>
                                <a href="<?php echo e($mahasiswas->nextPageUrl()); ?>" aria-label="Next">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="disabled">
                                <span aria-disabled="true" aria-label="Next">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </li>
                        <?php endif; ?>

                    </ul>
                </nav>

            </div>
        <?php endif; ?>

    </div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('styles'); ?>
<style>

    /*
    |--------------------------------------------------------------------------
    | HEADER
    |--------------------------------------------------------------------------
    */
    @media (max-width: 576px) {
        .d-flex.gap-2 {
            flex-wrap: wrap;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINATION WRAPPER
    |--------------------------------------------------------------------------
    */
    .pagination-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 24px;
        border-top: 1px solid #e9ecef;
        gap: 20px;
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINATION INFO
    |--------------------------------------------------------------------------
    */
    .pagination-info {
        color: #6c757d;
        font-size: 14px;
        white-space: nowrap;
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINATION CONTAINER
    |--------------------------------------------------------------------------
    */
    .pagination-custom {
        display: flex !important;
        align-items: center;
        justify-content: center;
        gap: 5px;
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINATION ITEM
    |--------------------------------------------------------------------------
    */
    .pagination-custom li {
        margin: 0;
        padding: 0;
        list-style: none !important;
    }

    /*
    |--------------------------------------------------------------------------
    | LINK & SPAN
    |--------------------------------------------------------------------------
    */
    .pagination-custom a,
    .pagination-custom span {
        width: 38px;
        height: 38px;
        display: flex !important;
        align-items: center;
        justify-content: center;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background: #ffffff;
        color: #495057;
        text-decoration: none !important;
        font-size: 14px;
        transition: all .2s ease;
    }

    /*
    |--------------------------------------------------------------------------
    | HOVER
    |--------------------------------------------------------------------------
    */
    .pagination-custom a:hover {
        background: #f0f6ff;
        border-color: #0d6efd;
        color: #0d6efd;
    }

    /*
    |--------------------------------------------------------------------------
    | ACTIVE
    |--------------------------------------------------------------------------
    */
    .pagination-custom li.active span {
        background: #0d6efd;
        border-color: #0d6efd;
        color: #ffffff;
        font-weight: 600;
    }

    /*
    |--------------------------------------------------------------------------
    | DISABLED
    |--------------------------------------------------------------------------
    */
    .pagination-custom li.disabled span {
        background: #f8f9fa;
        border-color: #e9ecef;
        color: #adb5bd;
        cursor: not-allowed;
    }

    /*
    |--------------------------------------------------------------------------
    | ACTION BUTTON
    |--------------------------------------------------------------------------
    */
    .table td .btn {
        min-width: 34px;
    }

    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */
    .table > tbody > tr {
        transition: background-color .2s ease;
    }

    .table > tbody > tr:hover {
        background-color: rgba(13, 110, 253, .025);
    }

    /*
    |--------------------------------------------------------------------------
    | MOBILE
    |--------------------------------------------------------------------------
    */
    @media (max-width: 768px) {
        .pagination-wrapper {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .pagination-info {
            white-space: normal;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | SMALL MOBILE
    |--------------------------------------------------------------------------
    */
    @media (max-width: 480px) {
        .pagination-custom {
            gap: 3px;
        }

        .pagination-custom a,
        .pagination-custom span {
            width: 34px;
            height: 34px;
            font-size: 13px;
        }

        .pagination-wrapper {
            padding: 15px;
        }
    }

</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sim-mahasiswa\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>