@extends('layouts.master')
@section('content')
<!--Form-->
<section class="page-section pb-0 p-0" id="about">
    <div class="container-fluid" style="background-image:url('assets/img/pasar-gede.png');background-size:cover; padding-top:5%;">
        <div class="row row-zakat">
            <div class="col-md-5" id='hide-content'>
                <div class="right-content mt-5" style="padding-left: 10%; padding-right: 10%; width: 100%; height: auto; position: relative; transform: translateY(8%);">
                    <h3 class="latin text-white" style="text-align: left; font-size: clamp(20px, 3vw, 36px); font-weight: 700; margin-top:5em;">
                        Masukkan Kode atau NIK untuk Cek Status
                    </h3>
                    <div style="text-align: left; font-size: clamp(10px, 3vw, 15px);" class="latin text-white">
                        Badan Amil Zakat kota Surakarta
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-5">
                <div class="form-zakat shadow border border-white bg-white p-5">
                    <div class="heading-form">
                        <p class="text-form">
                            Cek Permohonan Bantuan
                        </p>
                        <hr id="hr-form">
                    </div>
                    @if (session('nomor-permohonan'))
                    <div class="alert alert-info alert-dismissible show fade">
                        <div class="alert-body">
                            <strong>Nomor Permohonan Anda</strong>
                            <h2>{{ session('nomor-permohonan') }} </h2>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('cek.permohonan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="select-form" class="form-label">Pilih data yang akan diinput<i style="color:red;">*</i></label>
                        <div class="col" id="select-form">
                            <input type="radio" class="btn-check" name="type" id="radio_nik" value="NIK" autocomplete="off" checked>
                            <label class="btn btn-outline-success my-1" for="radio_nik">NIK</label>
                            <input type="radio" class="btn-check" name="type" id="radio_kp" value="KP" autocomplete="off">
                            <label class="btn btn-outline-success my-1" for="radio_kp">Kode Permohonan</label>
                        </div>
                        <div class="form-group mt-4" id="element_kp" style="display: none;">
                            <label for="" class="form-label">Kode Permohonan</label>
                            <input type="text" placeholder="Masukkan Kode" class="form-control bg-white" name="id" autocomplete="no">
                        </div>
                        <div class="form-group mt-4" id="element_nik">
                            <label for="nik" class="form-label nik" id="nik">NIK <i style="color:red;">*</i></label>
                            <input type="text" placeholder="Masukkan NIK" class="form-control bg-white" id="nik" name="nik" autocomplete="no" onkeyup="countChars(this)" minlength="16" maxlength="16">
                        </div>
                        <div class="footer-form">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4" style="font-size: 20px;">Cek Permohonan</button>
                            </div>
                        </div>
                    </form>
                    @if (session('data'))
                    <div class="alert alert-info alert-dismissible show fade mt-4">
                        <div class="alert-body">
                            <strong class="row">Status Permohonan Anda</strong>
                            <span class="row">NIK : {{session('data')->nik}} </span>
                            <span class="row">Status : {{session('data')->status}} </span>
                            <span class="row">Diajukan pada: {{session('data')->created_at}} </span>
                            <span class="row">Diubah pada: {{session('data')->updated_at}} </span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade mt-4">
                        <div class="alert-body">
                            <strong class="row">Permohonan Tidak Ditemukan</strong>
                            <span class="row">{{session('label')}}: {{session('error')}}</span>
                            <span class="row">Data tidak ditemukan</span>
                            <span class="row">Silakan masukan data dengan benar</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid image-bottom p-0">
        <img src="assets/img/backgroundbawah.png" style="width: 100%; height: auto;" alt="">
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        $('input[name="nik"]').bind('keypress', function(e) {
            var keyCode = (e.which) ? e.which : event.keyCode
            return !(keyCode > 31 && (keyCode < 48 || keyCode > 57));
        });
    });

    $(document).on('keyup', '#nik', function() {
        var maxLength = 16;
        var strLength = this.value.length;
        if (this.value == '') {} else if (!(/\D/.test(this.value)) && strLength < maxLength) {
            $('.nik').html('<span class="text-dark">NIK</span> <i style="color:red;">*</i> <span class="text-danger"> [' + strLength + '/' + maxLength + '] ❌</span>')
        } else if (!(/\D/.test(this.value)) && strLength == maxLength) {
            $('.nik').html('<span class="text-success">NIK</span> <i style="color:red;">*</i> <span class="text-success"> [' + strLength + '/' + maxLength + '] ✅</span>')
        }
    })
</script>

<script>
    $(document).ready(function() {
        $("input[name='type']").change(function() {
            var radioValue = this.value;
            switch (radioValue) {
                case "NIK":
                    $("#element_nik").show();
                    $("#element_kp").hide();
                    break;
                case "KP":
                    $("#element_nik").hide();
                    $("#element_kp").show();
                    break;
                default:
                    break;
            }
        });
    });
</script>
@endsection