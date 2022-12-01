<!DOCTYPE html>
<html lang="en">
<?php
header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Baznas Surakarta</title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{asset('assets/img/portfolio/logo/logo3.png')}}" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <!--Pihak Ke 3-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--Icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }
    </script>
    <link href="{{ asset('css/basnaz.css') }}" rel="stylesheet">
    <!--Chart-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white" id="mainNav"
        style="color: white; border-bottom: #01502D; border-style: solid;">
        <div class="container">
            <a class="navbar-brand" href="#"><img style="width: 50%;"
                    src="{{ asset('assets/img/portfolio/logo/logo3.png') }}" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav my-2 col-lg-12">
                    <li class="nav-item"><a class="nav-link text-dark" href="/">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarOrganisasi"
                            data-bs-toggle="dropdown" aria-expanded="false">Tentang Kami</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarOrganisasi" id="subOrganisasi">
                            <li><a class="dropdown-item" href="/legalitas">Legalitas</a></li>
                            <li><a class="dropdown-item" href="/visi-misi">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="/organisasi">Latar Belakang</a></li>
                            <li><a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="/sejarah-organisasi">Sejarah</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" id="navbarDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">Program</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('program-kemanusiaan') }}">Kemanusiaan</a></li>
                            <li><a class="dropdown-item" href="{{ url('program-pendidikan') }}">Pendidikan</a></li>
                            <li><a class="dropdown-item" href="{{ url('program-kesehatan') }}">Kesehatan</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('program-advokasi-dakwah') }}">Advokasi &
                                    Dakwah</a></li>
                            <li><a class="dropdown-item" href="{{ url('program-ekonomi-produktif') }}">Ekonomi
                                    Produktif</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" id="navbarLayanan"
                            data-bs-toggle="dropdown" aria-expanded="false">Layanan</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarLayanan">
                            <li><a class="dropdown-item" href="/rekening">Rekening Zakat</a></li>
                            <li><a class="dropdown-item" href="/layanan-pembayaran">Layanan Pembayaran</a></li>
                            <li><a class="dropdown-item" href="/permohonan-bantuan">Permohonan Bantuan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" id="navbarKabar"
                            data-bs-toggle="dropdown" aria-expanded="false">Kabar</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarKabar">
                            <x-navbar.navbarcategorypost />
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link text-dark" href="/hubungi-kami">Hubungi</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="/bayarzakat"><button
                                class=" btn btn-primary" style="border-radius: 10px; width:9em">
                                <i class="fas fa-wallet"></i> Bayar Zakat</button>
                        </a></li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" id="navbarKabar"
                            data-bs-toggle="dropdown" aria-expanded="false">Pilih Bahasa</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarKabar">
                            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/img/ina.png') }}"
                                        class="border-0 border-circle"
                                        style="max-width: 20px; max-height: 20px; margin-right: 4%; margin-bottom: 2%;"
                                        alt="">ID</a></li>
                            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/img/arab.png') }}"
                                        class="border-0 border-circle"
                                        style="max-width: 20px; max-height: 20px; margin-right: 4%; margin-bottom: 2%;"
                                        alt="">Arab</a></li>
                            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/img/en.png') }}"
                                        class="border-0 border-circle"
                                        style="max-width: 20px; max-height: 20px; margin-right: 4%; margin-bottom: 2%;"
                                        alt="">EN</a></li>
                            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/img/chin.png') }}"
                                        class="border-0 border-circle"
                                        style="max-width: 20px; max-height: 20px; margin-right: 4%; margin-bottom: 2%;"
                                        alt="">CHI</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <!--Content-->

    <a href="https://api.whatsapp.com/send?phone=6281393055550&text=Assalamu'alaikum." class="floating-container"
        target="_blank">
        <i class="fa fa-whatsapp my-float floating-button"></i>
    </a>
    <style>
    .my-float {
        margin-top: 16px;
    }
    </style>
    <style>
    @-webkit-keyframes come-in {
        0% {
            -webkit-transform: translatey(100px);
            transform: translatey(100px);
            opacity: 0;
        }

        30% {
            -webkit-transform: translateX(-50px) scale(0.4);
            transform: translateX(-50px) scale(0.4);
        }

        70% {
            -webkit-transform: translateX(0px) scale(1.2);
            transform: translateX(0px) scale(1.2);
        }

        100% {
            -webkit-transform: translatey(0px) scale(1);
            transform: translatey(0px) scale(1);
            opacity: 1;
        }
    }

    @keyframes come-in {
        0% {
            -webkit-transform: translatey(100px);
            transform: translatey(100px);
            opacity: 0;
        }

        30% {
            -webkit-transform: translateX(-50px) scale(0.4);
            transform: translateX(-50px) scale(0.4);
        }

        70% {
            -webkit-transform: translateX(0px) scale(1.2);
            transform: translateX(0px) scale(1.2);
        }

        100% {
            -webkit-transform: translatey(0px) scale(1);
            transform: translatey(0px) scale(1);
            opacity: 1;
        }
    }

    .floating-container {
        position: fixed;
        width: 100px;
        height: 100px;
        bottom: 0;
        right: 0;
        margin: 35px 25px;
    }

    .floating-container:hover {
        height: 300px;
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0);
    }

    .floating-container:hover .floating-button {
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0);
        -webkit-transform: translatey(5px);
        transform: translatey(5px);
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }

    .floating-container .floating-button {
        position: absolute;
        width: 65px;
        height: 65px;
        background: #25D366;
        bottom: 0;
        border-radius: 50%;
        left: 0;
        right: 0;
        margin: auto;
        color: white;
        line-height: 65px;
        text-align: center;
        font-size: 23px;
        z-index: 100;
        box-shadow: 0 10px 25px -5px rgba(37, 211, 102, 0);
        cursor: pointer;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }
    </style>
    <style>
    a {
        color: white;
        text-decoration: none
    }
    </style>
</body>
<!-- Footer-->
<footer class="footer-clean main-footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-6 col-md-5 item mt-2" style="padding-right: 5%;">
                <ul>
                    <li class="mt-3">
                        <p class="heading-left">Alamat Kantor :</p>
                        <p class="content-left">
                            Jl. Dr. Moewardi, Kel. Penumping, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57141
                        </p>
                    </li>
                    <li class="mt-3">
                        <p class="heading-left">Telepon :</p>
                        <p class="content-left">
                            <a href="https://wa.me/6281393055550" target="_blank">
                                <ion-icon name="logo-whatsapp"></ion-icon>&nbsp 081393055550
                            </a>
                        </p>
                    </li>
                    <li class="mt-3">
                        <p class="heading-left">Email :</p>
                        <p class="content-left">
                            <a href="mailto:baznaskota.surakarta@baznas.go.id" target="_blank">
                                <ion-icon name="mail-outline"></ion-icon>&nbsp baznaskota.surakarta@baznas.go.id
                            </a>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-sm-6 col-md-3 mt-2">
                <ul>
                    <li class="mt-2">
                        <div class="form-check form-check-inline">
                            <input style="background-color: white;" checked
                                class="form-check-input bg-secondary border-0" type="checkbox" id="inlineCheckbox1"
                                value="option1" />
                            <label class="form-check-label" for="inlineCheckbox1">Kebijakan Privasi</label>
                        </div>
                    </li>
                    <li class="mt-2">
                        <div class="form-check form-check-inline">
                            <input style="background-color: white;" checked
                                class="form-check-input bg-secondary border-0" type="checkbox" id="inlineCheckbox2"
                                value="option1" />
                            <label class="form-check-label" for="inlineCheckbox2">Syarat & Ketentuan</label>
                        </div>
                    </li>
                    <li class="mt-2">
                        <div class="form-check form-check-inline">
                            <input style="background-color: white;" checked
                                class="form-check-input bg-secondary border-0" type="checkbox" id="inlineCheckbox3"
                                value="option1" />
                            <label class="form-check-label" for="inlineCheckbox3">FAQ</label>
                        </div>
                    </li>
                </ul>
                <p class="heading-left mt-3">Ikuti Kami :</p>
                <ul>
                    <li class="mt-2">
                        <p class="content-left">
                            <a href="https://www.facebook.com/baznaskotasurakarta" target="_blank">
                                <ion-icon name="logo-facebook"></ion-icon>&nbsp baznaskotasurakarta
                            </a>
                        </p>
                    </li>
                    <li class="mt-2">
                        <p class="content-left">
                            <a href="https://www.instagram.com/baznaskota.surakarta/" target="_blank">
                                <ion-icon name="logo-instagram"></ion-icon>&nbsp baznaskota.surakarta
                            </a>
                        </p>
                    </li>
                    <li class="mt-2">
                        <p class="content-left">
                            <a href="https://twitter.com/BaznaskotaS" target="_blank">
                                <ion-icon name="logo-twitter"></ion-icon>&nbsp @BaznaskotaS
                            </a>
                        </p>
                    </li>
                    <li class="mt-2">
                        <p class="content-left">
                            <a href="https://www.youtube.com/channel/UChgLCY6zG-hdIWVupT9apVg" target="_blank">
                                <ion-icon name="logo-youtube"></ion-icon>&nbsp BAZNAS Kota Surakarta
                            </a>
                        </p>
                    </li>
                </ul>

            </div>
            <div class="col-md-4 mt-2 pb-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d988.7787552347216!2d110.8058122!3d-7.5624366!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1537a82ba903%3A0x36bd356bb2bc805b!2sBaznas%20Kota%20Surakarta!5e0!3m2!1sid!2sid!4v1666581909904!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="end-copyright container-fluid">
        <center>
            <p class="copyright text-white">
                Copyright © 2022 Baznas Surakarta. All Rights Reserved
            </p>
        </center>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/zakat.js') }}"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script>
var alert = '';

function resetErrors() {
    $('#showErrors').empty();
    alert = '';
}

// Zakat Fitrah
$(document).ready(function() {
    $(document).on('click', '#hitungFitrah', function() {
        var price = $('#priceFitrah').val().replace(/[^0-9]/g, '');
        var weight = 2.5;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/index-fitrah') }}",
            method: 'POST',
            data: {
                price: price,
                weight: weight,
            },
            success: function(response) {
                resetErrors()
                if (response.errors) {
                    for (let i = 0; i < response.errors.length; i++) {
                        alert +=
                            '<div class="alert alert-warning fade show mt-3" role="alert">' +
                            response.errors[i] + '</div>'
                    }
                    $('#showErrors').html(alert);
                    // alert(response.errors);
                } else {
                    $('#resultFitrah').val(response);
                }
            }
        })
    });
});

// Zakat Maal
$(document).ready(function() {
    $(document).on('click', '#hitungMaal', function() {
        var gajiPokok = $('#gajiPokok').val().replace(/[^0-9]/g, '');
        var tunjangan = $('#tunjangan').val().replace(/[^0-9]/g, '');
        var hutang = $('#hutang').val().replace(/[^0-9]/g, '');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/index-maal') }}",
            method: 'POST',
            data: {
                gajiPokok: gajiPokok,
                tunjangan: tunjangan,
                hutang: hutang,
            },
            success: function(response) {
                resetErrors()
                if (response.errors) {
                    for (let i = 0; i < response.errors.length; i++) {
                        alert +=
                            '<div class="alert alert-warning fade show mt-3" role="alert">' +
                            response.errors[i] + '</div>'
                    }
                    $('#showErrors').html(alert);
                    // alert(response.errors);
                } else {
                    $('#resultFitrah').val(response);
                }
            }
        })
    });
});

// Zakat Fidyah
$(document).ready(function() {
    $(document).on('click', '#hitungFidyah', function() {
        var day = $('#day').val()
        var soul = $('#soul').val()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/index-fidyah') }}",
            method: 'POST',
            data: {
                hari: day,
                jiwa: soul,
            },
            success: function(response) {
                resetErrors()
                if (response.errors) {
                    for (let i = 0; i < response.errors.length; i++) {
                        alert +=
                            '<div class="alert alert-warning fade show mt-3" role="alert">' +
                            response.errors[i] + '</div>'
                    }
                    $('#showErrors').html(alert);
                } else {
                    $('#resultFitrah').val(response);
                }
            }
        })
    });
});

// Qurban
$(document).ready(function() {
    $(document).on('click', '#hitungQurban', function() {
        var qurban = $('#qurban').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/index-qurban') }}",
            method: 'POST',
            data: {
                jenisQurban: qurban,
            },
            success: function(response) {
                resetErrors()
                if (response.errors) {
                    for (let i = 0; i < response.errors.length; i++) {
                        alert +=
                            '<div class="alert alert-warning fade show mt-3" role="alert">' +
                            response.errors[i] + '</div>'
                    }
                    $('#showErrors').html(alert);
                } else {
                    $('#resultFitrah').val(response);
                }
            }
        })
    });
});
// Infaq
$(document).ready(function() {
    $(document).on('click', '#hitungInfaq', function() {
        var gaji = $('#gaji').val().replace(/[^0-9]/g, '');
        var tunjangan = $('#tunjangan').val().replace(/[^0-9]/g, '');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/index-infaq') }}",
            method: 'POST',
            data: {
                gaji: gaji,
                tunjangan: tunjangan,
            },
            success: function(response) {
                resetErrors()
                if (response.errors) {
                    for (let i = 0; i < response.errors.length; i++) {
                        alert +=
                            '<div class="alert alert-warning fade show mt-3" role="alert">' +
                            response.errors[i] + '</div>'
                    }
                    $('#showErrors').html(alert);
                } else {
                    $('#resultFitrah').val(response);
                }
            }
        })
    });
});
// Penghasilan
$(document).ready(function() {
    $(document).on('click', '#hitungPenghasilan', function() {
        var gaji = $('#gaji').val().replace(/[^0-9]/g, '');
        var tunjangan = $('#tunjangan').val().replace(/[^0-9]/g, '');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/index-penghasilan') }}",
            method: 'POST',
            data: {
                gaji: gaji,
                tunjangan: tunjangan,
            },
            success: function(response) {
                resetErrors()
                if (response.errors) {
                    for (let i = 0; i < response.errors.length; i++) {
                        alert +=
                            '<div class="alert alert-warning fade show mt-3" role="alert">' +
                            response.errors[i] + '</div>'
                    }
                    $('#showErrors').html(alert);
                } else {
                    if (response['status'] == true) {
                        if (response['zakat'] != null) {
                            console.log(response)
                            $('#resultFitrah').val(response['zakat']);
                            $('#resultPesan').attr('class', '');
                            $('#resultPesan').html('');
                        }
                    } else {
                        console.log(response)
                        $('#resultPesan').attr('class', 'alert alert-danger');
                        $('#resultFitrah').val(0);
                        $('#resultPesan').attr('style', 'display:true');
                        $('#resultPesan').html(
                            "Anda belum wajib zakat karena belum memenuhi Nishab sebesar Rp. " +
                            response['nishab']);
                    }
                }
            }
        })
    });
});
</script>
@if (!empty($fitrah) && !empty($infaq) && !empty($sedekah) && !empty($fidyah))
<script>
// var xValues = ["Zakat Fitrah", "Infaq", "Sedekah", "Fidyah"];
// var yValues = [{!!$fitrah!!}, {!!$infaq!!}, {!!$sedekah!!}, {!!$fidyah!!}];
// var barColors = ["#01502D", "#FF9900", "#C4C4C4", "#2E3192", "#2E3192"];
var xValues = ["Fakir", "Miskin", "Fisabilillah", "Ibnu Sabil", "Ghorim", "Mu'alaf", "Amil"];
var yValues = [80274000, 1089055450, 341455611, 11926500, 15175000, 96736436, 248925827];
var barColors = ["#E3B505", "#BC6709", "#95190C", "#610345", "#107E7D", "#0a657e", "#044B7F", ];
new Chart("myChart", {
    type: "pie",
    data: {
        labels: xValues,
        datasets: [{
            label: xValues,
            backgroundColor: barColors,
            data: yValues
        }],
    },
    options: {
        maintainAspectRatio: 2,
        responsive: true,
        title: {
            fontSize: 18,
            display: true,
            text: "Laporan Data"
        },
        tooltips: {
            callbacks: {
                label: function(t, d) {
                    var xLabel = d.labels[t.index];
                    var yLabel = d.datasets[t.datasetIndex].data[t.index] >= 1000 ? 'Rp. ' + d.datasets[t
                            .datasetIndex].data[t.index].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") :
                        'Rp. ' + d.datasets[t.datasetIndex].data[t.index];
                    return xLabel + ': ' + yLabel;
                },
            },
        },
    }
})
</script>
<script type="text/javascript">
// Fitrah
$(document).on('keyup', '#priceFitrah', function() {
    console.log("Masuk sini")
    rupiah = $('#priceFitrah').val();
    $('#priceFitrah').val(formatRupiah(rupiah, '.', '.'));
});
// Maal
$(document).on('keyup', '#gajiPokok', function() {
    rupiah = $('#gajiPokok').val();
    $('#gajiPokok').val(formatRupiah(rupiah, '.', '.'));
});
$(document).on('keyup', '#tunjangan', function() {
    rupiah = $('#tunjangan').val();
    $('#tunjangan').val(formatRupiah(rupiah, '.', '.'));
});
$(document).on('keyup', '#hutang', function() {
    rupiah = $('#hutang').val();
    $('#hutang').val(formatRupiah(rupiah, '.', '.'));
});
// Infaq
$(document).on('keyup', '#gaji', function() {
    rupiah = $('#gaji').val();
    $('#gaji').val(formatRupiah(rupiah, '.', '.'));
});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}
</script>
@endif

</html>