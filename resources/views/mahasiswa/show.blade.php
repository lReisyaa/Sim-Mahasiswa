@extends('layouts.app')
@section('title', 'Detail Mahasiswa')
@section('page-title', 'Detail Mahasiswa')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">
            Detail Mahasiswa
        </h2>
        <p class="text-muted mb-0">
            Informasi lengkap mahasiswa.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning text-white">
            <i class="bi bi-pencil me-1"></i>
            Edit
        </a>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>
</div>

{{-- PROFIL --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h4 class="fw-bold mb-1">
            {{ $mahasiswa->nama }}
        </h4>
        <p class="text-muted mb-3">
            {{ $mahasiswa->nim }}
        </p>
        <div class="row">
            <div class="col-md-3 fw-semibold text-muted">Program Studi</div>
            <div class="col-md-9">
                {{ $mahasiswa->prodi->nama_prodi }}
            </div>
        </div>
    </div>
</div>

{{-- DETAIL --}}
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0 fw-bold">
            Informasi Mahasiswa
        </h5>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold text-muted">NIM</div>
            <div class="col-md-9">
                {{ $mahasiswa->nim }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold text-muted">Nama</div>
            <div class="col-md-9">
                {{ $mahasiswa->nama }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold text-muted">Jenis Kelamin</div>
            <div class="col-md-9">
                {{ $mahasiswa->jenis_kelamin }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold text-muted">Tanggal Lahir</div>
            <div class="col-md-9">
                {{ $mahasiswa->tanggal_lahir ? $mahasiswa->tanggal_lahir->format('d-m-Y') : '-' }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold text-muted">Email</div>
            <div class="col-md-9">
                {{ $mahasiswa->email ?? '-' }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold text-muted">Telepon</div>
            <div class="col-md-9">
                {{ $mahasiswa->telepon ?? '-' }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold text-muted">Alamat</div>
            <div class="col-md-9">
                {{ $mahasiswa->alamat ?? '-' }}
            </div>
        </div>
    </div>
</div>
@endsection