@extends('layouts.app')
@section('title', 'Edit Mahasiswa')
@section('page-title', 'Edit Mahasiswa')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold">Edit Data Mahasiswa</h2>
    <p class="text-muted">Perbarui informasi mahasiswa.</p>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- NIM --}}
                <div class="col-md-6">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim"
                           value="{{ old('nim', $mahasiswa->nim) }}"
                           class="form-control @error('nim') is-invalid @enderror">
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NAMA --}}
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama"
                           value="{{ old('nama', $mahasiswa->nama) }}"
                           class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PRODI --}}
                <div class="col-md-6">
                    <label class="form-label">Program Studi</label>
                    <select name="prodi_id"
                            class="form-select @error('prodi_id') is-invalid @enderror">
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}"
                                @selected(old('prodi_id', $mahasiswa->prodi_id) == $prodi->id)>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                    @error('prodi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki"
                            @selected(old('jenis_kelamin', $mahasiswa->jenis_kelamin) === 'Laki-laki')>
                            Laki-laki
                        </option>
                        <option value="Perempuan"
                            @selected(old('jenis_kelamin', $mahasiswa->jenis_kelamin) === 'Perempuan')>
                            Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                           value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir?->format('Y-m-d')) }}"
                           class="form-control">
                </div>

                {{-- TELEPON --}}
                <div class="col-md-6">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon"
                           value="{{ old('telepon', $mahasiswa->telepon) }}"
                           class="form-control">
                </div>

                {{-- EMAIL --}}
                <div class="col-md-12">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           value="{{ old('email', $mahasiswa->email) }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ALAMAT --}}
                <div class="col-md-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="4"
                              class="form-control">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                </div>

            </div>

            <div class="mt-4">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update
                </button>
            </div>

        </form>
    </div>
</div>

@endsection