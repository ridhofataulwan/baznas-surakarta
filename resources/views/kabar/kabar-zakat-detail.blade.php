@extends('layouts/master')
@section('content')
<section class="page-section" id="about">
    <center>
        <h3 style="font-weight:900;">{{$data->title}}</h3>
    </center>
    <div class=" container mb-5 mt-5 d-flex justify-content-center">
        <img class="img-fluid" alt="" src="{{asset(''.$data->image.'')}}" style="width:100%; object-fit:contain;"
            style="background-color:red;">
    </div>
    <div class="container visi-misi">
        <div class="text-content">
            {!! $data->content !!}
        </div>
    </div>
</section>
@endsection