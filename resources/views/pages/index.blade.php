@extends('layouts.main')

@section('body')
@section('outmain')
    @include('layouts.header')
    @include('layouts.hero')
@endsection

<!-- ======= posts Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Berita Terkini</h2>
        </div>
        <div class="row">

            {{-- side berita --}}
            <div class="col-lg-4">

                <div class="sidebar sticky-top">

                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <form action="/" method="get">
                            <input type="text" name="cari-berita" value="{{ request('cari-berita') }}">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->


                    {{-- sambutan Lurah --}}
                    <h3 class="sidebar-title">Sambutan Kepala Desa</h3>
                    <div class="sidebar-item recent-posts">
                        @foreach ($sambutan_lurah as $sambutan)
                            <div class="post-item clearfix">
                                <img src="{{ asset('storage/' . $sambutan->gambar_lurah) }}" alt="gambar lurah">
                                <h4><a
                                        href="{{ route('sambutanlurah', $sambutan->slug) }}">{{ $sambutan->nama_lurah }}</a>
                                </h4>
                                <time datetime="2020-01-01">{{ $sambutan->updated_at->format('M d, Y') }}</time>
                            </div>
                        @endforeach
                    </div><!-- End sidebar recent posts-->
                    {{-- end sambutan Lurah --}}
                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        @foreach ($recent_post as $b)
                            <div class="post-item clearfix">
                                <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}">
                                <h4><a href="{{ route('detail.berita', $b->slug) }}">{{ $b->judul }}</a></h4>
                                <time datetime="2020-01-01">{{ $b->created_at->format('M d, Y') }}</time>
                            </div>
                        @endforeach

                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->


            {{-- berita --}}
            <div class="col-lg-8 entries">
                <div class="row">
                    @if ($berita->count())
                        @foreach ($berita as $berita)
                            <div class="col-lg-6 col-sm-12">
                                <article class="entry">

                                    <div class="entry-img">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt=""
                                            class="img-fluid">
                                    </div>

                                    <h2 class="entry-title">
                                        <a href="{{ route('detail.berita', $berita->slug) }}">{{ $berita->judul }}</a>
                                    </h2>

                                    <div class="entry-meta">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                                    href="{{ route('detail.berita', $berita->slug) }}">{{ $berita->views }}</a>
                                            </li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                    href="{{ route('detail.berita', $berita->slug) }}"><time
                                                        datetime="2020-01-01">{{ $berita->created_at->format('M d, Y') }}</time></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="entry-content">
                                        <p>
                                            {!! $berita->excerp !!}
                                        </p>
                                        <div class="read-more">
                                            <a href="{{ route('detail.berita', $berita->slug) }}">Selengkapnya</a>
                                        </div>
                                    </div>

                                </article><!-- End blog entry -->
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <img src="{{ asset('assets/img/tidakadaberita.svg') }}" width="50%" class="img-fluid"
                                alt="">
                            <h6 class="text-center mt-5 text-muted"> Berita Tidak Tersedia Silakan kunjungi kembali
                                dalam waktu dekat</h6>
                            <a class="text-center mt-5 btn text-light" style="background-color:#1B6B93;"
                                href="/"><i class="bi bi-arrow-return-left"></i> Kembali</a>
                        </div>
                    @endif

                </div>
                @if ($berita->count() >= 6)
                    <div class="blog-pagination">
                        <h5 class="text-center"> <a href="" class="text-center btn text-white"
                                style="background-color:#1B6B93;">Lihat Berita Lainnya</a></h5>



                    </div>
                @endif

            </div><!-- End blog entries list -->

        </div>

    </div>
</section><!-- End posts Section -->

<!-- ======= Facts Section ======= -->
<section class="facts section-bg mt-3" data-aos="fade-up">
    <div class="container">

        <div class="row counters">

            <div class="col-lg-4 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_penduduk }}"
                    data-purecounter-duration="1" class="purecounter"></span>
                <p>Jumlah Penduduk</p>
            </div>

            <div class="col-lg-4 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_perempuan }}"
                    data-purecounter-duration="1" class="purecounter"></span>
                <p>Jumlah Penduduk Perempuan</p>
            </div>

            <div class="col-lg-4 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_laki_laki }}"
                    data-purecounter-duration="1" class="purecounter"></span>
                <p>Jumlah Penduduk Laki - Laki</p>
            </div>
        </div>

    </div>
</section><!-- End Facts Section -->

{{-- JS --}}

@include('layouts.footer')
@endsection
