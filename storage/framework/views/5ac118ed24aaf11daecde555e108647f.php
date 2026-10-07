<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dashboard</h2>
        <p class="text-muted mb-0">
            Selamat datang kembali, <?php echo e(auth()->user()->name); ?>

        </p>
    </div>
    <div>
        <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </a>
    </div>
</div>


<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Total Mahasiswa</small>
                        <h2 class="fw-bold mb-0"><?php echo e($totalMahasiswa); ?></h2>
                    </div>
                    <i class="bi bi-people fs-1 text-primary opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Laki-laki</small>
                        <h2 class="fw-bold text-primary mb-0"><?php echo e($totalLakiLaki); ?></h2>
                    </div>
                    <i class="bi bi-gender-male fs-1 text-primary opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Perempuan</small>
                        <h2 class="fw-bold text-danger mb-0"><?php echo e($totalPerempuan); ?></h2>
                    </div>
                    <i class="bi bi-gender-female fs-1 text-danger opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Program Studi</small>
                        <h2 class="fw-bold text-success mb-0"><?php echo e($totalProdi); ?></h2>
                    </div>
                    <i class="bi bi-building fs-1 text-success opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row g-4 mb-4">

    
    <div class="col-md-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom">
                <h5 class="fw-bold mb-0">
                    <i class="bi bi-pie-chart-fill me-2 text-primary"></i>
                    Mahasiswa per Program Studi
                </h5>
            </div>
            <div class="card-body">
                <canvas id="chartProdi" height="120"></canvas>
            </div>
        </div>
    </div>

    
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom">
                <h5 class="fw-bold mb-0">
                    <i class="bi bi-list-ul me-2 text-success"></i>
                    Ringkasan Prodi
                </h5>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $mahasiswaPerProdi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                        <div>
                            <div class="fw-semibold"><?php echo e($p->nama_prodi); ?></div>
                            <small class="text-muted"><?php echo e($p->kode_prodi); ?></small>
                        </div>
                        <span class="badge bg-primary rounded-pill fs-6">
                            <?php echo e($p->mahasiswas_count); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted text-center my-3">Belum ada prodi.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>


<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="fw-bold mb-0">
            <i class="bi bi-clock-history me-2 text-warning"></i>
            Mahasiswa Terbaru
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $mahasiswaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="px-4"><?php echo e($mahasiswa->nim); ?></td>
                            <td class="fw-semibold"><?php echo e($mahasiswa->nama); ?></td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    <?php echo e($mahasiswa->prodi->nama_prodi ?? '-'); ?>

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
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('chartProdi');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($mahasiswaPerProdi->pluck('nama_prodi'), 15, 512) ?>,
            datasets: [{
                data: <?php echo json_encode($mahasiswaPerProdi->pluck('mahasiswas_count'), 15, 512) ?>,
                backgroundColor: [
                    '#0d6efd',
                    '#198455',
                    '#dc3545',
                    '#ffc107',
                    '#6f42c1',
                    '#fd7e14',
                    '#20c997',
                    '#0dcaf0'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 15, font: { size: 13 } }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.label + ': ' + context.parsed + ' mahasiswa';
                        }
                    }
                }
            }
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sim-mahasiswa\resources\views/dashboard.blade.php ENDPATH**/ ?>