@extends('layouts/master')
@section('content')
<!-- Masthead-->
<header class="masthead" style="padding-top: 6em;">
    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item card active" style=" width:100%; height: auto !important;">
                    <img src="{{url('assets/img/korosel4.png')}}" style="width: 100%; height:auto" class="d-block"
                        alt="...">
                </div>
                <div class="carousel-item card" style=" width:100%; height: auto !important;">
                    <img src="{{url('assets/img/korosel3.png')}}" style="width: 100%; height:auto" class="d-block"
                        alt="...">
                </div>
                <div class="carousel-item card" style=" width:100%; height: auto !important;">
                    <img src="{{url('assets/img/korosel2.png')}}" style="width: 100%; height:auto" class="d-block"
                        alt="...">
                </div>
                <div class="carousel-item card" style=" width:100%; height: auto !important;">
                    <img src="{{url('assets/img/korosel1.png')}}" style="width: 100%; height:auto" class="d-block"
                        alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
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
                <h2 class="text" style="color: #01502D; margin-top: 50px;">PENDISTRIBUSIAN</h2>
                <div class="row" style="margin-top: 20px;">
                    @foreach ($post['Kabar Zakat'] as $p)
                    <div class="mt-3 col-sm-6 col-lg-4 col-md-4 pendistribusian">
                        <div class="card shadow-sm rounded card-zoom">
                            <img src="{{ asset($p->image) }}" class="card-img-top" alt=""
                                style="height: 300px; object-fit: cover;">
                            <div class="card-body">
                                <a href="post/{{$p->id}}" style="color: #2E3192;">
                                    <h5 class="font-highlight post-title">{{ $p->title }}</h5>
                                </a>
                                <div class="carrousel-preview bg-white">
                                    {!! \Illuminate\Support\Str::words($p->content, 30, $end='...') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div>&nbsp;</div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="kabar-zakat" class="btn btn-success rounded-pill px-3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section2" id="services" style="background-color: #01502D;">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center text-white">PENYALURAN</h2>
        <div class="row gx-4 gx-lg-5 mt-5">
            <div class="col-lg-3 col-md-6 col-6 text-center my-2" data-aos="fade-right" data-aos-delay="100"
                data-aos-duration="500">
                <div class="zoom" style="background-color:white;border-radius: 15px; height: 200px">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/penerima.png" class="penyaluran-image"><i
                            class="fs-1 text-primary"></i></div>
                    <h6 class="mb-2" style="color: #FF9900;">PENERIMA</h6>
                    <h2 class="mb-2" style="color: #FF9900;font-size: 1.7rem;">
                        <b>{{ number_format($penyalur->penerima, 0, '.', '.') }}</b>
                    </h2>
                    <div>&nbsp;</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 text-center my-2" data-aos="fade-right" data-aos-duration="500">
                <div class="zoom" style="background-color: white; border-radius: 15px; height: 200px">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/himpunan.png" class="penyaluran-image"><i
                            class="fs-1 text-primary"></i></div>
                    <h6 class="mb-2" style="color: #FF9900;">PENGHIMPUNAN</h6>
                    <h2 class="mb-2" style="color: #FF9900;font-size: 1.7rem;">
                        <b>{{ number_format($penyalur->penghimpun, 0, '.', '.') }}</b>
                    </h2>
                    <div>&nbsp;</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 text-center my-2" data-aos="fade-left" data-aos-duration="500">
                <div class="zoom" style="background-color: white; border-radius: 15px; height: 200px">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/dana.png" class="penyaluran-image"><i
                            class="fs-1 text-primary"></i></div>
                    <h6 class="mb-2" style="color: #FF9900;">DANA YANG TERSALURKAN</h6>
                    <h2 class="mb-2" style="color: #FF9900;font-size: 1.25rem;"><b>Rp
                            {{ number_format($penyalur->dana_tersalurkan, 0, '.', '.') }}</b></h2>
                    <div>&nbsp;</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 text-center my-2" data-aos="fade-left" data-aos-delay="100"
                data-aos-duration="500">
                <div class="zoom" style="background-color: white; border-radius: 15px; height: 200px">
                    <div>&nbsp;</div>
                    <div class="mb-2"><img src="assets/img/portfolio/logo/donatur.png" class="penyaluran-image"><i
                            class="fs-1 text-primary"></i></div>
                    <h6 class="mb-2" style="color: #FF9900;">DONATUR</h6>
                    <h2 class="mb-2" style="color: #FF9900;font-size: 1.7rem;">
                        <b>{{ number_format($penyalur->donatur, 0, '.', '.') }}</b>
                    </h2>
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
        <div class="row gx-4 gx-lg-5 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-lg-12 text-center">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <h2 class="text" style="color: #01502D;">KALKULATOR ZAKAT</h2>
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card" id="showform" style="border-radius: 20px;">
                            <div class="card-body" style="background-color: #01502D; border-radius: 20px;">
                                <h5 class="text-bold mb-3" style="color:white; text-align: left;">Komponen Zakat
                                </h5>
                                <p class="card-text" style="color: white; text-align: left;">Silahkan diisi sesuai
                                    dengan harga beras 1 Kg di kota anda</p>
                                <p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Harga Beras (1 Kg)</p>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-text">Rp</div>
                                        <input type="text" class="form-control" id="priceFitrah" data-price=0
                                            style="font-size: 15px">
                                    </div>
                                </div>
                                <p class="card-text mb-1 pt-3" style="color: white; text-align: left;">Besaran Zakat Fitrah
                                </p>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-text">Kg</div>
                                        <input type="text" class="form-control" value="2,5" readonly
                                            style="font-size: 15px">
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <a type="button" class="btn btn-primary2" id="hitungFitrah" href="#countzakat"
                                    style="background-color: #FF9900; border-color: #FF9900;">Hitung</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="container">
                            <h6 style="color: black; text-align: left;"><b>Jenis Zakat</b></h6>
                            <select class="form-select" id="countzakat">
                                <!-- <option value="#" disabled>Pilih Jenis Zakat</option> -->
                                <option value="fitrah" selected>Zakat Fitrah</option>
                                <option value="maal">Zakat Maal</option>
                                <option value="penghasilan">Zakat Penghasilan</option>
                                <option value="fidyah">Zakat Fidyah</option>
                                <!-- <option value="qurban">Qurban</option> -->
                                <!-- <option value="infaq">Infaq</option> -->
                            </select>
                            <div>&nbsp;</div>
                            <div id="showdesc">
                                <h6 style="color: black; text-align: left;"><b>ZAKAT FITRAH</b></h6>
                                <p style="color: black; text-align: justify; font-size: clamp(13px, 1vw, 17px);">
                                    Zakat fitrah adalah zakat yang harus ditunaikan bagi seorang muzakki yang telah
                                    memiliki kemampuan untuk menunaikannya. Zakat
                                    fitrah adalah zakat wajib yang harus dikeluarkan sekali setahun yaitu saat bulan
                                    ramadhan menjelang idul fitri. Pada prinsipnya, zakat fitrah haruslah
                                    dikeluarkan sebelum
                                    sholat idul fitri dilangsungkan. Hal tersebut yang menjadi pembeda zakat fitrah
                                    dengan zakat
                                    lainnya.</p>
                                <h6 style="color: black; text-align: left;"><b>Nilai Zakat</b></h6>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-text">Rp</div>
                                        <input type="text" class="form-control" id="resultFitrah"
                                            style="font-size: 15px; border: 1px solid #ced4da" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="showErrors">&nbsp;</div>
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
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-up" data-aos-duration="500">
                <div class="card border-0 zoom">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container"
                            style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D;">
                            <img src="assets/img/portfolio/logo/kantonguang.png"
                                style="height: 10em; width: 100%; object-fit: contain" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2"
                            style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
                            ZAKAT
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-up" data-aos-duration="1000">
                <div class="card border-0 zoom">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container"
                            style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D">
                            <img src="assets/img/portfolio/logo/iconinfaq.png"
                                style="height: 10em; width: 100%; object-fit: contain" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2"
                            style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
                            INFAQ
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="card border-0 zoom">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container"
                            style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D">
                            <img src="assets/img/portfolio/logo/iconsedekah.png"
                                style="height: 10em; width: 100%; object-fit: contain" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2"
                            style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
                            SEDEKAH
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-up" data-aos-duration="2000">
                <div class="card border-0 zoom">
                    <div class="card-body p-3" style="border-radius:30px; border:none;">
                        <div class="container"
                            style="height: auto; border-top-left-radius: 30px; border-top-right-radius: 30px; padding-bottom:4%; padding-top:4%; background-color:#01502D">
                            <img src="assets/img/portfolio/logo/iconfidya.png"
                                style="height: 10em; width: 100%; object-fit: contain" class="card-img-top" alt="...">
                        </div>
                        <div class="container text-white text-center pt-2 pb-2"
                            style="border:none; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; background-color:#FF9900; font-size: clamp(10px, 2vw, 14px);">
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
            <div class="col-md-6" data-aos="fade-right">
                <center>
                    <h3 class="text-white mb-3">Galeri Kegiatan</h3>
                </center>
                <div class="card" style="background-color: transparent; border: none;     display: flex;
                flex-flow: column;
                height: 100%;
                flex: 1 1 auto;">
                    <div class="card-body" style="border: none; background-color: transparent;">
                        <div class="row">
                            @foreach ($galeri as $g)
                            <div class="col-md-6 col-6 mt-4">
                                <div class="card zoom" style="border-radius: 15px; height: auto;">
                                    <img src="{{ $g->gambar }}" alt="{{ $g->judul }}" class="galeri-image"
                                        style="object-fit: cover">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <center>
                    <h3 class="text-white mb-3">Video</h3>
                </center>
                <iframe id='youtube' style="    display: flex;
                    flex-flow: row;
                    height: 90%;
                    flex: 1 1 auto;" src="https://www.youtube.com/embed/RGZ9fCX7uU8" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<div>&nbsp;</div>
<div>&nbsp;</div>
<section class="" id="about">
    <center>
        <h2 class="mb-4" style="color: #01502D;">LAPORAN PENTASARUFAN BAZNAS KOTA SURAKARTA TAHUN 2021</h2>
    </center>
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="d-flex justify-content-center" data-aos="fade-in">
                <div class="col-md-auto mx-lg-5">
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Fakir</span>
                        <span class="input-group-text" style="background-color: white; color: black; width: 10em;">Rp.
                            80.274.000</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Miskin</span>
                        <span class="input-group-text" style="background-color: white; color: black; width: 10em;">Rp.
                            1.089.055.450</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Fisabilillah</span>
                        <span class="input-group-text" style="background-color: white; color: black; width: 10em;">Rp.
                            341.455.611</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text" style="background-color: #01502D; color:#fff; width: 120px;">Ibnu
                            Sabil</span>
                        <span class="input-group-text" style="background-color: white; color: black; width: 10em;">Rp.
                            11.926.500</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Ghorim</span>
                        <span class="input-group-text" style="background-color: white; color: black; width: 10em;">Rp.
                            15.175.000</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Mu'alaf</span>
                        <span class="input-group-text" style="background-color: white; color: black; width: 10em;">Rp.
                            96.736.436</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Amil</span>
                        <span class="input-group-text" style="background-color: white; color: black; width: 10em;">Rp.
                            248.925.827</span>
                    </div>
                    <!-- <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Zakat Fitrah</span>
                        <span class="input-group-text"
                            style="background-color: #E5E5E5; color: black; width: 150px;">Rp.
                            {{number_format($fitrah)}}</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Infaq</span>
                        <span class="input-group-text"
                            style="background-color: #E5E5E5; color: black; width: 150px;">Rp.
                            {{number_format($infaq)}}</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Sedekah</span>
                        <span class="input-group-text"
                            style="background-color: #E5E5E5; color: black; width: 150px;">Rp.
                            {{number_format($sedekah)}}</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Fidyah</span>
                        <span class="input-group-text"
                            style="background-color: #E5E5E5; color: black; width: 150px;">Rp.
                            {{number_format($fidyah)}}</span>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"
                            style="background-color: #01502D; color:#fff; width: 120px;">Total</span>
                        <span class="input-group-text"
                            style="background-color: #E5E5E5; color: black; width: 150px;">Rp.
                            {{number_format($fidyah+$sedekah+$infaq+$fitrah)}}</span>
                    </div> -->
                </div>
                <img src="./assets/img/1.png" class="image-infaq" style="width: 15em;" alt="">
            </div>
            <div class="chart-container" data-aos="fade-in">
                <canvas id="myChart" class="mt-2"></canvas>
            </div>
        </div>
    </div>
</section>
<section class="mb-5" id="about">
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text" style="color: #2E3192; margin-top: 70px;">BERITA</h2>
                <div id="carouselExampleControls" class="carousel slide p-0" data-bs-ride="carousel" data-aos="fade-up">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < count($category); $i++) { ?>
                        <div class="carousel-item <?php if ($i == 0) {
                                                            echo "active";
                                                        } ?>" style="height: auto; width: 100%; object-fit: contain">
                            <!--Card-->
                            <div class="row row-carrousel">
                                <span class="btn btn-round btn-primary"><?= $category[$i]['name'] ?></span>
                                <?php foreach ($post[$category[$i]['name']] as $p) { ?>
                                <div class="col-md-4 col-sm-12 col-lg-4 mt-3">
                                    <div class="card card-zoom">
                                        <img src="{{ asset($p->image) }}" class="card-img-top" alt=""
                                            style="height: 300px; object-fit: cover">
                                        <div class="card-body">
                                            <a href="{{url('kabar-zakat-detail/'.$p->id)}}" style="color: #2E3192;">
                                                <h5 class="font-highlight post-title">{{ $p->title }}</h5>
                                            </a>
                                            <div class="carrousel-preview bg-white">
                                                {!! \Illuminate\Support\Str::words($p->content, 30,
                                                $end='...') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</section>
<br><br>
<section id="bayar-zakat" data-aos="fade-up">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12">
                <div class="card" style="background-color: #E2E2E2; border: #E2E2E2; height: 300px;">
                    <div class="judul-card">
                        <center>
                            <h5 class="text-white mt-4"><b>Pembayar Zakat Terbaru</b></h5>
                        </center>
                    </div>
                    <div class="card-body" style="border: none; background-color: transparent;">
                        @if(sizeof($bayar) > 0)
                        <div class="table-responsive mt-5">
                            <table class="table table-bordered table-md" id="myTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Zakat</th>
                                        <th scope="col">Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bayar as $key => $g)
                                    <tr>
                                        <th scope="row">
                                            <p>{{ $key+1 }}</p>
                                        </th>
                                        <td>
                                            <p>{{ $g->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $g->jenis }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $g->nominal }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <center>
                            <h3 class="mt-4 pt-4" style="font-weight: 800">Belum ada yang membayar zakat</h3>
                        </center>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="kerja-sama" class="mt-5">
    <div class="container">
        <h2 class="text-center" style="color: #01502D" data-aos="fade-up">KERJA SAMA</h2>
        <div class="row text-center">
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-left" data-aos-delay="300">
                <div class="card border-0">
                    <div class="card-body">
                        <img src="{{asset('assets/img/section/logo-baznas-baru.png')}}"
                            style="width: 100%; object-fit: contain" alt="...">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-left" data-aos-delay="100">
                <div class="card border-0">
                    <div class="card-body">
                        <img src="{{asset('assets/img/section/logo-uns.png')}}" style="width: 100%; object-fit: contain"
                            alt="...">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-right" data-aos-delay="100">
                <div class="card border-0">
                    <div class="card-body">
                        <img src="{{asset('assets/img/section/logo-sv.png')}}" style="width: 100%; object-fit: contain"
                            alt="...">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-0 m-0" data-aos="fade-right" data-aos-delay="300">
                <div class="card border-0">
                    <div class="card-body">
                        <img src="{{asset('assets/img/section/logo-solo.png')}}"
                            style="width: 100%; object-fit: contain" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" style="padding: 0%;">
    <img src="assets/img/backgroundbawah.png" style="width: 100%;">
</section>
<div id="myModal" class="modal">
    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="modal-image">
</div>
<style>
.card-zoom {
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}

.card-zoom:hover {
    -webkit-transform: scale(1.05);
    transform: scale(1.05);
}

.zoom {
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}

.zoom:hover {
    transition: .3s ease-in-out;
    transform: scale(1.1);
    overflow: hidden;
}
</style>
<style>
/* Style the Image Used to Trigger the Modal */
.card-zoom img,
.galeri-image {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

/* img:hover {
        opacity: 0.7;
    } */

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.9);
    /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content,
#caption {
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

@media only screen and (max-width: 700px) {
    .modal-content {
        width: 100%;
    }
}

.post-title:hover {
    color: #01502D;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var modal = document.getElementById("myModal");

var modalImg = document.getElementById("modal-image");

var span = document.getElementsByClassName("close")[0];

$(".card-zoom img, .galeri-image").click(function() {
    modal.style.display = "block";
    modalImg.src = this.src;
})

modal.onclick = function() {
    modal.style.display = "none";
}

span.onclick = function() {
    modal.style.display = "none";
}
</script>
@endsection
