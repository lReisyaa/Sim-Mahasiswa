@extends('layouts.app')
@section('title', 'Tambah Program Studi')
@section('page-title', 'Tambah Program Studi')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">
            Tambah Program Studi
        </h2>
        <p class="text-muted mb-0">
            Tambahkan program studi baru.
        </p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('prodi.store') }}" method="POST">
            @csrf
            
            {{-- KODE PRODI --}}
            <div class="mb-3">
                <label for="kode_prodi" class="form-label">Kode Program Studi</label>
                <input type="text" name="kode_prodi" id="kode_prodi" class="form-control @error('kode_prodi') is-invalid @enderror" value="{{ old('kode_prodi') }}">
                @error('kode_prodi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- NAMA PRODI --}}
            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control @error('nama_prodi') is-invalid @enderror" value="{{ old('nama_prodi') }}">
                @error('nama_prodi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- FAKULTAS --}}
            <div class="mb-4">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" name="fakultas" id="fakultas" class="form-control @error('fakultas') is-invalid @enderror" value="{{ old('fakultas') }}">
                @error('fakultas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection