@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('page-title', 'Data Mahasiswa')

@section('content')

{{-- =====================================================
     HEADER
====================================================== --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Data Mahasiswa</h2>
        <p class="text-muted mb-0">Kelola data mahasiswa.</p>
    </div>

    {{-- TOMBOL HEADER --}}
    <div class="d-flex gap-2">

        {{-- PRINT PDF --}}
        <a href="{{ route('mahasiswa.pdf', request()->query()) }}"
           class="btn btn-danger"
           target="_blank">
            <i class="bi bi-file-earmark-pdf me-1"></i> Print PDF
        </a>

        {{-- TAMBAH MAHASISWA --}}
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </a>

    </div>
</div>


{{-- =====================================================
     FILTER
====================================================== --}}
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('mahasiswa.index') }}" method="GET">
            <div class="row g-3">

                {{-- SEARCH --}}
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
                               value="{{ request('search') }}">
                    </div>
                </div>

                {{-- PROGRAM STUDI --}}
                <div class="col-lg-4 col-md-4">
                    <label class="form-label fw-semibold">Program Studi</label>
                   <select name="prodi_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Program Studi</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}"
                                {{ (string) request('prodi_id') === (string) $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- BUTTON --}}
                <div class="col-lg-2 col-md-2 d-flex align-items-end">
                    <div class="d-flex gap-2 w-100">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>

                        @if(request()->filled('search') || request()->filled('prodi_id'))
                            <a href="{{ route('mahasiswa.index') }}"
                               class="btn btn-outline-secondary"
                               title="Reset Filter">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>


{{-- =====================================================
     INFORMASI DATA
====================================================== --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <small class="text-muted">
            Menampilkan
            <strong>{{ $mahasiswas->firstItem() ?? 0 }}</strong>
            sampai
            <strong>{{ $mahasiswas->lastItem() ?? 0 }}</strong>
            dari
            <strong>{{ $mahasiswas->total() }}</strong>
            mahasiswa
        </small>
    </div>

    {{-- FILTER AKTIF --}}
    @if(request('search') || request('prodi_id'))
        <span class="badge bg-primary">
            <i class="bi bi-funnel me-1"></i> Filter aktif
        </span>
    @endif
</div>


{{-- =====================================================
     TABLE
====================================================== --}}
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

                @forelse($mahasiswas as $mahasiswa)
                    <tr>

                        {{-- NOMOR --}}
                        <td class="px-4">
                            <span class="text-muted">
                                {{ $mahasiswas->firstItem() + $loop->index }}
                            </span>
                        </td>

                        {{-- NIM --}}
                        <td>
                            <span class="fw-semibold">{{ $mahasiswa->nim }}</span>
                        </td>

                        {{-- NAMA --}}
                        <td>
                            <span class="fw-semibold">{{ $mahasiswa->nama }}</span>
                        </td>

                        {{-- PRODI --}}
                        <td>
                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                {{ $mahasiswa->prodi->nama_prodi }}
                            </span>
                        </td>

                        {{-- JENIS KELAMIN --}}
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

                        {{-- AKSI --}}
                        <td>
                            <div class="d-flex justify-content-center gap-1">

                                {{-- DETAIL --}}
                                <a href="{{ route('mahasiswa.show', $mahasiswa) }}"
                                   class="btn btn-sm btn-outline-info"
                                   title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                                   class="btn btn-sm btn-outline-warning"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    {{-- =================================================
                         EMPTY STATE
                    ================================================== --}}
                    <tr>
                        <td colspan="6" class="py-5">
                            <div class="text-center">

                                <div class="mx-auto mb-3 rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center"
                                     style="width:70px; height:70px;">
                                    <i class="bi bi-people fs-3"></i>
                                </div>

                                <h5 class="fw-bold">Data Mahasiswa Tidak Ditemukan</h5>

                                <p class="text-muted">
                                    @if(request('search') || request('prodi_id'))
                                        Tidak ada mahasiswa yang sesuai dengan filter.
                                    @else
                                        Belum ada data mahasiswa.
                                    @endif
                                </p>

                                {{-- RESET FILTER --}}
                                @if(request('search') || request('prodi_id'))
                                    <a href="{{ route('mahasiswa.index') }}"
                                       class="btn btn-outline-primary">
                                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                                        Reset Filter
                                    </a>
                                @else
                                    {{-- TAMBAH --}}
                                    <a href="{{ route('mahasiswa.create') }}"
                                       class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-1"></i>
                                        Tambah Mahasiswa
                                    </a>
                                @endif

                            </div>
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>
        </div>


        {{-- =====================================================
             PAGINATION
        ====================================================== --}}
        @if($mahasiswas->hasPages())
            <div class="pagination-wrapper">

                {{-- INFORMASI PAGINATION --}}
                <div class="pagination-info">
                    Menampilkan
                    <strong>{{ $mahasiswas->firstItem() }}</strong>
                    -
                    <strong>{{ $mahasiswas->lastItem() }}</strong>
                    dari
                    <strong>{{ $mahasiswas->total() }}</strong>
                    data
                </div>

                {{-- NAVIGATION --}}
                <nav aria-label="Navigasi halaman mahasiswa">
                    <ul class="pagination-custom">

                        {{-- PREVIOUS --}}
                        @if($mahasiswas->onFirstPage())
                            <li class="disabled">
                                <span aria-disabled="true" aria-label="Previous">
                                    <i class="bi bi-chevron-left"></i>
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $mahasiswas->previousPageUrl() }}" aria-label="Previous">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- NOMOR HALAMAN --}}
                        @foreach(
                            $mahasiswas->getUrlRange(
                                max(1, $mahasiswas->currentPage() - 2),
                                min($mahasiswas->lastPage(), $mahasiswas->currentPage() + 2)
                            ) as $page => $url
                        )
                            @if($page == $mahasiswas->currentPage())
                                <li class="active">
                                    <span aria-current="page">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- NEXT --}}
                        @if($mahasiswas->hasMorePages())
                            <li>
                                <a href="{{ $mahasiswas->nextPageUrl() }}" aria-label="Next">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="disabled">
                                <span aria-disabled="true" aria-label="Next">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </li>
                        @endif

                    </ul>
                </nav>

            </div>
        @endif

    </div>
</div>

@endsection


{{-- =====================================================
     CUSTOM STYLE
====================================================== --}}
@push('styles')
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
@endpush