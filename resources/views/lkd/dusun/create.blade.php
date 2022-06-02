@extends('layouts.backend.app')

@section('title', 'Tambah Dusun')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Dusun Baru</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('dusun.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    
                    <div class="live-preview">
                        <form action="{{ route('dusun.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Dusun</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="nama_kadus" class="form-label">Nama Kadus</label>
                                <input type="text" class="form-control @error('nama_kadus') is-invalid @enderror" id="nama_kadus" name="nama_kadus" value="{{ old('nama_kadus') }}">
                                @error('nama_kadus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="nik_kadus" class="form-label">Nik Kadus</label>
                                <input type="text" class="form-control @error('nik_kadus') is-invalid @enderror" id="nik_kadus" name="nik_kadus" value="{{ old('nik_kadus') }}">
                                @error('nik_kadus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">Jenis Kelamin</label>
                                <select class="form-select mb-3 @error('jk_id')
                                    is-invalid
                                @enderror" name="jk_id">
                                    <option value=" " selected>pilih jenis kelamin</option>
                                    @foreach ($jk as $item)
                                        @if (old('jk_id') == $item->id)   
                                        <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                        @else   
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('jk_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak') }}">
                            </div>
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection