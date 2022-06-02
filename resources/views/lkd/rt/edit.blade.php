@extends('layouts.backend.app')

@section('title', 'Edit RT')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit RT Baru</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('rt.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    
                    <div class="live-preview">
                        <form action="{{ route('rt.update', $rt) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama RT</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $rt->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="dusun_id" class="form-label">Dusun</label>
                                <select class="form-select mb-3 @error('dusun_id')
                                    is-invalid
                                @enderror" name="dusun_id" id="dusun">
                                    <option value=" " selected>pilih dusun</option>
                                    @foreach ($dusun as $item)
                                        @if (old('dusun_id', $rt->rw->dusun->id) == $item->id)   
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
                            <div class="col-md-6">
                                <label for="dusun_id" class="form-label">RW</label>
                                <select class="form-select mb-3" name="rw_id" id="sub_rw">
                                    @foreach ($rw as $item)
                                        @if (old('rw_id', $rt->rw_id) == $item->id)   
                                        <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                        @else   
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_krt" class="form-label">Nama Ketua RT</label>
                                <input type="text" class="form-control @error('nama_krt') is-invalid @enderror" id="nama_krt" name="nama_krt" value="{{ old('nama_krt', $rt->nama_krt) }}">
                                @error('nama_krt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nik_krt" class="form-label">Nik Ketua RT</label>
                                <input type="number" class="form-control @error('nik_krt') is-invalid @enderror" id="nik_krt" name="nik_krt" value="{{ old('nik_krt', $rt->nik_krt) }}">
                                @error('nik_krt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="jk_id" class="form-label">Jenis Kelamin</label>
                                <select class="form-select mb-3 @error('jk_id')
                                    is-invalid
                                @enderror" name="jk_id">
                                    <option value=" " selected>pilih jenis kelamin</option>
                                    @foreach ($jk as $item)
                                        @if (old('jk_id', $rt->jk_id) == $item->id)   
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
                            <div class="col-md-6">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak', $rt->kontak) }}">
                            </div>
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea rows="3" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $rt->alamatprt) }}"></textarea>
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

@push('script')
<script src="assets\libs\DataTables\jQuery-3.6.0\jquery-3.6.0.min.js"></script>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#dusun').on('change',function(e) {
            var dusun_id = e.target.value;
            
            if (dusun_id) {
                
                $.ajax({
                    url:"{{ route('sub.rw') }}",
                    type:"POST",
                    data: {
                    dusun_id: dusun_id
                    },
                    success:function (data) {
                        if (data) {       
                            $('#sub_rw').empty();
                            $('#sub_rw').append('<option hidden>pilih rw</option>'); 
                            $.each(data, function(key, subrws){
                                $('select[name="rw_id"]').append('<option value="'+ subrws.id +'" selected>' +subrws.nama+ '</option>');
                            });
                        } else {
                            $('#sub_rw').empty();
                        }
                    }
                });
            } else {
                $('#sub_rw').empty();
            }
        });
    });
</script>
@endpush