<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.stisla.head')
</head>

<body>
    <div class="response" data-title="<?= session()->get('title') ?>" data-message="<?= session()->get('message') ?>" data-status="<?= session()->get('status') ?>"></div>

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('admin.stisla.navbar')
            @include('admin.stisla.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{$title}}</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Input Pembayaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('store.pembayaran') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pembayar</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="payer_type" value="1" class="selectgroup-input" {{ old('payer_type') == "1" ? 'checked' : '' }} checked>
                                                            <span class="selectgroup-button selectgroup-button-icon">Perorangan</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="payer_type" value="2" class="selectgroup-input" {{ old('payer_type') == "2" ? 'checked' : '' }}>
                                                            <span class="selectgroup-button selectgroup-button-icon">Lembaga</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3" id="element-nik" style="display:none">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <span class="nik row-sm-12 row-md-7"></span>
                                                    <div class="row-sm-12 row-md-7">
                                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" minlength="16" maxlength="16">
                                                        @error('nik')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3" id="element-name" style="display:none">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3" id="element-lembaga" style="display:none">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lembaga</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('lembaga') is-invalid @enderror" name="lembaga" id="select-lembaga">
                                                        <option value="">Pilih Lembaga</option>
                                                        @foreach ($lembaga as $lembaga)
                                                        <option value="{{ $lembaga->code }}">
                                                            {{ $lembaga->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('nik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="gender" value="LAKI_LAKI" class="selectgroup-input" {{ old('gender') == "LAKI_LAKI" ? 'checked' : '' }}>
                                                            <span class="selectgroup-button selectgroup-button-icon">Laki - laki</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="gender" value="PEREMPUAN" class="selectgroup-input" {{ old('gender') == "PEREMPUAN" ? 'checked' : '' }}>
                                                            <span class="selectgroup-button selectgroup-button-icon">Perempuan</span>
                                                        </label>
                                                    </div>
                                                    @error('gender')
                                                    <a class="text-danger" style="font-size: 80%;">{{ $message }}</a>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                    Email</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="form-group mb-2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    @
                                                                </div>
                                                            </div>
                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                                            @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                    Pembayaran
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="selectgroup selectgroup-pills">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="MAAL" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button btn-outline">Maal</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="INFAQ" class="selectgroup-input">
                                                            <span class="selectgroup-button">Infaq</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="FIDYAH" class="selectgroup-input" disabled>
                                                            <span class="selectgroup-button bg-secondary">Fidyah</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="FITRAH" class="selectgroup-input" disabled>
                                                            <span class="selectgroup-button bg-secondary">Fitrah</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="QURBAN" class="selectgroup-input" disabled>
                                                            <span class="selectgroup-button bg-secondary">Qurban</span>
                                                        </label>
                                                    </div>
                                                    @error('type')
                                                    <span class="badge rounded bg-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="alamat">Alamat</label>
                                                <div class="col-md-9">
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-md-5 mb-1">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('province') is-invalid @enderror" name="province" id="select-province">
                                                                <option value="">Pilih Provinsi</option>
                                                                @foreach ($provinces as $province)
                                                                <option value="{{ $province->id }}">
                                                                    {{ $province->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 col-md-5">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('district') is-invalid @enderror" name="district" id="select-district">
                                                                <option class="form-option" value="" disabled selected>
                                                                    Pilih Kota/Kabupaten
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-md-5 mb-1">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('regency') is-invalid @enderror" name="regency" id="select-regency">
                                                                <option class="form-option" value="" disabled selected>
                                                                    Pilih Kecamatan
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 col-md-5">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('village') is-invalid @enderror" name="village" id="select-village">
                                                                <option class="form-option" value="" disabled selected> Pilih
                                                                    Kelurahan/Desa
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-5">
                                                            @error('province')
                                                            <li class="text-danger" style="font-size: 80%;">{{ $message }}</li>
                                                            @enderror
                                                            @error('regency')
                                                            <li class="text-danger" style="font-size: 80%;">{{ $message }}</li>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6 col-md-5">
                                                            @error('district')
                                                            <li class="text-danger" style="font-size: 80%;">{{ $message }}</li>
                                                            @enderror
                                                            @error('village')
                                                            <li class="text-danger" style="font-size: 80%;">{{ $message }}</li>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal (Rp)</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="form-group mb-2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    Rp
                                                                </div>
                                                            </div>
                                                            <input type="text" min="1" id="rupiah" class="form-control @error('email') is-invalid @enderror" name="amount" autocomplete="no" value="{{ old('amount') }}">
                                                            @error('amount')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No
                                                    Telp</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="form-group mb-2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-phone"></i>
                                                                </div>
                                                            </div>
                                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                                            @error('phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label col-12 col-md-3 col-lg-3 text-md-right">Bukti
                                                    Pembayaran</label>
                                                <div class="col">
                                                    <span class="badge badge-primary" for="image-upload">Filename</span>
                                                    <div>Jenis file: jpg, png, jpeg</div>
                                                    <div class="image-preview" height="100%">
                                                        <label class="bagde badge-pill" for="image-upload" id="image-label" style="opacity: 85%; background-color: #6777ef;">Pilih File</label>
                                                        <input type="file" name="proof_of_payment" id="image-upload">
                                                        <img src="" id="image-preview" width="100%" height="auto" hidden="true">
                                                    </div>
                                                    @error('proof_of_payment')
                                                    <a class="text-danger" style="font-size: 80%;">{{ $message }}</a>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" name="submit" class="btn btn-primary">Tambah
                                                        Pembayaran</button>
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
    <script>
        $(document).ready(() => {
            $("#image-upload").change(function() {
                const file = this.files[0];
                if (file) {
                    $("#file-name").html(file.name).removeAttr("hidden");
                    $("#image-file").attr("hidden", true);
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#image-preview").attr("src", event.target.result).removeAttr("hidden");
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script>
        $(document).on('keyup', '#rupiah', function() {
            rupiah = $('#rupiah').val();
            $('#rupiah').val(formatRupiah(rupiah, ''));
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix = '') {
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
            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
    </script>

    <script>
        $("[type='file']").change(function() {
            var file = this.files[0].name;
            $("[for='" + this.id + "']").html(file);
        });

        function fileName(obj) {
            var file = obj.value.split(/(\\|\/)/g).pop();
            $("[for='" + obj.id + "']").html(file);
        }

        // Use Function
        $("[type='file']").change(function() {
            fileName(this)
        })
    </script>

    <!-- Address -->
    <script>
        // Pilih Provinsi
        $(document).on('change', '#select-province', function() {
            let province_id = $(this).val();
            // ! Remove Html Below
            $('#select-district').html('<option value="">Pilih Kota/Kabupaten</option>')
            $('#select-regency').html('<option value="">Pilih Kecamatan</option>')
            $('#select-village').html('<option value="">Pilih Kelurahan/Desa</option>')

            $(document).ready(function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/get-district",
                    method: 'POST',
                    data: {
                        province_id: province_id
                    },
                    success: function(response) {
                        let districs = response;
                        let option = ['<option value="">Pilih Kota/Kabupaten</option>']
                        districs.forEach(element => {
                            option.push('<option value=' + element['id'] + '>' +
                                element['name'] + '</option>')
                        });
                        $('#select-district').html(option)
                    }
                })
            });
        })

        // Pilih Kabupaten/Kota
        $(document).on('change', '#select-district', function() {
            let district_id = $(this).val();
            let province_id = $('#select-province').val();

            // ! Remove Html Below
            $('#select-regency').html('<option value="">Pilih Kecamatan</option>')
            $('#select-village').html('<option value="">Pilih Kelurahan/Desa</option>')
            $(document).ready(function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/get-regency",
                    method: 'POST',
                    data: {
                        district_id: district_id,
                        province_id: province_id
                    },
                    success: function(response) {
                        let districs = response;
                        let option = ['<option value="">Pilih Kecamatan</option>']
                        districs.forEach(element => {
                            option.push('<option value=' + element['id'] + '>' +
                                element['name'] + '</option>')
                        });
                        $('#select-regency').html(option)


                    }
                })
            });
        })

        // Pilih Kabupaten/Kota
        $(document).on('change', '#select-regency', function() {
            let regency_id = $(this).val();
            let district_id = $('#select-district').val();
            let province_id = $('#select-province').val();

            // ! Remove Html Below
            $('#select-village').html('<option value="">Pilih Kelurahan/Desa</option>')
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
                        let option = ['<option value="">Pilih Kelurahan/Desa</option>']
                        districs.forEach(element => {
                            option.push('<option value=' + element['id'] + '>' +
                                element['name'] + '</option>')
                        });
                        $('#select-village').html(option)

                    }
                })
            });
        })
    </script>

    <script>
        let title = $(".response").data("title");
        let message = $(".response").data("message");
        let status = $(".response").data("status");
        if (status) {
            Swal.fire(
                title,
                message,
                status
            )
        }
    </script>

    <script>
        $(document).ready(() => {
            if ($('[name="payer_type"]').is(':checked')) {
                showElements('payer_type', '#element-nik', '#element-name', '#element-lembaga');
            }
            $('[name="payer_type"]').change(function() {
                showElements('payer_type', '#element-nik', '#element-name', '#element-lembaga');
            })
        });

        function showElements(name, element1, element2, element3) {
            var value = $('[name="' + name + '"]:checked').val();
            if (value == "1") {
                $(element1).css('display', 'flex')
                $(element2).css('display', 'flex')
                $(element3).css('display', 'none')
            } else if (value == "2") {
                $(element3).css('display', 'flex')
                $(element1).css('display', 'none')
                $(element2).css('display', 'none')
            }
        }
    </script>

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
                $('.nik').html('<span class="text-dark">NIK</span> <span class="text-danger"> [' + strLength + '/' + maxLength + '] ❌</span>')
            } else if (!(/\D/.test(this.value)) && strLength == maxLength) {
                $('.nik').html('<span class="text-success">NIK</span> <span class="text-success"> [' + strLength + '/' + maxLength + '] ✅</span>')
            }
        })
    </script>
</body>

</html>