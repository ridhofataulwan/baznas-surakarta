@extends('layouts/master')
@section('content')
<section class="page-section" id="about" style="max-width: 650px; margin:auto">
    <center>
        <h3 style="font-weight:900;">{{$post->title}}</h3>
        <ul style="list-style-type: none; margin:0; padding: 0">
            <li style="display:inline">Diposting oleh : <span style=" color:#000000;">{{$post->author}}</span></li> |
            <li style="display:inline"><span style=" color:#000000;">{{date_format($post->created_at, "d F Y")}}</span></li>
            <li class="my-2">Bagikan :
                <span class="dot" style="background-color:#10B418;">
                    <a href="https://api.whatsapp.com/send/?text={{$post->title}}+https://{{$_SERVER['HTTP_HOST']}}{{$_SERVER['REQUEST_URI']}}+&amp;utm_source=whatsapp&amp;utm_campaign=baznassocmed&amp;utm_medium=btn&amp;utm_content=distribution_news" title="Bagikan berita ini ke whatsapp" target="_blank">
                        <i class="social-media-share-btn fa fa-whatsapp"></i>
                    </a>
                </span>
                <span class="dot" style="background-color:#1C96E8">
                    <a href="https://twitter.com/intent/tweet?text={{$post->title}}&amp;url=https://{{$_SERVER['HTTP_HOST']}}{{$_SERVER['REQUEST_URI']}}&amp;utm_source=twitter&amp;utm_campaign=baznassocmed&amp;utm_medium=btn&amp;utm_content=distribution_news" title="Bagikan berita ini ke twitter" target="_blank">
                        <i class="social-media-share-btn fa fa-twitter"></i>
                    </a>
                </span>
                <span class="dot" style="background-color:#1873EB;">
                    <a href="https://web.facebook.com/share.php?u=https://{{$_SERVER['HTTP_HOST']}}{{$_SERVER['REQUEST_URI']}}%3Futm_source%3Dfacebook&amp;utm_campaign=baznassocmed&amp;utm_medium=btn&amp;utm_content=distribution_news" title="Bagikan berita ini ke facebook" target="_blank">
                        <i class="social-media-share-btn fa fa-facebook-f"></i>
                    </a>
                </span>
                <span class="dot" style="background-color:#0088CC;">
                    <a href="https://t.me/share/url?url=https://{{$_SERVER['HTTP_HOST']}}{{$_SERVER['REQUEST_URI']}}&amp;text={{$post->title}}&amp;utm_source=twitter&amp;utm_campaign=baznassocmed&amp;utm_medium=btn&amp;utm_content=distribution_news" title="Bagikan berita ini ke telegram" target="_blank">
                        <i class="social-media-share-btn fa fa-paper-plane"></i>
                    </a>
                </span>
                <span class="dot" style="background-color:#999999;">
                    <a class="clipboard" style="cursor: pointer;" title="Copy Link" target="_blank" onclick="copyLink(window.location.href)">
                        <i class="social-media-share-btn fa fa-link"></i>
                    </a>
                </span>
            </li>
        </ul>
        <div class="alert alert-info my-1" role="alert" id="alert" style="display: none;">
        </div>
    </center>
    <style>
        .dot {
            height: 25px;
            width: 25px;
            border-radius: 50%;
            display: inline-block;
            margin: 0px;
            padding: 0px;
        }
    </style>
    <div class=" container mb-5 mt-5 d-flex justify-content-center">
        <img class="img-fluid" alt="" src="{{asset(''.$post->image.'')}}" style="width:100%; object-fit:contain;" style="background-color:red;">
    </div>
    <div class="container visi-misi">
        <div class="text-content">
            {!! $post->content !!}
        </div>
    </div>
</section>
@endsection