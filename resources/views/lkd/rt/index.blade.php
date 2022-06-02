@extends('layouts.backend.app')

@section('tite', 'LKD | RT')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">RT</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">RT</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- end row -->

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
                <div class="card-header">
                    <h4 class="card-title mb-0">RT</h4>
                </div><!-- end card header -->

                <div class="card-body">
                        @can('admin_akses')                         
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('rt.create') }}" class="btn btn-sm btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i> Tambah</a>
                                </div>
                            </div>
                        </div>
                        @endcan

                        <div class="mt-3 mb-1">
                            <table id="example" class="table align-middle dt-responsive table-nowrap" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama RT</th>
                                        <th>RW</th>
                                        <th>Dusun</th>
                                        <th>Nama Ketua RT</th>
                                        <th>Nik Ketua RT</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kontak Ketua RT</th>
                                        <th>Alamat Ketua RT</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rts as $item)
                                        
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->rw->nama }}</td>
                                        <td>{{ $item->rw->dusun->nama }}</td>
                                        <td>{{ $item->nama_krt }}</td>
                                        <td>{{ $item->nik_krt }}</td>
                                        <td>{{ $item->jk->nama }}</td>
                                        <td>{{ $item->kontak }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            <a href="{{ route('rt.show', $item) }}" class="btn btn-sm btn-success">lihat</a>
                                            @can('admin_akses')  
                                            <a href="{{ route('rt.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('rt.destroy', $item) }}" method="POST" onsubmit="return confirm('anda yakin ?')" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="4">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                
                                            </div>
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('css') 
    <link rel="stylesheet" href="assets\libs\DataTables\Bootstrap-5-5.1.3\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\libs\DataTables\DataTables-1.12.1\css\dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets\libs\DataTables\Responsive-2.3.0\css\responsive.bootstrap5.min.css">
@endpush

@push('script')

    <script src="assets\libs\DataTables\jQuery-3.6.0\jquery-3.6.0.min.js"></script>
    <script src="assets\libs\DataTables\DataTables-1.12.1\js\jquery.dataTables.min.js"></script>
    <script src="assets\libs\DataTables\DataTables-1.12.1\js\dataTables.bootstrap5.min.js"></script>
    <script src="assets\libs\DataTables\Responsive-2.3.0\js\dataTables.responsive.min.js"></script>
    <script src="assets\libs\DataTables\Responsive-2.3.0\js\responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                lengthMenu: [
                    [5, 20, 50, -1],
                    [5, 20, 50, 'All'],
                ],
            });
        });
    </script>
   
@endpush