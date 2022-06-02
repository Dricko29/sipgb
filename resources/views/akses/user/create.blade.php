@extends('layouts.backend.app')

@section('title', 'Tambah User')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Tambah User Baru</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('users.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    
                    <div class="live-preview">
                        <form action="{{ route('users.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="role" class="form-label">Role</label>
                                 <select class="form-select mb-3" name="role">
                                    <option selected>User</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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