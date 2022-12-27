@extends('layouts.master')
@section('content')
<!--Form-->
<section class="page-section pb-0 p-0">
    <div class="container-fluid" style="background-image:url('assets/img/kraton-2.png');background-size:cover; padding-top:5%;">
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
        <div class="form-zakat shadow border border-white bg-white p-5">
            <div class="col mb-5">
                <div class="heading-form">
                    <p class="text-form">
                        BAYAR ZAKAT <button data-bs-toggle="modal" data-bs-target="#help" class="btn btn-secondary btn-circle rounded-circle"><i class="bi bi-question-lg"></i></button>
                        <hr id="hr-form">
                    </p>
                </div>
                <div class="text-dark" style="text-align: left;font-size: clamp(14px, 3vw, 18px);">
                    Bersihkan diri dengan membayar zakat bersama BAZNAS Surakarta melalui media online
                </div>
            </div>

            <form action="{{ url('bayar-zakat') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading-form">
                            <p class="text-form">
                                Lengkapi Data Diri
                            </p>
                        </div>
                        <div class="form-group mt-4">
                            <label for="nama" class="form-label">Nama Lengkap <i style="color:red;">*</i></label>
                            <input type="text" placeholder="Masukkan nama lengkap" class="form-control bg-white" id="name" name="name" autocomplete="no">
                        </div>
                        <div class="form-group mt-4">
                            <label for="nik" class="form-label" id="nik">NIK <i style="color:red;">*</i></label>
                            <input type="text" placeholder="Masukkan NIK lengkap" class="form-control bg-white" id="nik" name="nik" autocomplete="no" onkeyup="countChars(this)" maxlength="16" minlength="16">
                        </div>
                        <div class="form-group mt-4 row">
                            <label for="jenis-kelamin" class="form-label">Jenis Kelamin <i style="color:red;">*</i></label>
                            <div class="form-check col ms-3 col-auto">
                                <input type="radio" class="form-check-input bg-white" id="male" value="LAKI_LAKI" name="gender" autocomplete="no">
                                <label for="male" class="text-black">Laki-laki</label>
                            </div>
                            <div class="form-check col ms-3 col-auto">
                                <input type="radio" class="form-check-input bg-white" id="female" value="PEREMPUAN" name="gender" autocomplete="no">
                                <label for="female" class="text-black">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="telp" class="form-label">Nomor Telepon <i style="color:red;">*</i></label>
                            <input type="number" placeholder="Masukkan nomor WA" class="form-control bg-white" id="telp" name="phone" autocomplete="no">
                        </div>
                        <div class="form-group mt-4">
                            <label for="email" class="form-label">Email <i style="color:red;">*</i></label>
                            <input type="email" placeholder="Masukkan alamat email" class="form-control bg-white" id="email" name="email" autocomplete="no">
                        </div>
                        <div class="form-group mt-4">
                            <label for="alamat">Alamat <i style="color:red;">*</i></label>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="province" id="province_id" value="{{ $default_region['province'] }}">
                                    <input type="hidden" name="district" id="district_id" value="{{ $default_region['district'] }}">
                                    <select class="form-control form-select bg-white" name="regency" id="select-regency">
                                        <option class="form-option" value="" disabled selected>Pilih Kecamatan</option>
                                        @foreach ($regencies as $regency)

                                        <option class="form-option" value="{{ $regency->id }}">{{ $regency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control form-select bg-white" name="village" id="select-village">
                                        <option class="form-option" value="" disabled selected>Pilih Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="heading-form">
                            <p class="text-form">
                                Mulai Bayar Zakat
                            </p>
                        </div>
                        <div class="form-group mt-4">
                            <label for="select-zakat" class="form-label">Jenis Bayar<i style="color:red;">*</i></label>
                            <select class="form-control form-select bg-white" name="type" id="select-zakat">
                                <option value="MAAL">Maal</option>
                                <option value="INFAQ">Infaq</option>
                                <option disabled value="FIDYAH" class="text-muted">Fidyah</option>
                                <option disabled value="FITRAH" class="text-muted">Fitrah</option>
                                <option disabled value="QURBAN" class="text-muted">Qurban</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="nominal-zakat" class="form-label">Nominal<i style="color:red;">*</i></label>
                            <input type="text" min="1" placeholder="Masukan nominal" class="form-control bg-white" id="nominalzakat" name="amount" autocomplete="no">
                        </div>
                        <div class="form-check mt-2">
                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                *Minimal Rp 10.000
                            </label>
                        </div>
                        <div class="form-group mt-4">
                            <label for="bukti-pembayaran" class="form-label">Bukti Pembayaran <i style="color:red;">*</i></label>
                            <input type="file" class="form-control bg-white" name="proof_of_payment" id="bukti-pembayaran" autocomplete="no" style="height: auto;">
                        </div>
                        <h5 class="mt-2">Keterangan:</h5>
                        <p class="py-0 my-0">( <i style="color:red;">*</i> ) : Wajib diisi</p>
                        <div class="footer-form" style="margin-top: 5%;">
                            <div class="text-center">
                                <p class="text-form">
                                    Niat Melakukan Zakat
                                </p>
                                <div class="niat-arab" style="font-size: 30px">
                                    نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ فَرْضًا لِلَّهِ تَعَالَى
                                </div>
                                <div class="niat-latin">
                                    Nawaitu an Ukhrija Zakaata Fardhon Lillaahi Ta’aala
                                </div>
                                <br>
                                <div class="niat-arti">
                                    “Saya berniat sengaja mengeluarkan zakat fardhu karena Allah Ta’ala”
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="bayar" class="btn btn-success mt-4" style="font-size: 20px;">Bayar Zakat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid image-bottom p-0">
        <img src="assets/img/backgroundbawah.png" style="width: 100%; height: auto;" alt="">
    </div>
</section>
<!-- Modal -->
<div class="modal fade " id="help" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alur Proses Pembayaran Zakat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Melakukan pembayaran zakat/infaq melalui rekening Baznas
                    </li>
                    <table class="table table-hover">
                        <thead>
                            <th>Rekening</th>
                            <th>Zakat</th>
                            <th>Infaq</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bank Jateng</td>
                                <td>5023036655 <button class="btn" type="button" onclick="handleClick('5023036655')"><i class="fas fa-copy"></i></button></td>
                                <td>5023038899 <button class="btn" type="button" onclick="handleClick('5023038899')"><i class="fas fa-copy"></i></button></td>
                            </tr>
                            <tr>
                                <td>BSI</td>
                                <td>1581581587 <button class="btn" type="button" onclick="handleClick('1581581587')"><i class="fas fa-copy"></i></button></td>
                                <td>1601601601 <button class="btn" type="button" onclick="handleClick('1601601601')"><i class="fas fa-copy"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <li>Mengisi Form Pembayaran</li>
                    <li>Petugas memvalidasi Form</li>
                    <li>Pembayar mendapat notifikasi Status Pembayaran di Nomor WhatsApp yang telah dimasukkan dalam Form Pembayaran</li>
                    <li>Apabila pembayaran berhasil divalidasi pembayar akan mendapatkan bukti Nota Pembayaran yang dapat di unduh di laman Web</li>
                </ol>
                <div class="alert alert-info my-2" role="alert" id="alert" style="display: none;">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    // Pilih Kecamatan
    $(document).on('change', '#select-regency', function() {
        let regency_id = $(this).val();
        let district_id = $('#district_id').val();
        let province_id = $('#province_id').val();

        // ! Remove Html Below
        $('#select-village').html('<option value="" disabled selected>Pilih Kelurahan</option>')
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get-village",
                method: 'POST',
                data: {
                    regency_id: regency_id,
                    district_id: district_id,
                    province_id: province_id
                },
                success: function(response) {
                    let districs = response;
                    let option = ['<option value="" disabled selected>Pilih Kelurahan</option>']
                    districs.forEach(element => {
                        option.push('<option value=' + element['id'] + '>' + element['name'] + '</option>')
                    });
                    $('#select-village').html(option)

                }
            })
        });
    })
</script>

<!-- Niat Zakat -->
<script type="text/javascript">
    let niat = {
        "fitrah": {
            'arab': 'ﻧَﻮَﻳْﺖُ أَﻥْ أُﺧْﺮِﺝَ ﺯَﻛَﺎﺓَ ﺍﻟْﻔِﻄْﺮِ ﻋَﻦْ ﻧَﻔْسيْ ﻓَﺮْﺿًﺎ ِﻟﻠﻪِ ﺗَﻌَﺎﻟَﻰ',
            'latin': 'Nawaytu an ukhrija zakaata al-fitri ‘an nafsi fardhan lillahi ta’ala',
            'arti': 'Aku niat mengeluarkan zakat fitrah untuk diriku sendiri fardhu karena Allah ta’ala',
            'label': 'Zakat Fitrah'
        },
        "maal": {
            'arab': 'نَوَيْتُ أَنْ أُخْرِجَ زَكاَةَ اْللَالِ عَنْ نَفْسِيْ فَرْضًالِلهِ تَعَالَى',
            'latin': 'Nawaitu an ukhrija zakatadz dzahabi/zakatal fidhdhati/zakatal mali’an nafsi fardhan lillahi ta’ala',
            'arti': 'Aku niat mengeluarkan zakat berupa harta dari diri sendiri karena Allah ta’ala',
            'label': 'Zakat Maal'
        },
        "fidyah": {
            'arab': 'نَوَيْتُ أَنْ أُخْرِجَ هَذِهِ الْفِدْيَةَ لإِفْطَارِ صَوْمِ رَمَضَانَ فَرْضًا لِلهِ تَعَالَى',
            'latin': 'Nawaitu an ukhrija hadzihil fidyata liifthari shaumi ramadhana fardhan lillahi ta’ala',
            'arti': 'Aku niat mengeluarkan fidyah ini karena berbuka puasa di bulan Ramadhan, fardu karena Allah ta’ala',
            'label': 'Fidyah'
        },
        "infaq": {
            'arab': 'بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم',
            'latin': 'Bismillahirrahmanirrahim',
            'arti': 'Dengan menyebut nama Allah Yang Maha Pengasih lagi Maha Penyayang',
            'label': 'Infaq'
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
                $("p:contains('Mulai Bayar')").html('Mulai Bayar ' + niat.fitrah.label)
                $("p:contains('Niat Melakukan')").html('Niat Melakukan ' + niat.fitrah.label)
                $("#bayar").html('Bayar ' + niat.fitrah.label)
                break;
            case "Infaq":
                $("p:contains('Mulai Bayar')").html('Mulai Bayar ' + niat.infaq.label)
                $("p:contains('Niat Melakukan')").html('Niat Melakukan ' + niat.infaq.label)
                $("#bayar").html('Bayar ' + niat.infaq.label)
                break;
            case "Maal":
                arab = niat.maal.arab
                latin = niat.maal.latin
                arti = niat.maal.arti
                $("p:contains('Mulai Bayar')").html('Mulai Bayar ' + niat.maal.label)
                $("p:contains('Niat Melakukan')").html('Niat Melakukan ' + niat.maal.label)
                $("#bayar").html('Bayar ' + niat.maal.label)
                break;
            case "Fidyah":
                arab = niat.fidyah.arab
                latin = niat.fidyah.latin
                arti = niat.fidyah.arti
                $("p:contains('Mulai Bayar Infaq')").html('Mulai Bayar ' + niat.fidyah.label)
                $("p:contains('Niat Melakukan Infaq')").html('Niat Melakukan ' + niat.fidyah.label)
                $("#bayar").html('Bayar ' + niat.fidyah.label)
                break;
            case "Qurban":
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