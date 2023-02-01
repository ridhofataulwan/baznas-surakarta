<!-- <div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#"><img style="width: 3em;" src="{{url('assets/img/portfolio/logo/logo3.png')}}"> Baznas</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img style="width: 60%;" src="{{url('assets/img/portfolio/logo/logo3.png')}}">
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->hasRole('admin'))
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Index</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('admin/dana-tersalurkan') }}"> <span>Data Penyaluran</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('admin/laporan-zis') }}"> <span>Laporan Data Zis</span></a>
                    </li>
                </ul>
            </li>

            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i> <span>Kabar</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('admin/kabarzakat') }}"> <span>Data Kabar Zakat</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('admin/artikel') }}"> <span>Data Artikel</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('admin/inspirasi') }}"> <span>Data Inspirasi</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('admin/galeri') }}"> <span>Data Galeri</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-holding-usd"></i> <span>Layanan</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('admin/layanan/rekening') }}"> <span>Rekening</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('admin/layanan/pembayaran') }}"> <span>Daftar
                                Pembayar</span></a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>

    </aside>
</div> -->
<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand p-1 mb-4">
            <a href="/" style="font-family: Nunito; font-weight:bold; font-size: 1.7em"><img style="width: 3em;" src="{{url('/assets/img/portfolio/logo/logo3.png')}}"> BAZNAS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img style="width: 50%;" src="{{url('/assets/img/portfolio/logo/logo3.png')}}">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">CMS</li>
            <li>
                <a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i> <span>Kabar</span></a>
                <ul class="dropdown-menu">
                    <x-admin.sidebar.post />
                    <li><a href="{{url('/admin/category')}}" class="nav-item"><i class="fas fa-cog"></i><span>Kategori</span></a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/galeri')}}"><i class="fas fa-image"></i> <span>Galeri</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-holding-usd"></i>
                    <span>Layanan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{url('/admin/layanan/rekening')}}"> <span>Rekening</span></a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="nav-link" href="{{url('/admin/pesan')}}"><i class="fas fa-envelope"></i>
                    <span>Pesan</span></a>
            </li>
            <li class="menu-header">Pembayaran dan Penyaluran</li>
            <li>
                <a class="nav-link" href="{{url('/admin/statistik')}}"><i class="fas fa-th-large"></i>
                    <span>Statistik</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave"></i>
                    <span>Pembayaran</span></a>
                <ul class="dropdown-menu">
                    <!-- <li>
                        <a class="nav-link" href="{{url('/admin/layanan/pembayaran')}}"> <span>Daftar
                                Pembayar</span></a>
                    </li> -->
                    <li>
                        <a class="nav-link" href="{{url('/admin/pembayaran')}}"><span>Semua Pembayaran</span></a>
                    </li>
                    <!-- <li> -->
                    <!-- <a class="nav-link" href="{{url('/admin/peninjauan/pembayaran')}}"> <span>Peninjauan</span></a> -->
                    <!-- </li> -->
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-holding-usd"></i>
                    <span>Permohonan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{url('/admin/permohonan')}}"><span>Semua Permohonan</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{url('/admin/peninjauan-permohonan')}}"> <span>Peninjauan</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-holding-heart"></i>
                    <span>Penyaluran</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{url('/admin/penyaluran')}}"><span>Semua Penyaluran</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{url('/admin/peninjauan-penyaluran')}}"> <span>Peninjauan</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/program')}}"><i class="fas fa-th-large"></i>
                    <span>Program</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/admin/lembaga')}}"><i class="fas fa-th-large"></i>
                    <span>Lembaga</span></a>
            </li>
        </ul>

    </aside>
</div>