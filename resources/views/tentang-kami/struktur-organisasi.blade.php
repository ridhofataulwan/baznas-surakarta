@extends('layouts/master')
@section('content')
<!--Hero Section-->
<header class="masthead" style="height: auto;">
    <div class="container-fluid hero-section" style="width: 100%;height: 350px;">
        <div class="heading">
            STRUKTUR ORGANISASI
            <hr id="hr-hero">
        </div>
    </div>
</header>
<br><br><br>
<!--Crew-->
<section class="page-section" id="about" style="background-color: #01502D; top: auto;">
    <div class="container p-0">
        <img src="assets/img/struktur_kota.jpeg" alt="" style="width: 100%;height: auto;">
    </div>
</section>
<section class="page-sectoin">
    <div class="container mt-3">
        <!-- Ketua -->
        <h1>Pimpinan</h1>
        <div class="row my-3">
            <div class="d-flex justify-content-start">
                <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                    <img class="img-rounded" src="/assets/img/profile/pak-qoyim.png" style="height:15em; border-radius:20px;" alt="">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <div class="p-3 col-md-auto">
                        <h4>Ketua</h4>
                        <hr style="height:2px; background-color:#333;width:50%;">
                    </div>
                    <div class="px-3 col-md-auto">
                        <p>M. Qoyim, S.Sos, M.Si</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wakil Ketua 1 -->
        <div class="row my-3">
            <div class="d-flex justify-content-start">
                <div class="d-flex" style=" width:auto;background-color:#01502D; border-radius:20px;">
                    <div style="background-color: yellow;"></div>
                    <img class="img-rounded" src="/assets/img/profile/pak-bambang.png" style="height:15em; border-radius:20px;" alt="">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <div class="p-3 col-md-auto">
                        <h4>Wakil Ketua I</h4>
                        <hr style="height:2px; background-color:#333;width:50%;">
                    </div>
                    <div class="px-3 col-md-auto">
                        <p>Bambang Mintosih, S.M</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wakil Ketua 2 -->
        <div class="row my-3">
            <div class="d-flex justify-content-start">
                <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                    <img class="img-rounded" src="/assets/img/profile/pak-anwar.png" style="height:15em; border-radius:20px;" alt="">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <div class="p-3 col-md-auto">
                        <h4>Wakil Ketua II</h4>
                        <hr style="height:2px; background-color:#333;width:50%;">
                    </div>
                    <div class="px-3 col-md-auto">
                        <p>M. Anwar, S.Ag</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wakil Ketua 3 -->
        <div class="row my-3">
            <div class="d-flex justify-content-start">
                <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                    <img class="img-rounded" src="/assets/img/profile/pak-almunawar.png" style="height:15em; border-radius:20px;" alt="">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <div class="p-3 col-md-auto">
                        <h4>Wakil Ketua III</h4>
                        <hr style="height:2px; background-color:#333;width:50%;">
                    </div>
                    <div class="px-3 col-md-auto">
                        <p>Ir. H. Almunawar, M.Si</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wakil Ketua 4 -->
        <div class="row my-3">
            <div class="d-flex justify-content-start">
                <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                    <img class="img-rounded" src="/assets/img/profile/bu-dian.png" style="height:15em; border-radius:20px;" alt="">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <div class="p-3 col-md-auto">
                        <h4>Wakil Ketua IV</h4>
                        <hr style="height:2px; background-color:#333;width:50%;">
                    </div>
                    <div class="px-3 col-md-auto">
                        <p>S. Indriyani Dian, S.H, M.Si</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Staff -->
        <h1>Staff</h1>
        <!-- start row1 -->
        <div class="row my-3">
            <div class="col">
                <div class="d-flex justify-content-start">
                    <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                        <img class="img-rounded" src="/assets/img/profile/mas-hanafi.png" style="height:15em; border-radius:20px;" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="p-3 col-md-auto">
                            <h4>Staff Wakil Ketua I</h4>
                            <hr style="height:2px; background-color:#333;width:50%;">
                        </div>
                        <div class="px-3 col-md-auto">
                            <p>Ahmad Rizaq Hanafi, S.Sos</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-start">
                    <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                        <img class="img-rounded" src="/assets/img/profile/mba-kiki.png" style="height:15em; border-radius:20px;" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="p-3 col-md-auto">
                            <h4>Staff Wakil Ketua IV</h4>
                            <hr style="height:2px; background-color:#333;width:50%;">
                        </div>
                        <div class="px-3 col-md-auto">
                            <p>Riskia Miskia Nur Rahmi, S.E</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row1 -->
        <!-- start row2 -->
        <div class="row my-3">
            <div class="col">
                <div class="d-flex justify-content-start">
                    <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                        <img class="img-rounded" src="/assets/img/profile/mas-anggam.png" style="height:15em; border-radius:20px;" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="p-3 col-md-auto">
                            <h4>Staff Wakil Ketua II</h4>
                            <hr style="height:2px; background-color:#333;width:50%;">
                        </div>
                        <div class="px-3 col-md-auto">
                            <p>M. Anggam Ambakarim, S.M</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-start">
                    <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                        <img class="img-rounded" src="/assets/img/profile/mas-hamdan.png" style="height:15em; border-radius:20px;" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="p-3 col-md-auto">
                            <h4>Staff Wakil Ketua IV</h4>
                            <hr style="height:2px; background-color:#333;width:50%;">
                        </div>
                        <div class="px-3 col-md-auto">
                            <p>Lichtquelle Resqykha Hamdan, S.H</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row2 -->
        <!-- start row 3 -->
        <div class="row my-3">
            <div class="col">
                <div class="d-flex justify-content-start">
                    <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                        <img class="img-rounded" src="/assets/img/profile/mas-miftahul.png" style="height:15em; border-radius:20px;" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="p-3 col-md-auto">
                            <h4>Staff Wakil Ketua III</h4>
                            <hr style="height:2px; background-color:#333;width:50%;">
                        </div>
                        <div class="px-3 col-md-auto">
                            <p>H. Ahmad Millahul Falah, S.Pi., M.M</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-start">
                    <div style=" width:auto;background-color:#01502D; border-radius:20px;">
                        <img class="img-rounded" src="/assets/img/profile/mas-syarif.png" style="height:15em; border-radius:20px;" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="p-3 col-md-auto">
                            <h4>Staff Wakil Ketua IV</h4>
                            <hr style="height:2px; background-color:#333;width:50%;">
                        </div>
                        <div class="px-3 col-md-auto">
                            <p>Muhammad Syarifuddin, S.Kom</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row3 -->
    </div>
    <!-- end container -->
</section>
<br><br><br>
@endsection