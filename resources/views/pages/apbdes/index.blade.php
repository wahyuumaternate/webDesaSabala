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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const belanjaData = @json($belanja); // Data Belanja Desa dari Controller
            const categories = Object.keys(belanjaData); // Kategori Belanja Desa
            const values = Object.values(belanjaData); // Nilai Belanja Desa

            // Inisialisasi ECharts
            const chart = echarts.init(document.getElementById('belanjaChart'));

            // Opsi Grafik
            chart.setOption({
                title: {
                    text: 'Belanja Desa Tahun 2024',
                    left: 'left',
                    textStyle: {
                        fontWeight: 'bold',
                        fontSize: 18
                    }
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow' // Highlight shadow pada batang
                    }
                },
                xAxis: {
                    type: 'category',
                    data: categories,
                    axisLabel: {
                        rotate: 25, // Rotasi label agar tidak tumpang tindih
                        fontSize: 12
                    }
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value} Rp'
                    }
                },
                series: [{
                    name: 'Belanja Desa',
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
                        color: '#006BFF' // Warna merah muda batang
                    },
                    barWidth: '50%' // Ukuran batang
                }]
            });

            // Responsif untuk resize layar
            window.addEventListener('resize', chart.resize);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const pembiayaanData = @json($pembiayaan); // Data Pembiayaan dari Controller
            const categories = Object.keys(pembiayaanData); // Penerimaan dan Pengeluaran
            const values = Object.values(pembiayaanData); // Nilai masing-masing kategori

            // Inisialisasi ECharts
            const chart = echarts.init(document.getElementById('pembiayaanChart'));

            // Opsi Grafik
            chart.setOption({
                title: {
                    text: 'Pembiayaan Desa Tahun 2024',
                    left: 'left',
                    textStyle: {
                        fontWeight: 'bold',
                        fontSize: 18
                    }
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow' // Highlight shadow pada batang
                    }
                },
                xAxis: {
                    type: 'category',
                    data: categories,
                    axisLabel: {
                        fontSize: 12
                    }
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value} Rp'
                    }
                },
                series: [{
                    name: 'Pembiayaan Desa',
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
                        color: '#006BFF' // Warna merah batang
                    },
                    barWidth: '50%' // Ukuran batang
                }]
            });

            // Responsif untuk resize layar
            window.addEventListener('resize', chart.resize);
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
