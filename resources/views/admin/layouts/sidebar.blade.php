<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/ico/favicon-96x96.png') }}" alt="Logo" class="avatar-img">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Home</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Pages</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#berita" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">Publikasi</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="berita">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('berita.index') }}"><span class="ml-1 item-text">
                                Berita</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('galeris.index') }}"><span
                                class="ml-1 item-text">Galeri</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('videos.index') }}"><span
                                class="ml-1 item-text">Vidio</span></a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('berita.tambah') }}"><span class="ml-1 item-text">Tambah Berita</span></a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('lurah.index') }}"><span class="ml-1 item-text">Sambutan
                                Kepala Desa</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#info-desa" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-info fe-16"></i>
                    <span class="ml-3 item-text">Info Desa</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="info-desa">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('rt_rw') }}"><span class="ml-1 item-text">Rt &
                                Rw</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#kependudukan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Kependudukan</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="kependudukan">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('datapenduduk.index') }}"><span
                                class="ml-1 item-text">Data Penduduk</span></a>
                    </li>
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('pekerjaan.index') }}"><span
                                    class="ml-1 item-text">Pekerjaan</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('pendidikan.index') }}"><span
                                    class="ml-1 item-text">Pendidikan</span></a>
                        </li>
                    @endcan
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#pengaduan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-mail fe-16"></i>
                    <span class="ml-3 item-text">Pengaduan Masyarakat</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="pengaduan">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('pengaduan.index') }}"><span
                                class="ml-1 item-text">Pengaduan Belum Terkirim</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('pengaduan.terkirim') }}"><span
                                class="ml-1 item-text">Pengaduan Terkirim</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        @can('isAdmin')
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item  dropdown">
                    <a href="#profil-Desa" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-book fe-16"></i>
                        <span class="ml-3 item-text">Profil Desa</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="profil-Desa">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('visimisi.index') }}"><span
                                    class="ml-1 item-text">Visi & Misi</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('sejarah.index') }}"><span
                                    class="ml-1 item-text">Sejarah</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('gambaranumum.index') }}"><span
                                    class="ml-1 item-text">Gambaran Umum</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('organisasi.index') }}"><span
                                    class="ml-1 item-text">Struktur
                                    Organisasi</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item  dropdown">
                    <a href="#pelayanan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-file-text fe-16"></i>
                        <span class="ml-3 item-text">Pelayanan</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="pelayanan">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('pelayanan.index') }}"><span
                                    class="ml-1 item-text">Pelayanan Masuk</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('jenis_pelayanan.index') }}"><span
                                    class="ml-1 item-text">Jenis Pelayanan</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <!-- Dropdown Toggle -->
                    <a href="#apbdes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-dollar-sign fe-16"></i> <!-- Currency Icon -->
                        <span class="ml-3 item-text">APBDes</span> <!-- Text -->
                    </a>
                    <!-- Collapsible Dropdown Menu -->
                    <ul class="collapse list-unstyled pl-4 w-100" id="apbdes">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('pendapatan.index') }}">
                                <span class="ml-1 item-text">Pendapatan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('belanja.index') }}">
                                <span class="ml-1 item-text">Belanja</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('jenis_pelayanan.index') }}">
                                <span class="ml-1 item-text">Pembiyayaan</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endcan
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('peta.index') }}">
                    <i class="fe fe-map fe-16"></i>
                    <span class="ml-3 item-text">Peta Desa</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Users</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item  dropdown">
                <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Users</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="user">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('profile.edit') }}"><span
                                class="ml-1 item-text">Profil User</span></a>
                    </li>
                    @can('isLurah')
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('register') }}"><span class="ml-1 item-text">Tambah
                                    User</span></a>
                        </li>
                    @endcan
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
            this.closest('form').submit();">
                        <i class="fe fe-log-out fe-16"></i>
                        <span class="ml-3 item-text">Logout</span>
                    </a>

                </form>
            </li>
        </ul>
    </nav>
</aside>
