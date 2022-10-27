@extends('layouts/master')
@section('content')
<!--Hero Section-->
<header class="masthead">
    <div class="container-fluid hero-section" style="width: 100%;height: 350px;">
        <div class="heading">
            VIDEO KEGIATAN
            <hr id="hr-hero">
        </div>
    </div>
</header>
<!--Content-->
<section style="padding-top: 10%; padding-bottom:5%;">
    <div class="container">
        <div class="row">
            <div class="mb-4 col-sm-12 col-lg-4 col-md-4">
                <div class="card" style="max-height: 400px;">
                    <iframe src="https://www.youtube.com/embed/RGZ9fCX7uU8?controls=0" class="card-img-top" style="background-color: #FF9900; min-height: 250px; max-height: 300px;">
                    </iframe>
                    <div class="card-body" style="background-color: #FF9900;">
                        <h5 class="card-title">Baznas Surakarta</h5>
                        <p class="card-text">
                            Baznas Surakarta adalah Badan Amil Zakat Nasional (BAZNAS) yang dibentuk di kota
                            Surakarta</p>
                        <a href="https://youtu.be/RGZ9fCX7uU8" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-sm-12 col-lg-4 col-md-4">
                <div class="card" style="max-height: 400px;">
                    <iframe src="https://www.youtube.com/embed/i7lS09PuIm0?controls=0" class="card-img-top" style="background-color: #FF9900; min-height: 250px; max-height: 300px;">
                    </iframe>
                    <div class="card-body" style="background-color: #FF9900;">
                        <h5 class="card-title">Kegiatan Zakat</h5>
                        <p class="card-text">
                            Potret kegiatan Baznas Surakarta dalam hal zakat bersama masyarakat</p>
                        <a href="https://www.youtube.com/watch?i7lS09PuIm0" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-sm-12 col-lg-4 col-md-4">
                <div class="card" style="max-height: 400px;">
                    <iframe src="https://www.youtube.com/embed/P8_R4qztG3Y?controls=0" class="card-img-top" style="background-color: #FF9900; min-height: 250px; max-height: 300px;">
                    </iframe>
                    <div class="card-body" style="background-color: #FF9900;">
                        <h5 class="card-title">Bayar Infaq</h5>
                        <p class="card-text">
                            Pembayaran infaq yang dilakukan bersama Baznas Surakarta</p>
                        <a href="#" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-sm-12 col-lg-4 col-md-4">
                <div class="card" style="max-height: 400px;">
                    <iframe src="https://www.youtube.com/embed/RGZ9fCX7uU8?controls=0" class="card-img-top" style="background-color: #FF9900; min-height: 250px; max-height: 300px;">
                    </iframe>
                    <div class="card-body" style="background-color: #FF9900;">
                        <h5 class="card-title">Baznas Surakarta</h5>
                        <p class="card-text">
                            Baznas Surakarta adalah Badan Amil Zakat Nasional (BAZNAS) yang dibentuk di kota
                            Surakarta</p>
                        <a href="https://youtu.be/RGZ9fCX7uU8" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-sm-12 col-lg-4 col-md-4">
                <div class="card" style="max-height: 400px;">
                    <iframe src="https://www.youtube.com/embed/i7lS09PuIm0?controls=0" class="card-img-top" style="background-color: #FF9900; min-height: 250px; max-height: 300px;">
                    </iframe>
                    <div class="card-body" style="background-color: #FF9900;">
                        <h5 class="card-title">Kegiatan Zakat</h5>
                        <p class="card-text">
                            Potret kegiatan Baznas Surakarta dalam hal zakat bersama masyarakat</p>
                        <a href="https://www.youtube.com/watch?i7lS09PuIm0" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-sm-12 col-lg-4 col-md-4">
                <div class="card" style="max-height: 400px;">
                    <iframe src="https://www.youtube.com/embed/P8_R4qztG3Y?controls=0" class="card-img-top" style="background-color: #FF9900; min-height: 250px; max-height: 300px;">
                    </iframe>
                    <div class="card-body" style="background-color: #FF9900;">
                        <h5 class="card-title">Bayar Infaq</h5>
                        <p class="card-text">
                            Pembayaran infaq yang dilakukan bersama Baznas Surakarta</p>
                        <a href="#" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="..." style="margin-top: 10%;">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link text-white" href="#" tabindex="-1" aria-disabled="true" style="background-color: #01502D;">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item disabled" aria-current="page">
                    <a class="page-link" href="#" style="color:#01502D">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection