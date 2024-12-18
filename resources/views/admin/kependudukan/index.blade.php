@extends('admin.layouts.main',['title' => 'Data Penduduk'])
@section('headerside')
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Data Penduduk</h2>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-header">
                                    @can('isAdmin')
                                        <a href="{{ route('datapenduduk.tambah') }}" class="btn btn-primary"><i
                                                class="fe fe-file-plus fe-16"></i> Tambah
                                            Data Penduduk</a>
                                    @endcan
                                    <a href="{{ route('datapenduduk.export') }}" class="btn btn-success text-light"><i
                                            class="fe fe-download fe-16"></i> Download Data Penduduk</a>
                                </div>
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Nama</strong></th>
                                            <th><strong>Nik</strong></th>
                                            <th><strong>Alamat</strong></th>
                                            <th><strong>Usia</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_penduduk as $penduduk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penduduk->nama }}</td>
                                                <td>{{ $penduduk->nik }}</td>
                                                <td>{{ $penduduk->alamat }}</td>
                                                <td>{{ $penduduk->usia }}</td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{ route('datapenduduk.edit', $penduduk->nik) }}"
                                                            class="btn btn-primary dropdown-item"><i class="fe fe-edit"></i>
                                                            Edit</a>
                                                        <form class="d-flex" method="POST"
                                                            action="{{ route('datapenduduk.delete', $penduduk->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger dropdown-item"
                                                                onclick="return confirm('anda yakin ingin menghapus data penduduk {{ $penduduk->nama }} ini secara permanen?');event.preventDefault();
                                                            "><i
                                                                    class="fe fe-trash-2"></i> Hapus</button>
                                                        </form>
                                                        {{-- <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="btn btn-danger d-flex dropdown-item"
                                                                    href="{{ route('penduduk.delete', $berita->slug) }}"
                                                                    onclick="return confirm('anda yakin ingin menghapus berita?');event.preventDefault();
                                                        "><i
                                                                        class="fe fe-trash-2"></i> Hapus</a>
                                                    <a class="dropdown-item" href="#">Remove</a> --}}
                                                    </div>
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
@endsection
