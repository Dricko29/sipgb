@extends('layouts.backend.app')

@section('title', 'Tambah Bahasa')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Tambah Bahasa Baru</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('bahasa.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    
                    <div class="live-preview">
                        <form action="{{ route('bahasa.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Bahasa</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" autofocus>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                        
                            <div class="col-md-12">
                                <label for="inisial" class="form-label">Inisial</label>
                                <input type="text" class="form-control @error('inisial') is-invalid @enderror" id="inisial" name="inisial" value="{{ old('inisial') }}" autofocus>
                                @error('inisial')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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