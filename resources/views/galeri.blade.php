@extends('layouts/master')
@section('content')
<!--Hero Section-->
<header class="masthead">
    <div class="container-fluid hero-section" style="width: 100%;height: 350px;">
        <div class="heading">
            GALERI
            <hr id="hr-hero">
        </div>
    </div>
</header>
<!--Content-->
<section style="padding-top: 5%; padding-bottom:5%;">
    <div id="portfolio">
        <div class="container">
            @foreach ($galeri as $g)
            <h1 class="mb-5" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">{{ $g->judul }}</h1>
            <div class="row" style="margin-bottom: 7%;">
                @foreach (explode('|', $g->gambar) as $image)
                <div class="mb-4 col-sm-12 col-lg-3 col-md-3">
                    <div class="card" style="max-height: 400px;">
                        <a class="portfolio-box" href="{{ $image }}">
                            <img class="img-fluid" src="{{ $image }}" alt="..." />
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
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
    <div>
</section>
@endsection