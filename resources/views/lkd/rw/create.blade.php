@extends('layouts.backend.app')

@section('title', 'Tambah Rw')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Rw Baru</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('rw.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    
                    <div class="live-preview">
                        <form action="{{ route('rw.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Rw</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" autofocus>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="nama_krw" class="form-label">Nama Ketua Rw</label>
                                <input type="text" class="form-control @error('nama_krw') is-invalid @enderror" id="nama_krw" name="nama_krw" value="{{ old('nama_krw') }}">
                                @error('nama_krw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="nik_krw" class="form-label">Nik Ketua Rw</label>
                                <input type="number" class="form-control @error('nik_krw') is-invalid @enderror" id="nik_krw" name="nik_krw" value="{{ old('nik_krw') }}">
                                @error('nik_krw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="dusun_id" class="form-label">Dusun</label>
                                <select class="form-select mb-3 @error('dusun_id')
                                    is-invalid
                                @enderror" name="dusun_id">
                                    <option value=" " selected>pilih dusun</option>
                                    @foreach ($dusun as $item)
                                        @if (old('dusun_id') == $item->id)   
                                        <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                        @else   
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('dusun_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="jk_id" class="form-label">Jenis Kelamin</label>
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