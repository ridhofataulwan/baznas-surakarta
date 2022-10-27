@extends('layouts/master')
@section('content')
<section class="page-section" id="about">
    <center>
        <h1 style="font-weight: bold; opacity: 0.7;">{{$data->judul}}</h1>
    </center>
    <div class="container mb-5 mt-5 d-flex justify-content-center">
        <img src="{{asset(''.$data->gambar.'')}}" alt="" height="550em" style="object-fit:cover;">
    </div>
    <div class="container visi-misi">
        <div class="text-content">
            {!! $data->deskripsi !!}
        </div>
    </div>
</section>
@endsection