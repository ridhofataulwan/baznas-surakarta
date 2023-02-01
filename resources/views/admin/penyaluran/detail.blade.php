<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.stisla.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('admin.stisla.navbar')
            @include('admin.stisla.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header d-flex flex-column">
                        <div class="align-self-start">
                            <h1>Detail Penyaluran Bantuan</h1>
                        </div>
                        <div class="align-self-start mt-3">{{date("d F Y",strtotime("$dist->created_at"))}}</div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title" readonly value="{{$dist->nik}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title" readonly value="{{$dist->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat,
                                                Tanggal Lahir</label>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input type="text" class="form-control" name="title" readonly value="{{$dist->birthplace}}">
                                            </div>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input type="date" class="form-control" name="date" readonly value="{{$dist->birthdate}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                Bantuan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select type="select" readonly class="form-control" name="category">
                                                    <option selected value="{{$dist->program_id}}">
                                                        {{$program->name}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title" readonly value="{{$dist->religion}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title" readonly value="{{$dist->job}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No
                                                Telp</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title" readonly value="{{$dist->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="alamat">Alamat</label>
                                            <div class="col-md-9">
                                                <div class="row mb-2">
                                                    <div class="col-sm-6 col-md-4">
                                                        <select class="form-control form-select bg-white" name="province" id="select-province">
                                                            <option value="">{{$json_address->province->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <select class="form-control form-select bg-white" name="district" id="select-district">
                                                            <option class="form-option" value="" disabled selected>
                                                                {{$json_address->district->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-6 col-md-4">
                                                        <select class="form-control form-select bg-white" name="regency" id="select-regency">
                                                            <option class="form-option" value="" disabled selected>
                                                                {{$json_address->regency->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <select class="form-control form-select bg-white" name="village" id="select-village">
                                                            <option class="form-option" value="" disabled selected>
                                                                {{$json_address->village->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea style="height: 150px;" name="content" readonly class="form-control summernote-simple">{{$dist->description}}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-6">
                                                <h3>Kelengkapan Dokumen</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Persyaratan
                                                {{$program->name}}</label>
                                            <div class="row-md-6">
                                                <div class="col-sm-12 col-md-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Surat
                                                            Permohonan Bantuan</label>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12 col-md-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">Scan
                                                            KTP</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                        <label class="custom-control-label" for="customCheck3">Scan
                                                            KK</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                        <label class="custom-control-label" for="customCheck4">SKTM
                                                            atau
                                                            Gakin</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                        <label class="custom-control-label" for="customCheck5">Suket
                                                            Permohonan Bantuan
                                                            ke Baznas dari kelurahan</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                        <label class="custom-control-label" for="customCheck6">Tagihan
                                                            dari Sekolah</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- This is where your code ends -->
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        <footer class="main-footer">
            @include('admin.stisla.footer')
        </footer>
    </div>
    </div>

    @include('admin.stisla.script')
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>