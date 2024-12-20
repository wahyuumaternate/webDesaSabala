@extends('layouts.main', ['title' => 'Berita Terkini'])

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
                <li>Berita Desa</li>
            </ol>
        </div>

    </div>
</section><!-- End breadcrumbs Section -->

<!-- ======= posts Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">


            <div class="col-lg-1"></div>
            <div class="col-lg-10 entries">
                <div class="row">
                    @foreach ($berita as $b)
                        <div class="col-lg-6 col-sm-12">
                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ asset('storage/' . $b->gambar) }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="{{ route('detail.berita', $b->slug) }}">{{ $b->judul }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                                href="{{ route('detail.berita', $b->slug) }}">{{ $b->views }}</a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="{{ route('detail.berita', $b->slug) }}"><time
                                                    datetime="2020-01-01">{{ $b->created_at->format('M d, Y') }}</time></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {!! $b->excerp !!}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ route('detail.berita', $b->slug) }}">Read More</a>
                                    </div>
                                </div>

                            </article><!-- End blog entry -->
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <div class="blog-pagination">
                        {{ $berita->links() }}
                    </div>
                </div>
            </div>
        </div><!-- End blog entries list -->
        <div class="col-lg-1"></div>

    </div>

    </div>
</section><!-- End posts Section -->
@include('layouts.footer')
@endsection
