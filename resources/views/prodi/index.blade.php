@extends('layouts.app')
@section('title', 'Program Studi')
@section('page-title', 'Program Studi')
@section('content')

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
        <a href="{{ route('prodi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Prodi
        </a>
    </div>
</div>

{{-- SEARCH --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('prodi.index') }}" method="GET" class="row g-3">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari kode, nama prodi, atau fakultas..." value="{{ request('search') }}">
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

{{-- TABLE --}}
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
                    @forelse($prodis as $prodi)
                    <tr>
                        <td>
                            {{ $prodis->firstItem() + $loop->index }}
                        </td>
                        <td class="fw-semibold">
                            {{ $prodi->kode_prodi }}
                        </td>
                        <td>
                            {{ $prodi->nama_prodi }}
                        </td>
                        <td>
                            {{ $prodi->fakultas ?? '-' }}
                        </td>
                        <td>
                            <span class="badge bg-primary">
                                {{ $prodi->mahasiswas_count }} Mahasiswa
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('prodi.show', $prodi->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-sm btn-warning text-white">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada data program studi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- PAGINATION --}}
<div class="mt-4">
    {{ $prodis->links() }}
</div>
@endsection