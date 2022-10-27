@extends('layouts/master')
@section('content')
<!--Hero Section-->
<header class="masthead">
    <div class="container-fluid hero-section" style="width: 100%;height: 350px;">
        <div class="heading">
            INSPIRASI
            <hr id="hr-hero">
        </div>
    </div>
</header>
<!--Content-->
<section style="padding-top: 5%; padding-bottom:5%;">
    <div class="container">
        <div class="row">
            @foreach ($inspirasi as $b)
            @if ($b->status == 'ACTIVE')
            <div class="col-sm-12 col-lg-4 col-md-4 col-12" style="padding: 2%;">
                <div class="card shadow rounded">
                    <img src="{{ asset($b->gambar) }}" class="card-img-top" alt="" style="background-color: #FF9900; height: 40vh;">
                    <div class="card-body">
                        <a href="{{url('inspirasi-detail/'.$b->id)}}" class="font-highlight" style="text-align: left; color: #2E3192">{{ $b->judul }}
                        </a>
                        <p class="card-text">
                            {!! \Illuminate\Support\Str::words($b->deskripsi, 10, $end='...') !!}
                        </p>
                        <a href="{{url('inspirasi-detail/'.$b->id)}}" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <nav aria-label="..." style="margin-top: 15%;">
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