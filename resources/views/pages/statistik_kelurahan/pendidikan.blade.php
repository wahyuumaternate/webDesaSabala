@extends('layouts.main',['title' => 'Statistik Berdasarkan Pendididkn'])

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
                                     <span class="me-3">  <i class="bi bi-pie-chart-fill"></i> </span> Statistik Penduduk
                                </button>
                            </h3>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        <a href="{{ route('jenis_kelamin') }}" class="list-group-item list-group-item-action ">Jenis
                                            Kelamin</a>
                                        <a href="{{ route('agama') }}" class="list-group-item list-group-item-action ">Agama</a>
                                        <a href="{{ route('pekerjaan') }}" class="list-group-item list-group-item-action ">Pekerjaan</a>
                                        <a href="{{ route('pendidikan') }}"
                                            class="list-group-item list-group-item-action active">Pendidikan</a>
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

                <div class="col-lg-8 col-md-12">
                    <div class="card shadow">
                        <div class="container pt-3">

                            <div id="pekerjaan" style="min-height: 400px;" class="echart"></div>
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
                                    @foreach ($pendidikan as $pk)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $pk->nama_pendidikan }}</td>
                                            <td> {{ $penduduk->where('id_pendidikan', $pk->id)->count() }}</td>
                                            <td> {{ $penduduk->where('id_pendidikan', $pk->id)->where('jenis_kelamin', "LAKI-LAKI")->count() }}</td>
                                            <td> {{ $penduduk->where('id_pendidikan', $pk->id)->where('jenis_kelamin', "PEREMPUAN")->count() }}</td>
                                        </tr>
                                    @endforeach

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
                    text: 'Statistik Berdasarkan Pendidikan',
                    subtext: 'Grafik Pendidikan',
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
                    radius: '70%',
                    data: [
                        @foreach ($pendidikan as $d)
                            {
                                @foreach ($penduduk as $p)
                                    value: {{ $penduduk->where('id_pendidikan', $d->id)->count() }},
                                @endforeach
                                name: "{{ $d->nama_pendidikan }}",
                            },
                        @endforeach


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
