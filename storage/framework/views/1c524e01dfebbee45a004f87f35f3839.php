
<?php $__env->startSection('title', 'Program Studi'); ?>
<?php $__env->startSection('page-title', 'Program Studi'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">
            Program Studi
        </h2>
        <p class="text-muted mb-0">
            Kelola data program studi.
        </p>
    </div>
    <div>
        <a href="<?php echo e(route('prodi.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Prodi
        </a>
    </div>
</div>


<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="<?php echo e(route('prodi.index')); ?>" method="GET" class="row g-3">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari kode, nama prodi, atau fakultas..." value="<?php echo e(request('search')); ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary w-100">
                    <i class="bi bi-search me-1"></i>
                    Cari
                </button>
            </div>
        </form>
    </div>
</div>


<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Program Studi</th>
                        <th>Fakultas</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $prodis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <?php echo e($prodis->firstItem() + $loop->index); ?>

                        </td>
                        <td class="fw-semibold">
                            <?php echo e($prodi->kode_prodi); ?>

                        </td>
                        <td>
                            <?php echo e($prodi->nama_prodi); ?>

                        </td>
                        <td>
                            <?php echo e($prodi->fakultas ?? '-'); ?>

                        </td>
                        <td>
                            <span class="badge bg-primary">
                                <?php echo e($prodi->mahasiswas_count); ?> Mahasiswa
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('prodi.show', $prodi->id)); ?>" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('prodi.edit', $prodi->id)); ?>" class="btn btn-sm btn-warning text-white">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('prodi.destroy', $prodi->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada data program studi.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="mt-4">
    <?php echo e($prodis->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sim-mahasiswa\resources\views/prodi/index.blade.php ENDPATH**/ ?>