@extends('layouts/master')
@section('content')
<style>
    @media (max-width: 1200px) {
        .btn-group-vertical {
            width: 100%;
        }
    }

    @media (min-width: 1210px) {
        .btn-group-vertical {
            width: 40vw;
        }
    }
    .header-layanan{
        text-align: center; font-weight: bolder; color:#01502D
    }
    .image-layanan{
        width: 100%; height:auto;
    }
    .image-layanan.bank{
        height:50vh;
    }
</style>
<section class="page-section" style="background-color: #fff;">
    <div class="container">
        <h3 style="text-align: center; font-weight: bolder; color:#01502D" class="mb-3">Layanan Pembayaran Zakat, Infak, Sedekah, Fidyah</h3>
        <p style="text-align: center">BAZNAS memberikan kemudahan kepada Muzaki (donatur) untuk menunaikan zakat, infak dan sedekah (ZIS) melalui berbagai kemudahan kanal pembayaran baik layanan perbankan, layanan langsung maupun layanan digital. </p>
        <center>
            <div class="btn-group-vertical mt-4 mb-3" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" data-id="perbankan" name="btnradio" id="btnradio1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio1"><img style="width: 10%; float:left;"
                        src="{{asset('assets/img/portfolio/logo/logolayanan1.png')}}" />Layanan Perbankan<i
                        class="fas fa-angle-right" style="float: right;"></i></label>

                <input type="radio" class="btn-check" data-id="langsung" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2"><img style="width: 10%; float:left;"
                        src="{{asset('assets/img/portfolio/logo/iconlayanan2.png')}}" />Layanan Langsung<i
                        class="fas fa-angle-right" style="float: right;"></i></label>

                <input type="radio" class="btn-check" data-id="digital" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3"><img style="width: 10%; float:left;"
                        src="{{asset('assets/img/portfolio/logo/iconlayanan3.png')}}" />Layanan Digital<i
                        class="fas fa-angle-right" style="float: right;"></i></label>
            </div>
        </center>
        <div class="show-content-layanan mt-4"></div>
    </div>
</section>
@endsection
