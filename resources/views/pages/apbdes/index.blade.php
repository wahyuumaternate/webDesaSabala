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
        <p id="yearText" class="text-center">
            Perbandingan Anggaran Pendapatan dan Belanja Desa Sabala Tahun {{ now()->year }}
        </p>

        <!-- Dropdown Year Selector -->
        <div class="text-center">
            <div class="d-flex justify-content-center">
                <div class="col-4">
                    <select id="yearSelect" class="form-select" aria-label="Pilih Tahun">
                        <option selected value="">-- Pilih Tahun --</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Pendapatan dan Belanja -->
        <div class="row text-center mt-4">
            <div class="col-md-6 mb-3">
                <div class="box income">
                    <p>Pendapatan</p>
                    <p id="pendapatanText" class="highlight">
                        Rp {{ number_format($totalPendapatan, 2, ',', '.') }}
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="box expense">
                    <p>Belanja</p>
                    <p id="belanjaText" class="highlight">
                        Rp {{ number_format($totalBelanja, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Penerimaan dan Pengeluaran -->
        <div class="row text-center mt-4">
            <div class="col-md-6 mb-3">
                <div class="box financing">
                    <p>Penerimaan</p>
                    <p id="penerimaanText" class="highlight">
                        Rp {{ number_format($penerimaan, 2, ',', '.') }}
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="box expense">
                    <p>Pengeluaran</p>
                    <p id="pengeluaranText" class="highlight">
                        Rp {{ number_format($pengeluaran, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Surplus/Defisit -->
        <div class="text-center mt-4">
            <p id="surplusDefisitText" class="highlight">
                Surplus/Defisit: Rp {{ number_format($surplusDefisit, 2, ',', '.') }}
            </p>
        </div>


        <!-- Grafik Pendapatan vs Belanja -->
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

        <!-- Grafik Belanja -->
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

    <!-- ECharts Library -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script> --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", () => {
            const yearSelect = document.getElementById('yearSelect');
            const pendapatanText = document.getElementById('pendapatanText');
            const belanjaText = document.getElementById('belanjaText');
            const penerimaanText = document.getElementById('penerimaanText');
            const pengeluaranText = document.getElementById('pengeluaranText');
            const surplusDefisitText = document.getElementById('surplusDefisitText');
            const yearText = document.getElementById('yearText'); // Target the paragraph for year text
            // Yearly Data for Charts
            const years = @json($years);
            const pendapatanValuesByYear = @json($pendapatanValuesByYear);
            const belanjaValuesByYear = @json($belanjaValuesByYear);

            // Get the current year
            const currentYear = new Date().getFullYear();

            // Set default year on page load
            yearSelect.value = currentYear;

            // Define Chart Rendering Functions First
            const renderYearlyChart = () => {
                const chart = echarts.init(document.getElementById('all'));
                chart.setOption({
                    title: {
                        text: 'Pendapatan vs Belanja Per Tahun',
                        left: 'center'
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['Pendapatan', 'Belanja'],
                        bottom: 10
                    },
                    xAxis: {
                        type: 'category',
                        data: years
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                            name: 'Pendapatan',
                            type: 'bar',
                            data: pendapatanValuesByYear,
                            itemStyle: {
                                color: '#006BFF'
                            }
                        },
                        {
                            name: 'Belanja',
                            type: 'bar',
                            data: belanjaValuesByYear,
                            itemStyle: {
                                color: '#4CC9FE'
                            }
                        }
                    ]
                });
            };

            const renderChart = (id, title, categories, values, color) => {
                const chart = echarts.init(document.getElementById(id));
                chart.setOption({
                    title: {
                        text: title,
                        left: 'center'
                    },
                    tooltip: {
                        trigger: 'item'
                    },
                    xAxis: {
                        type: 'category',
                        data: categories
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                        type: 'bar',
                        data: values,
                        itemStyle: {
                            color
                        }
                    }]
                });
            };

            // Render Initial Charts
            renderYearlyChart();
            renderChart('pendapatanChart', 'Pendapatan Desa Berdasarkan Kategori', @json($pendapatan->keys()),
                @json($pendapatan->values()), '#006BFF');
            renderChart('belanjaChart', 'Belanja Desa Berdasarkan Kategori', @json($belanja->keys()),
                @json($belanja->values()), '#1976D2');
            renderChart('pembiayaanChart', 'Pembiayaan Desa Berdasarkan Kategori', @json($pembiayaan->pluck('kategori_pembiayaan')),
                @json($pembiayaan->pluck('jumlah')), '#1976D2');

            // Event Listener for Year Selection
            yearSelect.addEventListener('change', (event) => {
                const selectedYear = event.target.value || currentYear;
                // Update year text dynamically
                yearText.textContent =
                    `Perbandingan Anggaran Pendapatan dan Belanja Desa Sabala Tahun ${selectedYear}`;

                // Fetch data for the selected year
                fetch(`/apbdes/data?year=${selectedYear}`)
                    .then(response => response.json())
                    .then(data => {
                        const {
                            pendapatan,
                            belanja,
                            pembiayaan
                        } = data;
                        const surplusDefisit = pendapatan.total - belanja.total;

                        // Update texts
                        pendapatanText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(pendapatan.total);
                        belanjaText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(belanja.total);
                        penerimaanText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(pembiayaan.penerimaan);
                        pengeluaranText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(pembiayaan.pengeluaran);
                        surplusDefisitText.textContent =
                            `Surplus/Defisit: ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(surplusDefisit)}`;

                        // Update charts
                        renderChart('pendapatanChart', 'Pendapatan Desa Berdasarkan Kategori',
                            pendapatan.categories, pendapatan.values, '#006BFF');
                        renderChart('belanjaChart', 'Belanja Desa Berdasarkan Kategori', belanja
                            .categories, belanja.values, '#1976D2');
                        renderChart('pembiayaanChart', 'Pembiayaan Desa Berdasarkan Kategori',
                            pembiayaan.categories, pembiayaan.values, '#1976D2');
                    });
            });
        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const yearSelect = document.getElementById('yearSelect');
            const pendapatanText = document.getElementById('pendapatanText');
            const belanjaText = document.getElementById('belanjaText');
            const penerimaanText = document.getElementById('penerimaanText');
            const pengeluaranText = document.getElementById('pengeluaranText');
            const surplusDefisitText = document.getElementById('surplusDefisitText');
            const yearText = document.getElementById('yearText');

            const years = @json($years);
            const pendapatanValuesByYear = @json($pendapatanValuesByYear);
            const belanjaValuesByYear = @json($belanjaValuesByYear);

            const currentYear = new Date().getFullYear();
            yearSelect.value = currentYear;

            const renderYearlyChart = () => {
                const chart = echarts.init(document.getElementById('all'));
                chart.setOption({
                    title: {
                        text: 'Pendapatan dan Belanja Desa dari Tahun ke Tahun',
                        left: 'center'
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['Pendapatan', 'Belanja'],
                        bottom: 10
                    },
                    xAxis: {
                        type: 'category',
                        data: years
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                            name: 'Pendapatan',
                            type: 'bar',
                            data: pendapatanValuesByYear,
                            itemStyle: {
                                color: '#006BFF'
                            }
                        },
                        {
                            name: 'Belanja',
                            type: 'bar',
                            data: belanjaValuesByYear,
                            itemStyle: {
                                color: '#4CC9FE'
                            }
                        }
                    ]
                });

                window.addEventListener('resize', () => chart.resize());
            };

            const renderChart = (id, title, categories, values, color) => {
                const chart = echarts.init(document.getElementById(id));
                chart.setOption({
                    title: {
                        text: title,
                        left: 'left'
                    },
                    tooltip: {
                        trigger: 'item'
                    },
                    xAxis: {
                        type: 'category',
                        data: categories
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [{
                        type: 'bar',
                        data: values,
                        itemStyle: {
                            color
                        }
                    }]
                });

                window.addEventListener('resize', () => chart.resize());
            };

            // Render Pembiayaan Chart
            const renderPembiayaanChart = () => {
                const chart = echarts.init(document.getElementById('pembiayaanChart'));
                const categories = ['Penerimaan', 'Pengeluaran'];
                const values = [
                    @json($penerimaan),
                    @json($pengeluaran)
                ];

                // Format values as currency
                const formattedValues = values.map(value =>
                    new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(value)
                );

                chart.setOption({
                    title: {
                        text: 'Pembiayaan Desa',
                        left: 'left'
                    },
                    tooltip: {
                        trigger: 'item',
                        formatter: function(params) {
                            return `${params.name}: ${formattedValues[params.dataIndex]}`;
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: categories
                    },
                    yAxis: {
                        type: 'value',
                        axisLabel: {
                            formatter: function(value) {
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(value);
                            }
                        }
                    },
                    series: [{
                        type: 'bar',
                        data: values,
                        itemStyle: {
                            color: function(params) {
                                return params.dataIndex === 0 ? '#006BFF' :
                                    '#4CC9FE'; // Blue for Penerimaan, Red for Pengeluaran
                            }
                        },
                        label: {
                            show: true,
                            position: 'top',
                            formatter: function(params) {
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(params.value);
                            }
                        }
                    }]
                });

                window.addEventListener('resize', () => chart.resize());
            };


            renderYearlyChart();
            renderChart('pendapatanChart', 'Pendapatan Desa', @json($pendapatan->keys()),
                @json($pendapatan->values()), '#006BFF');
            renderChart('belanjaChart', 'Belanja Desa', @json($belanja->keys()),
                @json($belanja->values()), '#1976D2');
            renderPembiayaanChart();

            yearSelect.addEventListener('change', (event) => {
                const selectedYear = event.target.value || currentYear;

                yearText.textContent =
                    `Perbandingan Anggaran Pendapatan dan Belanja Desa Sabala Tahun ${selectedYear}`;

                fetch(`/apbdes/data?year=${selectedYear}`)
                    .then(response => response.json())
                    .then(data => {
                        const {
                            pendapatan,
                            belanja,
                            pembiayaan
                        } = data;
                        const surplusDefisit = pendapatan.total - belanja.total;

                        pendapatanText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(pendapatan.total);

                        belanjaText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(belanja.total);

                        penerimaanText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(pembiayaan.penerimaan);

                        pengeluaranText.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(pembiayaan.pengeluaran);

                        surplusDefisitText.textContent = `Surplus/Defisit: ${new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(surplusDefisit)}`;

                        renderChart('pendapatanChart', 'Pendapatan Desa',
                            pendapatan.categories, pendapatan.values, '#006BFF');
                        renderChart('belanjaChart', 'Belanja Desa', belanja
                            .categories, belanja.values, '#1976D2');

                        // Update Pembiayaan Chart
                        const pembiayaanValues = [pembiayaan.penerimaan, pembiayaan.pengeluaran];
                        renderChart('pembiayaanChart', 'Pembiayaan Desa', [
                            'Penerimaan', 'Pengeluaran'
                        ], pembiayaanValues, '#1976D2');
                    });
            });
        });
    </script>
    <style>
        .echart-container {
            width: 100%;
            height: 400px;
        }

        .highlight {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .box {
            border-radius: 8px;
            padding: 20px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .income {
            color: #388e3c;
        }

        .expense {
            color: #d32f2f;
        }

        .financing {
            color: #1976d2;
        }
    </style>
</section>

@include('layouts.footer')
@endsection
