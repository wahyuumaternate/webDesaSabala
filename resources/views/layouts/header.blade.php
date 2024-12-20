<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center {{ Request::is('/') ? 'header-transparent' : '' }}"
    style="z-index: 9999;">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <!-- <h1 class="text-light"><a href="index.html"><span>Moderna</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/"><img src="{{ asset('assets/img/logoMorotai.png') }}" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>

                <li class="dropdown">
                    <a class="{{ Request::is('profil*') ? 'active' : '' }}" href="{{ route('visimisi') }}">
                        <span>Profil</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a href="{{ route('visimisi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                        <li><a href="{{ route('gambaran.umum') }}">Gambaran Umum</a></li>
                        <li><a href="{{ route('struktur.organisasi') }}">Struktur Organisasi</a></li>
                    </ul>
                </li>


                <li class="dropdown"><a class="{{ Request::is('statistik*') ? 'active' : '' }}"
                        href="{{ route('jenis_kelamin') }}"><span>Statistik Desa</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('jenis_kelamin') }}">Jenis Kelamin</a></li>
                        <li><a href="{{ route('agama') }}">Agama</a></li>
                        <li><a href="{{ route('pekerjaan') }}">Pekerjaan</a></li>
                        <li><a href="{{ route('pendidikan') }}">Pendidikan</a></li>
                        <li><a href="{{ route('kelompok_umur') }}">Kelompok Umur</a></li>
                    </ul>
                </li>
                <li><a class="{{ Request::is('pelayanan') ? 'active' : '' }}"
                        href="{{ route('pelayanan') }}">Pelayanan</a></li>
                {{-- <li><a class="{{ Request::is('berita') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a>
                </li> --}}
                <li class="dropdown"><a class="{{ Request::is('d*') ? 'active' : '' }}"
                        href="{{ route('jenis_kelamin') }}"><span>Publikasi</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri</a></li>
                        <li><a href="{{ route('video') }}">Video</a></li>
                    </ul>
                </li>
                <li><a class="{{ Request::is('apbdes') ? 'active' : '' }}" href="{{ route('apbdes') }}">APBDes</a>
                </li>
                <li><a class="{{ Request::is('peta') ? 'active' : '' }}" href="{{ route('peta') }}">Peta
                        Desa</a></li>
                @auth('masyarakat')
                    <li class="dropdown"><a class="{{ Request::is('pelayanan*') ? 'active' : '' }}"
                            href="{{ url('surat-rekomendasi-izin-kegiatan-keramaian') }}"><span><lord-icon
                                    src="https://cdn.lordicon.com/hbvyhtse.json" trigger="hover" colors="primary:#fff"
                                    state="hover" style="width:30px;height:30px">
                                </lord-icon></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('mas_profil') }}">Profil</a></li>
                            <li><a href="{{ route('mas_logout') }}">Logout</a></li>

                        </ul>
                    </li>
                @endauth
                @guest('masyarakat')
                    @guest('web')
                        <li><a class="" target="_blank" href="{{ route('login') }}"><span class="btn text-light"
                                    style="background-color:#0b8ae4;">Login <svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                        <path fill-rule="evenodd"
                                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg></span> </a></li>
                    @endguest

                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
