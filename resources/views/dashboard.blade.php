@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dashboard</h2>
        <p class="text-muted mb-0">
            Selamat datang kembali, {{ auth()->user()->name }}
        </p>
    </div>
    <div>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </a>
    </div>
</div>

{{-- STATISTIK --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Total Mahasiswa</small>
                        <h2 class="fw-bold mb-0">{{ $totalMahasiswa }}</h2>
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
                        <h2 class="fw-bold text-primary mb-0">{{ $totalLakiLaki }}</h2>
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
                        <h2 class="fw-bold text-danger mb-0">{{ $totalPerempuan }}</h2>
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
                        <h2 class="fw-bold text-success mb-0">{{ $totalProdi }}</h2>
                    </div>
                    <i class="bi bi-building fs-1 text-success opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CHART + RINGKASAN PRODI --}}
<div class="row g-4 mb-4">

    {{-- CHART DOUGHNUT --}}
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

    {{-- RINGKASAN PRODI --}}
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom">
                <h5 class="fw-bold mb-0">
                    <i class="bi bi-list-ul me-2 text-success"></i>
                    Ringkasan Prodi
                </h5>
            </div>
            <div class="card-body">
                @forelse($mahasiswaPerProdi as $p)
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                        <div>
                            <div class="fw-semibold">{{ $p->nama_prodi }}</div>
                            <small class="text-muted">{{ $p->kode_prodi }}</small>
                        </div>
                        <span class="badge bg-primary rounded-pill fs-6">
                            {{ $p->mahasiswas_count }}
                        </span>
                    </div>
                @empty
                    <p class="text-muted text-center my-3">Belum ada prodi.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>

{{-- MAHASISWA TERBARU --}}
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
                    @forelse($mahasiswaTerbaru as $mahasiswa)
                        <tr>
                            <td class="px-4">{{ $mahasiswa->nim }}</td>
                            <td class="fw-semibold">{{ $mahasiswa->nama }}</td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ $mahasiswa->prodi->nama_prodi ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if($mahasiswa->jenis_kelamin === 'Laki-laki')
                                    <span class="badge rounded-pill bg-info bg-opacity-10 text-info">
                                        <i class="bi bi-person-fill me-1"></i> Laki-laki
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger">
                                        <i class="bi bi-person-heart me-1"></i> Perempuan
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

{{-- =====================================================
     CHART.JS — dipush ke @stack('scripts') di layout
====================================================== --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('chartProdi');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'doughnut',
        data: {
            labels: @json($mahasiswaPerProdi->pluck('nama_prodi')),
            datasets: [{
                data: @json($mahasiswaPerProdi->pluck('mahasiswas_count')),
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
@endpush