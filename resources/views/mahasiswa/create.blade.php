@extends('layouts.app') 

@section('title', 'Tambah Mahasiswa') 

@section('content') 
<div class="mb-4"> 
    <h2 class="fw-bold"> 
        Tambah Mahasiswa 
    </h2> 
    <p class="text-muted"> 
        Masukkan data mahasiswa baru. 
    </p> 
</div> 

<div class="card shadow-sm"> 
    <div class="card-body"> 
        <form action="{{ route('mahasiswa.store') }}" method="POST"> 
            @csrf 

            <div class="row g-3"> 
                <div class="col-md-6"> 
                    <label class="form-label"> 
                        NIM 
                    </label> 
                    <input 
                        type="text" 
                        name="nim" 
                        class="form-control @error('nim') is-invalid @enderror" 
                        value="{{ old('nim') }}" 
                    > 
                    @error('nim') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 

                <div class="col-md-6"> 
                    <label class="form-label"> 
                        Nama 
                    </label> 
                    <input 
                        type="text" 
                        name="nama" 
                        class="form-control @error('nama') is-invalid @enderror" 
                        value="{{ old('nama') }}" 
                    > 
                    @error('nama') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 

                <div class="col-md-6"> 
                    <label class="form-label"> 
                        Program Studi 
                    </label> 
                    <select 
                        name="prodi_id" 
                        class="form-select @error('prodi_id') is-invalid @enderror" 
                    > 
                        <option value=""> 
                            Pilih Program Studi 
                        </option> 

                        @foreach($prodis as $prodi) 
                            <option 
                                value="{{ $prodi->id }}" 
                                @selected(old('prodi_id') == $prodi->id) 
                            > 
                                {{ $prodi->nama_prodi }} 
                            </option> 
                        @endforeach 
                    </select> 
                    @error('prodi_id') 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
                    @enderror 
                </div> 

                <div class="col-md-6"> 
                    <label class="form-label"> 
                        Jenis Kelamin 
                    </label> 
                    <select name="jenis_kelamin" class="form-select"> 
                        <option value=""> 
                            Pilih 
                        </option> 
                        <option 
                            value="Laki-laki" 
                            @selected(old('jenis_kelamin') == 'Laki-laki') 
                        > 
                            Laki-laki 
                        </option> 
                        <option 
                            value="Perempuan" 
                            @selected(old('jenis_kelamin') == 'Perempuan') 
                        > 
                            Perempuan 
                        </option> 
                    </select> 
                </div> 

                <div class="col-md-6"> 
                    <label class="form-label"> 
                        Tanggal Lahir 
                    </label> 
                    <input 
                        type="date" 
                        name="tanggal_lahir" 
                        class="form-control" 
                        value="{{ old('tanggal_lahir') }}" 
                    > 
                </div> 

                <div class="col-md-6"> 
                    <label class="form-label"> 
                        Telepon 
                    </label> 
                    <input 
                        type="text" 
                        name="telepon" 
                        class="form-control" 
                        value="{{ old('telepon') }}" 
                    > 
                </div> 

                <div class="col-md-12"> 
                    <label class="form-label"> 
                        Email 
                    </label> 
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        value="{{ old('email') }}" 
                    > 
                </div> 

                <div class="col-md-12"> 
                    <label class="form-label"> 
                        Alamat 
                    </label> 
                    <textarea 
                        name="alamat" 
                        class="form-control" 
                        rows="4" 
                    >{{ old('alamat') }}</textarea> 
                </div> 
            </div> 

            <div class="mt-4"> 
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary"> 
                    Batal 
                </a> 
                <button class="btn btn-primary"> 
                    <i class="bi bi-save me-1"></i> 
                    Simpan 
                </button> 
            </div> 
        </form> 
    </div> 
</div> 
@endsection