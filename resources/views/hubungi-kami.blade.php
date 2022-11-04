@extends('layouts/master')
@section('content')
<!--Hero Section-->
<header class="masthead">
    <div class="container-fluid hero-section" style="width: 100%;height: 350px;">
        <div class="heading">
            HUBUNGI KAMI
            <hr id="hr-hero">
        </div>
    </div>
</header>
<!--Form-->
<section class="page-section p-0" id="about">
    <div class="container-fluid" style="padding-top: 6%;;">
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
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0 mb-4">Kirim Pesan Anda</h2>
                <hr class="divider">
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                {{-- <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="{{ url('hubungi-kami') }}"
                method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ url('hubungi-kami') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control bg-white" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label class=" text-muted" for="name">Nama Lengkap</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Nama diperlukan.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control bg-white" id="email" type="email" name="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label class=" text-muted" for="email">Alamat Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Alamat email diperlukan</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email tidak valid</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-group mb-3">
                        <select class="form-control form-select bg-white" name="kategori">
                            <option selected disabled>Pilih Kategori</option>
                            <option value="Aduan">Aduan</option>
                            <option value="Saran">Saran</option>
                            <option value="Kritik">Kritik</option>
                        </select>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control bg-white" name="message" placeholder="Tulis pesan Anda di sini" id="message" style="height: 10rem"></textarea>
                        <label for="message">Pesan</label>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <!-- Submit Button-->
                    <center>
                        <button class="btn btn-success rounded-pill text-white px-5" id="submitButton" style="background-color: #01502D;" type="submit">Submit</button>
                    </center>
                </form>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-4 text-center mb-5 mb-lg-0">
                <div>
                    <i class="bi-phone fs-2 mb-5 text-muted"></i>
                    <!-- <img src="assets/img/whatsapp.png" width="50" alt="">
                    <button a href="http://wa.me/6281393055550">
                        081393055550
                    </button> -->
                    <p class="content-left text-dark">
                        <a href="http://wa.me/081393055550" style="font-size: 25px;">
                            Atau Hubungi kami melalui<br>
                            Whatapps&nbsp <ion-icon name="logo-whatsapp">
                            </ion-icon> 081393055550
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid image-bottom p-0 mt-3">
        <img src="assets/img/backgroundbawah.png" style="width: 100%; height: auto;" alt="">
    </div>
</section>
@endsection