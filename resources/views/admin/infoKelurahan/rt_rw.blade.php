@extends('admin.layouts.main',['title' => 'Rt & Rw'])
@section('headerside')
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
@endsection
@section('content')
 {{--  rt --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Rt</h2>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-header">
                                    <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                                        data-target="#Rt"> <i class="fe fe-file-plus fe-16"></i>
                                        Tambah Rt </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="Rt" tabindex="-1" role="dialog"
                                        aria-labelledby="RtLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="RtLabel">Tambah Rt </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('rt.store') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="simple-select2">Nama Rt</label>
                                                            <input type="number" id="simpleinput"
                                                                class="form-control  @error('nama_rt') is-invalid @enderror"
                                                                value="{{ old('nama_rt') }}"
                                                                placeholder="Nama Rt" name="nama_rt" required>
                                                            @error('nama_rt')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div> <!-- Rt -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mb-2 btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn mb-2 btn-primary">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Nama</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rt as $rt)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Rt {{ $rt->nama_rt }}</td>
                                                <td>
                                                    <form class="d-flex" method="POST"
                                                            action="{{ route('rt.delete', $rt->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger"
                                                                onclick="return confirm('anda yakin ingin menghapus {{ $rt->nama_rt }} ini secara permanen?');event.preventDefault();
                                                                "><i
                                                                    class="fe fe-trash-2"></i> Hapus</button>
                                                        </form>
                                                </td>
                                            </tr>
                                            
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
     {{-- end rt --}}
    {{-- Rw --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Rw</h2>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-header">
                                    <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                                        data-target="#Rw"> <i class="fe fe-file-plus fe-16"></i>
                                        Tambah Rw </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="Rw" tabindex="-1" role="dialog"
                                        aria-labelledby="RwLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="RwLabel">Tambah Rw </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('rw.store') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="simple-select2">Nama Rw</label>
                                                            <input type="number" id="simpleinput"
                                                                class="form-control  @error('nama_rw') is-invalid @enderror"
                                                                value="{{ old('nama_rw') }}"
                                                                placeholder="Nama Rw" name="nama_rw" required>
                                                            @error('nama_rw')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div> <!-- Rt -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mb-2 btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn mb-2 btn-primary">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Nama</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rw as $rw)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Rw {{ $rw->nama_rw }}</td>
                                                <td>
                                                    <form class="d-flex" method="POST"
                                                            action="{{ route('rw.delete', $rw->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger"
                                                                onclick="return confirm('anda yakin ingin menghapus {{ $rt->nama_rw }} ini secara permanen?');event.preventDefault();
                                                                "><i
                                                                    class="fe fe-trash-2"></i> Hapus</button>
                                                        </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    {{-- end rw --}}
    
@endsection
