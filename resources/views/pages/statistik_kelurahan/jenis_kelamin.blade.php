@extends('layouts.main',['title' => 'Statistik Berdasarkan Jenis Kelamin'])

@section('body')
@section('outmain')
    @include('layouts.header')
    {{-- @include('layouts.hero') --}}
@endsection
<!-- ======= breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="/">Beranda</a></li>
                <li><a href="/">Statistik Kelurahan</a></li>
                <li>Jenis Kelamin</li>
            </ol>
        </div>

    </div>
</section><!-- End breadcrumbs Section -->

<!-- ======= AGAMA Section ======= -->
<section id="AGAMA" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <div class="row">

                <div class="col-lg-4 col-md-12 mb-2 ">
                    <div class="accordion sticky-top shadow" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                     <span class="me-3">  <i class="bi bi-pie-chart-fill"></i> </span> Statistik Penduduk
                                </button>
                            </h3>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <a href="{{ route('jenis_kelamin') }}" class="list-group-item list-group-item-action active">Jenis
                                            Kelamin</a>
                                        <a href="{{ route('agama') }}" class="list-group-item list-group-item-action ">Agama</a>
                                        <a href="{{ route('pekerjaan') }}" class="list-group-item list-group-item-action ">Pekerjaan</a>
                                        <a href="{{ route('pendidikan') }}"
                                            class="list-group-item list-group-item-action ">Pendidikan</a>
                                        <a href="{{ route('kelompok_umur') }}" class="list-group-item list-group-item-action ">Kelompok
                                            Umur</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    <span class="me-3"> <i class="bi bi-graph-up"></i> </span> Statistik Keluarga
                                </button>
                            </h3>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    <span class="me-3">  <i class="bi bi-bar-chart-line"></i> </span> Statistik Lainnya
                                </button>
                            </h3>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card shadow">
                        <div class="container pt-3">
                            <div id="pekerjaan" style="min-height: 600px;" class="echart"></div>
                        </div>
                        <div class="container" style="overflow-x:auto;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kelompok</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Laki-Laki</th>
                                        <th scope="col">Perempuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>LAKI-LAKI</td>
                                        <td> {{ $penduduk->where('jenis_kelamin', 'LAKI-LAKI')->count() }}</td>
                                        <td> {{ $penduduk->where('jenis_kelamin', 'LAKI-LAKI')->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                        </td>
                                        <td> {{ $penduduk->where('jenis_kelamin', 'LAKI-LAKI')->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>PEREMPUAN</td>
                                        <td> {{ $penduduk->where('jenis_kelamin', 'PEREMPUAN')->count() }}</td>
                                        <td> {{ $penduduk->where('jenis_kelamin', 'PEREMPUAN')->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                        </td>
                                        <td> {{ $penduduk->where('jenis_kelamin', 'PEREMPUAN')->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section><!-- End AGAMA Section -->

@include('layouts.footer')

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            echarts.init(document.querySelector("#pekerjaan")).setOption({
                title: {
                    text: 'Statistik Berdasarkan Jenis Kelamin',
                    subtext: 'Grafik Jenis Kelamin',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },

                toolbox: {
                    show: true,
                    feature: {
                        mark: {
                            show: true
                        },
                        dataView: {
                            show: false,
                            readOnly: false
                        },
                        restore: {
                            show: false
                        },
                        saveAsImage: {
                            show: true
                        }
                    }
                },
                series: [{
                    name: 'Populasi',
                    type: 'pie',
                    radius: '50%',
                    data: [{
                            value: {{ $penduduk->where('jenis_kelamin', 'LAKI-LAKI')->count() }},
                            name: 'LAKI-LAKI'
                        },
                        {
                            value: {{ $penduduk->where('jenis_kelamin', 'PEREMPUAN')->count() }},
                            name: 'PEREMPUAN'
                        },
                        
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            });
        });
    </script>
@endsection
@endsection
