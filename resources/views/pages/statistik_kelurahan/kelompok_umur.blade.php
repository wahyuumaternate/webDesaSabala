@extends('layouts.main', ['title' => 'Statistik Berdasarkan Kelompok Umur'])

@section('body')
@section('outmain')
    @include('layouts.header')
    {{-- @include('layouts.hero') --}}
@endsection

<!-- ======= AGAMA Section ======= -->
<section id="AGAMA" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <div class="row">

                <div class="col-lg-4 col-md-12 mb-1">
                    <div class="accordion sticky-top" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    <span class="me-3"> <i class="bi bi-pie-chart-fill"></i> </span> Statistik
                                    Penduduk
                                </button>
                            </h3>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <a href="{{ route('jenis_kelamin') }}"
                                            class="list-group-item list-group-item-action ">Jenis
                                            Kelamin</a>
                                        <a href="{{ route('agama') }}"
                                            class="list-group-item list-group-item-action ">Agama</a>
                                        <a href="{{ route('pekerjaan') }}"
                                            class="list-group-item list-group-item-action ">Pekerjaan</a>
                                        <a href="{{ route('pendidikan') }}"
                                            class="list-group-item list-group-item-action ">Pendidikan</a>
                                        <a href="{{ route('kelompok_umur') }}"
                                            class="list-group-item list-group-item-action active">Kelompok
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
                                    <span class="me-3"> <i class="bi bi-bar-chart-line"></i> </span> Statistik Lainnya
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
                                        <th scope="col">Kelompok</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Laki-Laki</th>
                                        <th scope="col">Perempuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($penduduk->count())
                                        @if ($penduduk->where('usia', '>=', 0)->where('usia', '<=', 5)->count())
                                            <tr>
                                                <td>0 S/D 5 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 0)->where('usia', '<=', 5)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 0)->where('usia', '<=', 5)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 0)->where('usia', '<=', 5)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 5)->where('usia', '<=', 11)->count())
                                            <tr>
                                                <td>5 S/D 11 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 5)->where('usia', '<=', 11)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 5)->where('usia', '<=', 11)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 5)->where('usia', '<=', 11)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 12)->where('usia', '<=', 16)->count())
                                            <tr>
                                                <td>12 S/D 16 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 12)->where('usia', '<=', 16)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 12)->where('usia', '<=', 16)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 12)->where('usia', '<=', 16)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 17)->where('usia', '<=', 25)->count())
                                            <tr>
                                                <td>17 S/D 25 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 17)->where('usia', '<=', 25)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 17)->where('usia', '<=', 25)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 17)->where('usia', '<=', 25)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 26)->where('usia', '<=', 35)->count())
                                            <tr>
                                                <td>26 S/D 35 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 26)->where('usia', '<=', 35)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 26)->where('usia', '<=', 35)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 26)->where('usia', '<=', 35)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 36)->where('usia', '<=', 45)->count())
                                            <tr>
                                                <td>36 S/D 45 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 36)->where('usia', '<=', 45)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 36)->where('usia', '<=', 45)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 36)->where('usia', '<=', 45)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 46)->where('usia', '<=', 55)->count())
                                            <tr>
                                                <td>46 S/D 55 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 46)->where('usia', '<=', 55)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 46)->where('usia', '<=', 55)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 46)->where('usia', '<=', 55)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 56)->where('usia', '<=', 65)->count())
                                            <tr>
                                                <td>56 S/D 65 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 56)->where('usia', '<=', 65)->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 56)->where('usia', '<=', 65)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 56)->where('usia', '<=', 65)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($penduduk->where('usia', '>=', 65)->count())
                                            <tr>
                                                <td>> 65 Tahun</td>
                                                <td> {{ $penduduk->where('usia', '>=', 65)->count() }}</td>
                                                <td> {{ $penduduk->where('usia', '>=', 65)->where('jenis_kelamin', 'LAKI-LAKI')->count() }}
                                                </td>
                                                <td> {{ $penduduk->where('usia', '>=', 65)->where('jenis_kelamin', 'PEREMPUAN')->count() }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endif

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
                    text: 'Statistik Berdasarkan Kelompok Umur',
                    subtext: 'Grafik Kelompok Umur',
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
                            value: {{ $penduduk->where('usia', '>=', 0)->where('usia', '<=', 5)->count() }},
                            name: '0 S/D 5 Tahun'
                        },
                        {
                            value: {{ $penduduk->where('usia', '>=', 5)->where('usia', '<=', 11)->count() }},
                            name: '5 S/D 11 Tahun'
                        },
                        {
                            value: {{ $penduduk->where('usia', '>=', 12)->where('usia', '<=', 16)->count() }},
                            name: '12 S/D 16 Tahun'
                        },
                        {
                            value: {{ $penduduk->where('usia', '>=', 17)->where('usia', '<=', 25)->count() }},
                            name: '17 S/D 25 Tahun'
                        },
                        {
                            value: {{ $penduduk->where('usia', '>=', 26)->where('usia', '<=', 35)->count() }},
                            name: '26 S/D 35 Tahun'
                        },
                        {
                            value: {{ $penduduk->where('usia', '>=', 36)->where('usia', '<=', 45)->count() }},
                            name: '36 S/D 45 Tahun'
                        },

                        {
                            value: {{ $penduduk->where('usia', '>=', 46)->where('usia', '<=', 55)->count() }},
                            name: '46 S/D 55 Tahun'
                        },
                        {
                            value: {{ $penduduk->where('usia', '>=', 56)->where('usia', '<=', 65)->count() }},
                            name: '56 S/D 65 Tahun'
                        },
                        {
                            value: {{ $penduduk->where('usia', '>=', 65)->count() }},
                            name: '> 65 Tahun'
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
