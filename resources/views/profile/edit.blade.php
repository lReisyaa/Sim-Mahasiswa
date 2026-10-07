@extends('layouts.app')
@section('title', 'Profile')
@section('page-title', 'Profile')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">
            Profile Saya
        </h2>
        <p class="text-muted mb-0">
            Kelola informasi akun Anda.
        </p>
    </div>
</div>

<div class="row">
    {{-- INFORMASI AKUN (SIDEBAR CARD) --}}
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm text-center">
            <div class="card-body py-4">
                {{-- AVATAR --}}
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h5 class="fw-bold mb-1">
                    {{ $user->name }}
                </h5>
                <p class="text-muted mb-3">
                    {{ $user->email }}
                </p>
                <span class="badge bg-secondary">Administrator</span>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        {{-- =====================================================
        INFORMASI PROFILE
        ====================================================== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Informasi Profile</h5>
                <small class="text-muted">Perbarui nama dan email akun.</small>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    {{-- NAMA --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- =====================================================
        PASSWORD
        ====================================================== --}}
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Ubah Password</h5>
                <small class="text-muted">Gunakan password minimal 8 karakter.</small>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    {{-- PASSWORD LAMA --}}
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- PASSWORD BARU --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- KONFIRMASI --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection