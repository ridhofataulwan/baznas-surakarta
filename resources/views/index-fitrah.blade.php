@extends('layouts/master')
@section('content')
<!-- Masthead-->
<header class="masthead">
    <div class="container mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/korosel4.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/korosel3.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/korosel2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/korosel1.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</header>

<!-- About-->
<section class="mb-5 mt-5" id="about">
    <div class="container">
        <div class="justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text" style="color: #01502D;">PENDISTRIBUSIAN</h2>
                <hr class="divider divider-light" />
                <div class="row">
                    <div class="mt-3 col-sm-6 col-lg-4 col-md-4">
                        <div class="card" style="border-radius: 15px; max-height: 400px;">
                            <img src="{{ asset($distKabar->gambar) }}" class="card-img-top" alt="" style="background-color: #FF9900; border-top-left-radius: 15px; border-top-right-radius: 15px; min-height: 250px; max-height: 300px;">
                            <div class="card-body" style="background-color: #FF9900; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; ">
                                <h5 class="card-title">{{ $distKabar->judul }}</h5>
                                <p class="card-text" style="background-color: #FF9900; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                    {{ $distKabar->deskripsi }}
                                </p>
                                <a href="#" class="btn btn-primary2" style="color: black;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-sm-6 col-lg-4 col-md-4">
                        <div class="card" style="border-radius: 15px; max-height: 400px;">
                            <img src="{{ asset($distArtikel->gambar) }}" class="card-img-top" alt="" style="background-color: #FF9900; border-top-left-radius: 15px; border-top-right-radius: 15px; min-height: 250px; max-height: 300px;">
                            <div class="card-body" style="background-color: #FF9900; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; ">
                                <h5 class="card-title">{{ $distArtikel->judul }}</h5>
                                <p class="card-text" style="background-color: #FF9900; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                    {{ $distArtikel->deskripsi }}
                                </p>
                                <a href="#" class="btn btn-primary2" style="color: black;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-sm-6 col-lg-4 col-md-4">
                        <div class="card" style="border-radius: 15px; max-height: 400px;">
                            <img src="{{ asset($distInspirasi->gambar) }}" class="card-img-top" alt="" style="background-color: #FF9900; border-top-left-radius: 15px; border-top-right-radius: 15px; min-height: 250px;max-height: 300px;">
                            <div class="card-body" style="background-color: #FF9900; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; ">
                                <h5 class="card-title">{{ $distInspirasi->judul }}</h5>
                                <p class="card-text" style="background-color: #FF9900; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                    {{ $distInspirasi->deskripsi }}
                                </p>
                                <a href="#" class="btn btn-primary2" style="color: black;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    <br>
                    <a href="#" style="color: black; margin-top: 3%;"><b>Lihat Lebih Banyak</b></a>
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section2" id="services" style="background-color: #01502D;">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5" style="background-color: white; border-radius: 15px; height: auto">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/penerima.png" style="max-width: 300px; max-height: autox;"><i class="fs-1 text-primary"></i></div>
                    <h3 class="h5 mb-2" style="color: #FF9900;">PENERIMA</h3>
                    <p class="h2 mb-2" style="color: #FF9900;"><b>*</b></p>
                    <div>&nbsp;</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5" style="background-color: white; border-radius: 15px; height: auto">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/himpunan.png" style="max-width: 300px; max-height: auto;"><i class="fs-1 text-primary"></i></div>
                    <h3 class="h5 mb-2" style="color: #FF9900;">PENGHIMPUNAN</h3>
                    <p class="h2 mb-2" style="color: #FF9900;"><b>*</b></p>
                    <div>&nbsp;</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5" style="background-color: white; border-radius: 15px; height: auto">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/dana.png" style="max-width: 300px; max-height: 200px;"><i class="fs-1 text-primary"></i></div>
                    <h3 class="h6 mb-2" style="color: #FF9900;">DANA YANG TERSALURKAN</h3>
                    <p class="h2 mb-2" style="color: #FF9900;"><b>*</b></p>
                    <div>&nbsp;</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5" style="background-color: white; border-radius: 15px; height: auto">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/donatur.png" style="max-width: 300px; max-height: 200px;"><i class="fs-1 text-primary"></i></div>
                    <h3 class="h5 mb-2" style="color: #FF9900;">DONATUR</h3>
                    <p class="h2 mb-2" style="color: #FF9900;"><b>*</b></p>
                    <div>&nbsp;</div>
                </div>
            </div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>
    </div>
</section>
<section class="" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <h2 class="text" style="color: #01502D;">KALKULATOR ZAKAT FITRAH</h2>
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body" style="background-color: #01502D;">
                                <h5 class="card-title" style="color:white; text-align: left;"><b>Komponen Zakat</b>
                                </h5>
                                <div>&nbsp;</div>
                                <p class="card-text" style="color: white; text-align: left;">Silahkan diisi sesuai dengan harga beras 1 Kg di kota anda</p>
                                <div>&nbsp;</div>
                                <form action="{{ url('index-fitrah') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <p class="card-text" style="color: white; text-align: left;">Harga Beras (1 Kg)</p>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <div class="input-group-text">Rp</div>
                                            <input type="number" min="0" class="form-control" id="autoSizingInputGroup" name="harga">
                                        </div>
                                    </div>
                                    <p class="card-text" style="color: white; text-align: left;">Besaran Zakat Fitrah</p>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <div class="input-group-text">Kg</div>
                                            <input type="text" class="form-control" id="autoSizingInputGroup" value="2,5" readonly>
                                        </div>
                                    </div>
                                    {{-- <p class="card-text" style="color: white; text-align: left;">Hutang/Cicilan bulanan
                                        (opsional)</p>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <div class="input-group-text">Rp</div>
                                            <input type="text" class="form-control" id="autoSizingInputGroup">
                                        </div>
                                    </div> --}}
                                    <div>&nbsp;</div>
                                    <button type="submit" class="btn btn-primary2" style="background-color: #FF9900; border-color: #FF9900;">Hitung</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="container">
                            <h6 style="color: black; text-align: left;"><b>Jenis Zakat</b></h6>
                            <select class="form-select" id="autoSizingSelect" onchange="location = this.value;">
                                {{-- <option value="#" selected>Pilih Jenis Zakat</option> --}}
                                <option value="{{ url('/index-fitrah') }}" selected>Zakat Fitrah</option>
                                <option value="{{ url('/index-maal') }}">Zakat Maal</option>
                                <option value="{{ url('/index-fidyah') }}">Zakat Fidyah</option>
                                <option value="{{ url('/index-qurban') }}">Qurban</option>
                                <option value="{{ url('/index-infaq') }}">Infaq</option>
                            </select>
                            <div>&nbsp;</div>
                            <h6 style="color: black; text-align: left;"><b>ZAKAT FITRAH</b></h6>
                            <p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">Zakat fitrah adalah zakat yang harus ditunaikan
                                bagi seorang muzakki yang telah memiliki kemampuan untuk menunaikannya. Zakat fitrah
                                adalah zakat wajib yang harus dikeluarkan sekali setahun yaitu saat bulan ramadhan
                                menjelang idul fitri. Pada prinsipnya, zakat fitrah haruslah dikeluarkan sebelum sholat
                                idul fitri dilangsungkan. Hal tersebut yang menjadi pembeda zakat fitrah dengan zakat
                                lainnya.</p>
                            <h6 style="color: black; text-align: left;"><b>Nilai Zakat Fitrah</b></h6>
                            @if (session('total'))
                            <div class="col-auto">
                                <div class="input-group">
                                    <div class="input-group-text">Rp</div>
                                    <input type="text" class="form-control" value="{{ number_format(session('total')) }}" id="autoSizingInputGroup" readonly>
                                </div>
                            </div>
                            @else
                            <div class="col-auto">
                                <div class="input-group">
                                    <div class="input-group-text">Rp</div>
                                    <input type="text" class="form-control" value="0" id="autoSizingInputGroup" readonly>
                                </div>
                            </div>
                            @endif
                            <div>&nbsp;</div>
                            {{-- <a href="#" class="btn btn-primary2 text-white" style="background-color: #2E3192; border-color: #2E3192;">Hitung</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section2">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3 col-lg-3 col-sm-6">
                <div class="card border-0">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container" style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D;">
                            <img src="assets/img/portfolio/logo/kantonguang.png" style="max-height: 120px;" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2" style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
                            ZAKAT
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6">
                <div class="card border-0">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container" style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D">
                            <img src="assets/img/portfolio/logo/iconinfaq.png" style="max-height: 120px;" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2" style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
                            INFAQ
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6">
                <div class="card border-0">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container" style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D">
                            <img src="assets/img/portfolio/logo/iconsedekah.png" style="max-height: 120px;" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2" style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
                            SEDEKAH
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6">
                <div class="card border-0">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container" style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D">
                            <img src="assets/img/portfolio/logo/iconfidya.png" style="max-height: 120px;" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2" style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
                            FIDYAH
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section2" id="services" style="background-color: #01502D;">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-6">
                <center>
                    <h3 class="text-white">Galeri Kegiatan</h3>
                </center>
                <div class="card" style="background-color: transparent; border: none;">
                    <div class="card-body" style="border: none; background-color: transparent;">
                        <div>&nbsp;</div>
                        <div class="row">
                            @foreach ($galeri as $g)
                            <div class="col-md-6 mt-2">
                                <div class="card" style="border-radius: 15px; height: auto;">
                                    <img src="{{ $g->gambar }}" alt="{{ $g->judul }}" style="border-radius: 15px; height: 150px;">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-3">
                <center>
                    <h3 class="text-white">Video</h3>
                </center>
                <div>&nbsp;</div>
                <iframe id='youtube' src="https://www.youtube.com/embed/RGZ9fCX7uU8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<div>&nbsp;</div>
<div>&nbsp;</div>
<section class="" id="about">
    <center>
        <h2 class="mb-4" style="color: #01502D;">LAPORAN DATA ZIS</h2>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mt-2">
                    <span class="input-group-text" style="background-color: #01502D; color:#fff; width: 120px;">Zakat Fitrah</span>
                    <span class="input-group-text" style="background-color: #E5E5E5; color: black;">Rp</span>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text" style="background-color: #01502D; color:#fff; width: 120px;">Infaq</span>
                    <span class="input-group-text" style="background-color: #E5E5E5; color: black;">Rp</span>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text" style="background-color: #01502D; color:#fff; width: 120px;">Sedekah</span>
                    <span class="input-group-text" style="background-color: #E5E5E5; color: black;">Rp</span>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text" style="background-color: #01502D; color:#fff; width: 120px;">Fidyah</span>
                    <span class="input-group-text" style="background-color: #E5E5E5; color: black;">Rp</span>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text" style="background-color: #01502D; color:#fff; width: 120px;">Total</span>
                    <span class="input-group-text" style="background-color: #E5E5E5; color: black;">Rp</span>
                </div>
            </div>
            <div class="col-md-6">
                <img src="./assets/img/1.png" class="image-infaq" style="width: 615px; height: 635px; position: absolute; transform: translate(-5%, -15%);" alt="">
            </div>
        </div>
        <canvas id="myChart" class="mt-5" style="width:100%;max-width:700px"></canvas>
    </div>
</section>
<section class="mb-5" id="about">
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <h2 class="text" style="color: #2E3192;">BERITA</h2>
                <hr class="divider divider-light" />
                <div id="carouselExampleControls" class="carousel slide p-0" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <!--Card-->
                            <div class="row" style="margin-left: 9%; margin-right: 9%;">
                                @foreach ($kabar as $k)
                                <div class="col-md-4 col-sm-12 col-lg-4 mt-3">
                                    <div class="card" style="border-radius: 15px; width: 100%;">
                                        <img src="{{ asset($k->gambar) }}" class="card-img-top" alt="" style="background-color: #ECE8E8; border-top-left-radius: 15px; border-top-right-radius: 15px; height: 250px;">
                                        <div class="card-body" style="background-color: #ECE8E8; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; max-height: 170px;">
                                            <h5 class="card-title" style="text-align: left;">{{ $k->judul }}</h5>
                                            <p class="card-text" style="background-color: #ECE8E8; text-align: left; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                                {{ $k->deskripsi }}
                                            </p>
                                            <a href="#" class="btn btn-primary" style="color: white; font-size: 13px;">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="carousel-item">
                            <!--Card-->
                            <div class="row" style="margin-left: 9%; margin-right: 9%;">
                                @foreach ($artikel as $a)
                                <div class="col-md-4 col-sm-12 col-lg-4 mt-3">
                                    <div class="card" style="border-radius: 15px; width: 100%;">
                                        <img src="{{ asset($a->gambar) }}" class="card-img-top" alt="" style="background-color: #ECE8E8; border-top-left-radius: 15px; border-top-right-radius: 15px; height: 250px;">
                                        <div class="card-body" style="background-color: #ECE8E8; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; max-height: 170px;">
                                            <h5 class="card-title" style="text-align: left;">{{ $a->judul }}</h5>
                                            <p class="card-text" style="background-color: #ECE8E8; text-align: left; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                                {{ $a->deskripsi }}
                                            </p>
                                            <a href="#" class="btn btn-primary" style="color: white; font-size: 13px;">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="carousel-item">
                            <!--Card-->
                            <div class="row" style="margin-left: 9%; margin-right: 9%;">
                                @foreach ($inspirasi as $i)
                                <div class="col-md-4 col-sm-12 col-lg-4 mt-3">
                                    <div class="card" style="border-radius: 15px; width: 100%;">
                                        <img src="{{ asset($i->gambar) }}" class="card-img-top" alt="" style="background-color: #ECE8E8; border-top-left-radius: 15px; border-top-right-radius: 15px; height: 250px;">
                                        <div class="card-body" style="background-color: #ECE8E8; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; max-height: 170px;">
                                            <h5 class="card-title" style="text-align: left;">{{ $i->judul }}</h5>
                                            <p class="card-text" style="background-color: #ECE8E8; text-align: left; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                                {{ $i->deskripsi }}
                                            </p>
                                            <a href="#" class="btn btn-primary" style="color: white; font-size: 13px;">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</section>
<br><br>
<section id="bayar-zakat">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12">
                <div class="card" style="background-color: #E2E2E2; border: #E2E2E2; height: 300px;">
                    <div class="judul-card" style="width: 310px; height: 80px; position: absolute;
                    background-color: #2E3192; left:0;right:0;margin-left: auto;margin-right: auto; transform: translateY(-50%);">
                        <center>
                            <h3 class="text-white mt-4"><b>BAYAR ZAKAT</b></h3>
                        </center>
                    </div>
                    <div class="card-body" style="border: none; background-color: transparent;">
                        <p class="text-dark" style="font-size:18px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                        text-align: center; position: relative; position: relative;
                        top: 45%;
                        transform: translateY(-50%); margin-left: 3%; margin-right: 3%; margin-bottom: 10%;">
                            Zakat Anda kami salurkan kepada yang jauh lebih membutuhkan dengan berbagai macam
                            program kami <br>
                            yang telah disiapkan oleh BAZNAS BAZIS SURAKARTA
                        </p>
                        <div class="input-group mt-5 mb-3" style="padding-left: 20%; padding-right: 20%;">
                            <input type="text" style="height: 58px;" class="form-control border-0 bg-white" placeholder="Rp. Masukan Nominal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text p-0" id="basic-addon2">
                                <button class="btn btn-primary" style="width: 100%; height: 100%;">Zakat</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" style="padding: 0%;">
    <img src="assets/img/backgroundbawah.png" style="width: 100%;">
</section>
@endsection