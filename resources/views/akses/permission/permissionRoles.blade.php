@extends('layouts.backend.app')

@section('title', 'Role Permission')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('sukses'))
                <div class="alert alert-primary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
                    <i class="ri-user-smile-line label-icon"></i><strong>Berhasil</strong> - {{ session('sukses') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('gagal'))
                <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
                    <i class="ri-error-warning-line label-icon"></i><strong>Gagal</strong> - {{ session('gagal') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Permission | {{ $permission->name }}</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                            Give Role
                        </button>
    
                        <a href="{{ route('permissions.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                                    @forelse ($permission->roles as $item)
                                        <form action="{{ route('permissions.remove.roles', [$permission, $item]) }}" method="POST" onsubmit="return confirm('Anda yakin ?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-soft-danger btn-border">{{ $item->name }}</button>
                                        </form>
                                    @empty
                                        <div class="col-md-12 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Maaf! Tidak ada data yang ditemukan</h5>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <!-- Grids in modals -->

    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Roles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('permissions.assign.roles', $permission) }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="role" class="form-label text-muted">Roles</label>
                                    <select class="form-control" id="role" name="role" data-choices data-choices-sorting-false>
                                        @foreach ($roles as $item)                  
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection