@extends('layouts.backend.app')

@section('title', 'Edit Suku')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit Suku Baru</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('suku.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    
                    <div class="live-preview">
                        <form action="{{ route('suku.update', $suku) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Suku</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $suku->nama) }}" autofocus>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                        
                            <div class="col-md-12">
                                <label for="des" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="des" rows="3" name="deskripsi">{{ old('deskripsi', $suku->deskripsi) }}
                                </textarea>
                            </div>                        
                            
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection