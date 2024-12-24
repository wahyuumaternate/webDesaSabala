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
        <div class="row justify-content-center mt-4 pt-4">
            <div class="col-12 col-lg-10">
                <div id="all" class="echart-container"></div>
            </div>
        </div>

        <!-- Grafik Pendapatan -->
        <div class="row justify-content-center mt-4 pt-4">
            <div class="col-12 col-lg-10">
                <div id="pendapatanChart" class="echart-container"></div>
            </div>
        </div>

        <!-- Grafik Belanja Desa -->
        <div class="row justify-content-center mt-4 pt-4">
            <div class="col-12 col-lg-10">
                <div id="belanjaChart" class="echart-container"></div>
            </div>
        </div>

        <!-- Grafik Pembiayaan -->
        <div class="row justify-content-center mt-4 pt-4">
            <div class="col-12 col-lg-10">
                <div id="pembiayaanChart" class="echart-container"></div>
            </div>
        </div>
    </div>


    <!-- ECharts -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Data dari backend
            const pendapatanData = @json($pendapatan); // Data Pendapatan
            const belanjaData = @json($belanja); // Data Belanja
            const pembiayaanData = @json($pembiayaan); // Data Pembiayaan

            // Memproses data pendapatan dan belanja untuk grafik
            const pendapatanCategories = Object.keys(pendapatanData); // Kategori Pendapatan
            const pendapatanValues = Object.values(pendapatanData); // Nilai Pendapatan

            const belanjaCategories = Object.keys(belanjaData); // Kategori Belanja
            const belanjaValues = Object.values(belanjaData); // Nilai Belanja

            const pembiayaanCategories = pembiayaanData.map(item => item
            .kategori_pembiayaan); // Kategori Pembiayaan
            const pembiayaanValues = pembiayaanData.map(item => item.jumlah); // Nilai Pembiayaan

            // Grafik Pendapatan dan Belanja
            function renderAllChart() {
                const chart = echarts.init(document.getElementById('all'));
                chart.setOption({
                    title: {
                        text: 'Pendapatan dan Belanja Desa Berdasarkan Kategori',
                        left: 'center',
                        textStyle: {
                            fontWeight: 'bold',
                            fontSize: 18
                        }
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        },
                        formatter: function(params) {
                            let result = `${params[0].axisValue}<br>`;
                            params.forEach(item => {
                                result += `${item.marker} ${item.seriesName}: <b>${new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(item.value)}</b><br>`;
                            });
                            return result;
                        }
                    },
                    legend: {
                        data: ['Pendapatan', 'Belanja'],
                        bottom: '5%'
                    },
                    xAxis: {
                        type: 'category',
                        data: pendapatanCategories.concat(
                        belanjaCategories), // Gabungkan kategori Pendapatan dan Belanja
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
                            itemStyle: {
                                color: '#006BFF'
                            },
                            barWidth: '30%'
                        },
                        {
                            name: 'Belanja',
                            type: 'bar',
                            data: belanjaValues,
                            itemStyle: {
                                color: '#08C2FF'
                            },
                            barWidth: '30%'
                        }
                    ]
                });
                window.addEventListener('resize', chart.resize);
            }

            // Grafik Pendapatan
            function renderPendapatanChart() {
                const chart = echarts.init(document.getElementById('pendapatanChart'));
                chart.setOption({
                    title: {
                        text: 'Pendapatan Desa Berdasarkan Kategori',
                        left: 'center',
                        textStyle: {
                            fontWeight: 'bold',
                            fontSize: 18
                        }
                    },
                    tooltip: {
                        trigger: 'axis',
                        formatter: function(params) {
                            return `${params[0].name}<br><b>${new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(params[0].value)}</b>`;
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: pendapatanCategories,
                        axisLabel: {
                            rotate: 25
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
                        itemStyle: {
                            color: '#006BFF'
                        },
                        barWidth: '50%'
                    }]
                });
                window.addEventListener('resize', chart.resize);
            }

            // Grafik Belanja
            function renderBelanjaChart() {
                const chart = echarts.init(document.getElementById('belanjaChart'));
                chart.setOption({
                    title: {
                        text: 'Belanja Desa Berdasarkan Kategori',
                        left: 'center',
                        textStyle: {
                            fontWeight: 'bold',
                            fontSize: 18
                        }
                    },
                    tooltip: {
                        trigger: 'axis',
                        formatter: function(params) {
                            return `${params[0].name}<br><b>${new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(params[0].value)}</b>`;
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: belanjaCategories,
                        axisLabel: {
                            rotate: 25
                        }
                    },
                    yAxis: {
                        type: 'value',
                        axisLabel: {
                            formatter: '{value} Rp'
                        }
                    },
                    series: [{
                        name: 'Belanja',
                        type: 'bar',
                        data: belanjaValues,
                        itemStyle: {
                            color: '#08C2FF'
                        },
                        barWidth: '50%'
                    }]
                });
                window.addEventListener('resize', chart.resize);
            }

            // Grafik Pembiayaan
            function renderPembiayaanChart() {
                const chart = echarts.init(document.getElementById('pembiayaanChart'));
                chart.setOption({
                    title: {
                        text: 'Pembiayaan Desa Berdasarkan Kategori',
                        left: 'center',
                        textStyle: {
                            fontWeight: 'bold',
                            fontSize: 18
                        }
                    },
                    tooltip: {
                        trigger: 'axis',
                        formatter: function(params) {
                            return `${params[0].name}<br><b>${new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(params[0].value)}</b>`;
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: pembiayaanCategories,
                        axisLabel: {
                            rotate: 25
                        }
                    },
                    yAxis: {
                        type: 'value',
                        axisLabel: {
                            formatter: '{value} Rp'
                        }
                    },
                    series: [{
                        name: 'Pembiayaan',
                        type: 'bar',
                        data: pembiayaanValues,
                        itemStyle: {
                            color: '#FFA500'
                        },
                        barWidth: '50%'
                    }]
                });
                window.addEventListener('resize', chart.resize);
            }

            // Render semua grafik
            renderAllChart();
            renderPendapatanChart();
            renderBelanjaChart();
            renderPembiayaanChart();
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
