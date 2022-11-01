@extends('layouts/master')
@section('content')
<!--Hero Section-->
<header class="masthead">
    <div class="container-fluid hero-section" style="width: 100%;height: 350px;">
        <div class="heading">
            {{$category_name}}
            <hr id="hr-hero">
        </div>
    </div>
</header>
<!--Content-->
<section style="padding-top: 5%; padding-bottom:5%;">
    <div class="container">
        <div class="row">
            @foreach ($post as $b)
            @if ($b->status == 'ACTIVE')
            <div class="col-sm-12 col-lg-4 col-md-4 col-12" style="padding: 2%;">
                <div class="card shadow rounded ">
                    <img src="{{ asset($b->image) }}" class="card-img-top" alt="" style="background-color: #FF9900; height: 40vh; object-fit:cover">
                    <div class="card-body">
                        <a href="{{url('post/'.$b->id)}}" class="font-highlight" style="text-align: left; color: #2E3192">{{ $b->title }}
                        </a>
                        <p class="card-text">
                            {!! \Illuminate\Support\Str::words($b->content, 10, $end='...') !!}
                        </p>
                        <a href="{{url('post/'.$b->id)}}" class="btn btn-primary" style="float:right; border-radius: 30px; font-size:clamp(10px, 1vw, 18px);">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="{{ ($post->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                <a class="page-link text-white" href="{{ $post->url($post->currentPage()-1) }}" tabindex="-1" aria-disabled="true" style="background-color: #01502D;">Previous</a>
            </li>
            @for ($i = 1; $i <= $post->lastPage(); $i++)
                <li class="{{ ($post->currentPage() == $i) ? 'page-item active' : 'page-item' }}"><a class="page-link" href="{{ $post->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="{{ ($post->currentPage() == $post->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                    <a class="page-link" href="{{ $post->url($post->currentPage()+1) }}">Next</a>
                </li>
        </ul>
    </nav>
</section>
@endsection