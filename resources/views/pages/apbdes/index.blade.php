@extends('layouts.main', ['title' => 'APBDes Desa'])

@section('body')
@section('outmain')
    @include('layouts.header')
@endsection

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="/">Beranda</a></li>
                <li>APBDes</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs Section -->

<!-- ======= APBDes Section ======= -->
<section id="apbdes" class="blog">
    <div class="container" data-aos="fade-up">
        <h2 class="text-center" style="font-weight: bold;">APB Desa Sabala</h2>
        <p class="text-center">Perbandingan Anggaran Pendapatan dan Belanja Desa Sabala Tahun 2022, 2023, dan 2024</p>

        <!-- Grafik All -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div id="all" class="echart-container"></div>
            </div>
        </div>

        <!-- Grafik Pendapatan -->
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-lg-10">
                <div id="pendapatanChart" class="echart-container"></div>
            </div>
        </div>
    </div>

    <!-- ECharts -->
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.0.0/dist/echarts.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const data = @json($data); // Data dari Controller

            const years = Object.keys(data.pendapatan);
            const pendapatanValues = Object.values(data.pendapatan);
            const belanjaValues = Object.values(data.belanja);

            function renderAllChart() {
                const chart = echarts.init(document.getElementById('all'));
                chart.setOption({
                    title: {
                        text: 'Pendapatan dan Belanja Desa dari Tahun ke Tahun',
                        left: 'left'
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['Pendapatan', 'Belanja'],
                        bottom: '5%'
                    },
                    xAxis: {
                        type: 'category',
                        data: years,
                        axisLabel: {
                            rotate: 45
                        }
                    },
                    yAxis: {
                        type: 'value',
                        axisLabel: {
                            formatter: '{value} Rp'
                        }
                    },
                    series: [{
                            name: 'Pendapatan',
                            type: 'bar',
                            data: pendapatanValues,
                            color: '#006BFF'
                        },
                        {
                            name: 'Belanja',
                            type: 'bar',
                            data: belanjaValues,
                            color: '#08C2FF'
                        }
                    ]
                });
                window.addEventListener('resize', chart.resize);
            }

            function renderPendapatanChart() {
                const pendapatanData = @json($pendapatan); // Data Pendapatan Desa 2024
                const categories = Object.keys(pendapatanData);
                const values = Object.values(pendapatanData);

                const chart = echarts.init(document.getElementById('pendapatanChart'));
                chart.setOption({
                    title: {
                        text: 'Pendapatan Desa 2024',
                        left: 'left'
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
                        type: 'category',
                        data: categories
                    },
                    yAxis: {
                        type: 'value',
                        axisLabel: {
                            formatter: '{value} Rp'
                        }
                    },
                    series: [{
                        name: 'Pendapatan Desa',
                        type: 'bar',
                        data: values,
                        label: {
                            show: true,
                            position: 'top',
                            formatter: function(params) {
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(params.value);
                            }
                        },
                        itemStyle: {
                            color: '#006BFF'
                        },
                        barWidth: '50%'
                    }]
                });
                window.addEventListener('resize', chart.resize);
            }

            renderAllChart();
            renderPendapatanChart();
        });
    </script>

    <style>
        .echart-container {
            width: 100%;
            height: 400px;
        }

        @media (max-width: 768px) {
            .echart-container {
                height: 300px;
                /* Tinggi lebih kecil untuk layar kecil */
            }
        }
    </style>
</section><!-- End APBDes Section -->

@include('layouts.footer')
@endsection
