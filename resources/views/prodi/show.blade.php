@extends('layouts.app')
@section('title', 'Detail Program Studi')
@section('page-title', 'Detail Program Studi')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">
            Detail Program Studi
        </h2>
        <p class="text-muted mb-0">
            Informasi program studi dan mahasiswa.
        </p>
    </div>
    <div>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>
</div>

{{-- INFORMASI PRODI --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h4 class="fw-bold mb-1">
            {{ $prodi->nama_prodi }}
        </h4>
        <p class="text-muted mb-3">
            Kode: {{ $prodi->kode_prodi }}
        </p>

        <div class="row mb-2">
            <div class="col-md-3 fw-semibold text-muted">Fakultas:</div>
            <div class="col-md-9">{{ $prodi->fakultas ?? '-' }}</div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold text-muted">Jumlah Mahasiswa:</div>
            <div class="col-md-9">
                <span class="badge bg-primary">
                    {{ $prodi->mahasiswas->count() }}
                </span>
            </div>
        </div>
    </div>
</div>

{{-- DAFTAR MAHASISWA --}}
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0 fw-bold">
            Mahasiswa
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prodi->mahasiswas as $mahasiswa)
                    <tr>
                        <td>
                            {{ $mahasiswa->nim }}
                        </td>
                        <td class="fw-semibold">
                            {{ $mahasiswa->nama }}
                        </td>
                        <td>
                            {{ $mahasiswa->jenis_kelamin }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada mahasiswa.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection