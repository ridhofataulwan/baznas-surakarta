@extends('layouts/master')
@section('content')
<!--Content-->
<section class="" id="about">
    <div class="container px-4 px-lg-5" style="margin-top: 10%; margin-bottom: 5%;">
        <div class="row">
            <div class="col-md-3" style="padding-right: 3%;">
                <table class="table mr-5" style="margin-top: 50%;">
                    <thead>
                        <tr>
                            <th scope="col"><b>Catatan</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 14px;">
                                Salin nomor rekening sesuai jenis dana (zakat, infak/sedekah, program tematik atau kurban).
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px;">
                                Transfer dari ATM, M-banking, i-banking, SMS-banking, dan atau teller bank.
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px;">
                                Simpan bukti transfer,kemudian konfirmasi melalui form di <a href="https://wa.me/6281393055550">Sini</a> atau klik <a href="https://wa.me/6281393055550">0813-9305-5550</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9">
                <center>
                    <h3 style="color: #01502D;">REKENING INFAK</h3>
                    <h6>(a.n. Baznas Kota Surakarta)</h6>
                </center>
                <div class="dropdown mb-3 mt-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Jenis Rekening
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/rekening-zakat">Zakat</a></li>
                        <li><a class="dropdown-item" href="/rekening-infak">Infaq</a></li>
                        <li><a class="dropdown-item" href="/rekening-sedekah">Sedekah</a></li>
                        <li><a class="dropdown-item" href="/rekening-fidyah.html">Fidyah</a></li>
                    </ul>
                </div>
                <div class="header-table" style="width: 100%; height: auto; padding: 7px; background-color: #FF9900;">
                    <center>
                        <h4 class="text-white"><b>Daftar Rekening</b></h4>
                    </center>
                </div>
                <div class="table-content border-top border-dark mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">BANK</th>
                                <th scope="col">NOMOR REKENING</th>
                                <th scope="col">
                                    <center>SALIN</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rek as $key => $r)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td><img src="{{ $r->image }}" width="135px" height="45px" alt=""></td>
                                <td><input type="text" id="myText" class="form-control bg-transparent border-0" readonly value="{{ $r->no_rek }}"></td>
                                <td>
                                    <center><a href="" onclick="handleClick()"><i class="fas fa-copy"></i></a></center>
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
<script>
    function handleClick() {
        /* Save value of myText to input variable */
        var input = document.getElementById("myText").value;
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(input);
    }
</script>
@endsection