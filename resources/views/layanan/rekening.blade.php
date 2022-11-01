@extends('layouts/master')
<style>
    @media(max-width: 920px) {
        .row .table-responsive.catatan {
            margin-top: 50px;
        }

        .container.px-4.px-lg-5 {
            margin-top: 100px;
        }
    }

    @media(min-width:921px) {
        .container.px-4.px-lg-5 {
            margin-top: 150px;
            margin-bottom: 5%;
        }
    }
</style>
@section('content')
<!--Content-->
<section class="" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row">
            <div class="col-md-3 col-12 table-responsive catatan" style="padding-right: 3%;">
                <table class="table mr-5">
                    <thead>
                        <tr>
                            <th scope="col"><b>Catatan</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 14px;">
                                Salin nomor rekening sesuai jenis dana (zakat, infak/sedekah, program tematik atau
                                kurban).
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px;">
                                Transfer dari ATM, M-banking, i-banking, SMS-banking, dan atau teller bank.
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px;">
                                Simpan bukti transfer,kemudian konfirmasi melalui kontak kami di <a href="https://wa.me/081393055550"><button class="btn btn-primary">Sini</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9 col-12">
                <center>
                    <h3 style="color: #01502D;">REKENING BAZNAS</h3>
                    <h6>(a.n. Baznas Kota Surakarta)</h6>
                </center>
                <div class="dropdown mb-3 mt-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Jenis Rekening
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" data-jenis="zakat" href="#" id="rek">Zakat</a></li>
                        <li><a class="dropdown-item" data-jenis="infaq" href="#" id="rek">Infaq</a></li>
                        <!-- <li><a class="dropdown-item" data-jenis="sedekah" href="#" id="rek">Sedekah</a></li> -->
                        <!-- <li><a class="dropdown-item" data-jenis="fidyah" href="#" id="rek">Fidyah</a></li> -->
                    </ul>
                </div>
                <div class="header-table" style="width: 100%; height: auto; padding: 7px; background-color: #FF9900;">
                    <h4 class="text-white text-bold text-center" id="title">Daftar Rekening Zakat</h4>
                </div>
                <div class="alert alert-info my-2" role="alert" id="alert" style="display: none;">
                </div>
                <div class="table-responsive table-content border-top border-dark mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Bank</th>
                                <th scope="col">Nomor Rekening</th>
                                <th scope="col">
                                    <center>Salin</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="listrek">
                            @foreach ($rek as $key => $r)
                            <tr class="align-middle">
                                <th scope="row">{{ $key+1 }}</th>
                                <td><img src="{{ $r->image }}" height="150px" alt=""></td>
                                <td><input type="text" id="myText" class="form-control bg-transparent border-0" readonly value="{{ $r->no_rek }}"></td>
                                <td>
                                    <button class="btn" type="button" onclick="handleClick('{{$r->no_rek}}')"><i class="fas fa-copy"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection