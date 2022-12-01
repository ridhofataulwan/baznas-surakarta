@extends('layouts.master')
@section('content')
<!--Form-->
<section class="page-section pb-0 p-0" id="about">
    <div class="container-fluid"
        style="background-image:url('assets/img/pasar-gede.png');background-size:cover; padding-top:5%;">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ $error }}
            </div>
        </div>
        @endforeach
        @endif
        @if (session('status'))
        <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
        </div>
        @endif
        <div class="row row-zakat">
            <div class="col-md-5" id='hide-content'>
                <div class="right-content mt-5"
                    style="padding-left: 10%; padding-right: 10%; width: 100%; height: auto; position: relative; transform: translateY(8%);">
                    <h3 class="latin text-white"
                        style="text-align: left; font-size: clamp(20px, 3vw, 36px); font-weight: 700; margin-top:5em;">
                        Masukkan Kode atau NIK untuk Cek Status
                    </h3>
                    <div style="text-align: left; font-size: clamp(10px, 3vw, 15px);" class="latin text-white">
                        Badan Amil Zakat kota Surakarta
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-5">
                <div class="form-zakat shadow border border-white bg-white">
                    <div class="heading-form">
                        <p class="text-form">
                            Cek Permohonan Bantuan
                        </p>
                        <hr id="hr-form">
                    </div>
                    <form action="{{ url('bayar-zakat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="" class="form-label">Kode Permohonan</label>
                            <input type="number" placeholder="Masukkan Kode" class="form-control bg-white" id=""
                                name="nik" autocomplete="no">
                        </div>
                        <div class="form-group mt-4">
                            <label for="" class="form-label">NIK</label>
                            <input type="number" placeholder="Masukkan NIK" class="form-control bg-white" id=""
                                name="nik" autocomplete="no">
                        </div>
                        <div class="footer-form" style="margin-top: 10%;">
                            <div class="text-center">
                                <button type="submit" id="testzakat" class="btn btn-success mt-4"
                                    style="font-size: 20px;">Cek Permohonan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid image-bottom p-0">
        <img src="assets/img/backgroundbawah.png" style="width: 100%; height: auto;" alt="">
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center"
                style="background-color: #D9D9D9; border: 1px; border-color: black; border-style: solid;">
                <h5 class="modal-title" id="exampleModalLabel">SCAN QRIS</h5>
            </div>
            <div class="modal-body" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3"
                style="background-color: #fff; border: 1px; border-color: black; border-style: solid;">
                QRIS Doku
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                <img src="assets/img/portfolio/logo/iconqris.png" style="width: 25%;">
            </div>
            <div class="modal-header justify-content-center"
                style="background-color: #D9D9D9; border: 1px; border-color: black; border-style: solid;">
                <h5 class="modal-title" id="exampleModalLabel">Transfer Bank</h5>
            </div>
            <div class="modal-body justify-content-center"
                style="border: 1px; border-color: black; border-style: solid;">
                <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal2">Bank Jateng</a>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <img src="assets/img/portfolio/logo/iconbankjateng.png" style="width: 25%;">
            </div>
            <div class="modal-body justify-content-center"
                style="border: 1px; border-color: black; border-style: solid;">
                Bank BSI
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                <img src="assets/img/portfolio/logo/iconbankbsi.png" style="width: 25%;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #01502D; height: 150px;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white; margin-bottom: 20%;">BAZNAS
                    BAZIS Kota Surakarta</h5>
            </div>
            <div class="modal-body">
                <div class="card col-sm-10"
                    style="border-radius: 15px; position: absolute; transform: translate(7%, -65%);">
                    <div class="card-header" style="color: #fff;">
                        <div class="row">
                            <div class="col-3">
                                <div style="color: black; font-size: small;">Total Bayar</div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-3">
                                <h6 style="color: black; font-size: small;">Bayar dalam <b
                                        style="color: #1400FF;">23.45.50</b></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2><b>Rp 500.000</b></h2>
                        <p style="color: #656565;">ORDER ID #8723468723487623</p>
                    </div>

                </div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div style="color: black; font-size: large;"><b>QRIS Doku</b></div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5"><img src="assets/img/portfolio/logo/iconqris.png"
                                style="width: 80%; transform: translate(30%, -40%);"></b></h6>
                        </div>
                    </div>
                    <div class="col-12">
                        <div style="color: black;"><img src="assets/img/qris.png"
                                style="width: 50%; transform: translate(50%, 0%);"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"
                    style="background-color: #FF9900; border-color: #FF9900; transform: translate(-55%);"
                    data-bs-toggle="modal" data-bs-target="#exampleModal4">SAYA SUDAH MEMBAYAR</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #01502D; height: 150px;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white; margin-bottom: 20%;">BAZNAS
                    BAZIS Kota Surakarta</h5>
            </div>
            <div class="modal-body">
                <div class="card col-sm-10"
                    style="border-radius: 15px; position: absolute; transform: translate(7%, -65%);">
                    <div class="card-header" style="color: #fff;">
                        <div class="row">
                            <div class="col-3">
                                <div style="color: black; font-size: small;">Total Bayar</div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-3">
                                <h6 style="color: black; font-size: small;">Bayar dalam <b
                                        style="color: #1400FF;">23.45.50</b></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2><b>Rp 500.000</b></h2>
                        <p style="color: #656565;">ORDER ID #8723468723487623</p>
                    </div>

                </div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div>&emsp;</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div style="color: black; font-size: large;"><b>Bank Jateng</b></div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5"><img src="assets/img/portfolio/logo/iconbankjateng.png"
                                style="width: 80%; transform: translate(30%, -40%);"></b></h6>
                        </div>
                    </div>
                    <div class="col-12">
                        <div style="color: black; font-size: small;">Selesaikan pembayaram dari Bank Jateng ke nomor
                            rekening
                            di bawah ini.</div>
                    </div>
                    <div>&emsp;</div>
                    <div>&nbsp;</div>
                    <div class="row">
                        <div class="col-5">
                            <div style="color: black; font-size: medium;">Nomor Rekening</div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <div style="color: black; font-size: medium; width: 80%; transform: translate(70%, -60%);">
                                <p><b>5023038899</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"
                    style="background-color: #FF9900; border-color: #FF9900; transform: translate(-55%);"
                    data-bs-toggle="modal" data-bs-target="#exampleModal4">SAYA SUDAH MEMBAYAR</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #F0F0F0;">
            <div class="modal-body">
                <div>&nbsp;</div>
                <h5 style="font-size: medium; transform: translate(10%, -3%);">Mohon tunggu, Pembayaran anda sedang
                    tertunda</h5>
                <hr class="justify-content-center" id="hr-form1" style="transform: translate(10%, -65%);">
                <div>&nbsp;</div>
                <h5 style="font-size: medium; transform: translate(40%, -3%);">Nama Lengkap</h5>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <h5 style="font-size: medium; transform: translate(40%, -3%);">Nomor Telefon</h5>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <h5 style="font-size: medium; transform: translate(47%, -3%);">Email</h5>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <h5 style="font-size: medium; transform: translate(47%, -3%);">Total</h5>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <h5 style="font-size: medium; transform: translate(35%, -3%);">Metode Pembayaran</h5>



            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center"
                style="background-color: #D9D9D9; border: 1px; border-color: black; border-style: solid;">
                <h5 class="modal-title" id="exampleModalLabel">SCAN QRIS</h5>
            </div>
            <div class="modal-body"
                style="background-color: #fff; border: 1px; border-color: black; border-style: solid;">
                QRIS Doku
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                <img src="assets/img/portfolio/logo/iconqris.png" style="width: 25%;">
            </div>
            <div class="modal-header justify-content-center"
                style="background-color: #D9D9D9; border: 1px; border-color: black; border-style: solid;">
                <h5 class="modal-title" id="exampleModalLabel">Transfer Bank</h5>
            </div>
            <div class="modal-body justify-content-center text-dark"
                style="border: 1px; border-color: black; border-style: solid;">
                Bank Jateng
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <img src="assets/img/portfolio/logo/iconbankjateng.png" style="width: 25%;">
            </div>
            <div class="modal-body justify-content-center"
                style="border: 1px; border-color: black; border-style: solid;">
                Bank BSI
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                <img src="assets/img/portfolio/logo/iconbankbsi.png" style="width: 25%;">
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).on('keyup', '#nominalzakat', function() {
    rupiah = $('#nominalzakat').val();
    $('#nominalzakat').val(formatRupiah(rupiah, 'Rp. '));
});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>

<script>
let kec = [
    "Pasar Kliwon",
    "Jebres",
    "Banjarsari",
    "Laweyan",
    "Serengan",
]
let kelurahan = [
    ['Banyuanyar', 'Banjarsari', 'Gilingan', 'Joglo', 'Kadipiro', 'Keprabon', 'Kestalan', 'Ketelan', 'Manahan',
        'Mangkubumen', 'Nusukan', 'Punggawan', 'Setabelan', 'Sumber', 'Timuran'
    ],
    ['Gandekan', 'Jagalan', 'Jebres', 'Kepatihan Kulon', 'Kepatihan Wetan', 'Mojosongo', 'Pucang Sawit',
        'Purwodiningratan', 'Sewu', 'Sudiroprajan', 'Tegalharjo'
    ],
    ['Bumi', 'Jajar', 'Karangasem', 'Kerten', 'Laweyan', 'Pajang', 'Panularan', 'Penumping', 'Purwosari',
        'Sondakan', 'Sriwedari'
    ],
    ['Baluwarti', 'Gajahan', 'Joyosuran', 'Kampung Baru', 'Kauman', 'Kedung Lumbu', 'Mojo', 'Pasar Kliwon',
        'Sangkrah', 'Semanggi'
    ],
    ['Danukusuman', 'Jayengan', 'Joyotakan', 'Kemlayan', 'Kratonan', 'Serengan', 'Tipes']
]
</script>

<script>
for (i = 0; i < kec.length; i++) {
    $('#kecamatan').append('<option value="' + kec[i] + '">' + kec[i] + '</option>');
}

function pilihKec(value) {
    index = kec.indexOf(value)
    $("#kelurahan option").remove();
    for (i = 0; i < kelurahan[index].length; i++) {
        $('#kelurahan').append('<option value="' + kelurahan[index][i] + '">' + kelurahan[index][i] + '</option>');
        console.log(kelurahan[index][i])
    }
}
</script>

<!-- Niat Zakat -->
<script type="text/javascript">
let niat = {
    "fitrah": {
        'arab': 'ﻧَﻮَﻳْﺖُ أَﻥْ أُﺧْﺮِﺝَ ﺯَﻛَﺎﺓَ ﺍﻟْﻔِﻄْﺮِ ﻋَﻦْ ﻧَﻔْسيْ ﻓَﺮْﺿًﺎ ِﻟﻠﻪِ ﺗَﻌَﺎﻟَﻰ',
        'latin': 'Nawaytu an ukhrija zakaata al-fitri ‘an nafsi fardhan lillahi ta’ala',
        'arti': 'Aku niat mengeluarkan zakat fitrah untuk diriku sendiri fardhu karena Allah ta’ala'
    },
    "maal": {
        'arab': 'نَوَيْتُ أَنْ أُخْرِجَ زَكاَةَ اْللَالِ عَنْ نَفْسِيْ فَرْضًالِلهِ تَعَالَى',
        'latin': 'Nawaitu an ukhrija zakatadz dzahabi/zakatal fidhdhati/zakatal mali’an nafsi fardhan lillahi ta’ala',
        'arti': 'Aku niat mengeluarkan zakat berupa harta dari diri sendiri karena Allah ta’ala'
    },
    "fidyah": {
        'arab': 'نَوَيْتُ أَنْ أُخْرِجَ هَذِهِ الْفِدْيَةَ لإِفْطَارِ صَوْمِ رَمَضَانَ فَرْضًا لِلهِ تَعَالَى',
        'latin': 'Nawaitu an ukhrija hadzihil fidyata liifthari shaumi ramadhana fardhan lillahi ta’ala',
        'arti': 'Aku niat mengeluarkan fidyah ini karena berbuka puasa di bulan Ramadhan, fardu karena Allah ta’ala'
    },
}

$("#select-zakat").change(function() {
    let arab = "بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم"
    let latin = 'Bismillahirrahmanirrahim'
    let arti = 'Dengan menyebut nama Allah Yang Maha Pengasih lagi Maha Penyayang'
    let selectZakat = $(this).val()
    switch (selectZakat) {
        case "Fitrah":
            arab = niat.fitrah.arab
            latin = niat.fitrah.latin
            arti = niat.fitrah.arti
            break;
        case "Maal":
            arab = niat.maal.arab
            latin = niat.maal.latin
            arti = niat.maal.arti
            break;
        case "Fidyah":
            arab = niat.fidyah.arab
            latin = niat.fidyah.latin
            arti = niat.fidyah.arti
            break;
        case "Qurban":
            // arab = niat.qurban
            break;
        default:
            break;
    }
    $(".niat-arab").html(arab)
    $(".niat-latin").html(latin)
    $(".niat-arti").html(arti)

})
</script>
@endsection