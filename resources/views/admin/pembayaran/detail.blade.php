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
                                    <div class="card-body">
                                        <form action="{{ route('update.pembayaran')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" class="form-control" name="id" value="{{$payment->id}}">
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pembayar</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="selectgroup">
                                                        @if($isLembaga == false)
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="payer_type" value="1" class="selectgroup-input" {{ $isLembaga == false ? 'checked' : '' }} disabled>
                                                            <span class="selectgroup-button selectgroup-button-icon">Perorangan</span>
                                                        </label>
                                                        @elseif($isLembaga == true)
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="payer_type" value="2" class="selectgroup-input" {{ $isLembaga == true ? 'checked' : '' }} disabled>
                                                            <span class="selectgroup-button selectgroup-button-icon">Lembaga</span>
                                                        </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @if($isLembaga == false)
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <span class="nik row-sm-12 row-md-7"></span>
                                                    <div class="row-sm-12 row-md-7">
                                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{$payment->nik}}" minlength="16" maxlength="16" readonly>
                                                        @error('nik')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$payment->name}}" readonly>
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @elseif($isLembaga == true)
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lembaga</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('lembaga') is-invalid @enderror" name="lembaga" id="select-lembaga" disabled>
                                                        <option value="">Pilih Lembaga</option>
                                                        @foreach ($lembaga as $lembaga)
                                                        <option value="{{ $lembaga->code }}" {{$payment->nik == $lembaga->code ? 'selected' : ''}}>
                                                            {{ $lembaga->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('nik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="gender" value="LAKI_LAKI" class="selectgroup-input" disabled {{$payment->gender == 'LAKI_LAKI' ? 'checked' : ''}}>
                                                            <span class="selectgroup-button selectgroup-button-icon">Laki - laki</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="gender" value="PEREMPUAN" class="selectgroup-input" disabled {{$payment->gender == 'PEREMPUAN' ? 'checked' : ''}}>
                                                            <span class="selectgroup-button selectgroup-button-icon">Perempuan</span>
                                                        </label>
                                                    </div>
                                                    @error('gender')
                                                    <a class="text-danger" style="font-size: 80%;">{{ $message }}</a>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
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
                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$payment->email}}" readonly>
                                                            @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                    Pembayaran
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="selectgroup selectgroup-pills">
                                                        @foreach($payment_type as $type => $value)
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="{{$type}}" class="selectgroup-input" disabled {{$payment->type == $type ? 'checked' : ''}} {{$value}}>
                                                            <span class="selectgroup-button btn-outline {{$value == 'disabled' ? 'bg-secondary' : ''}}">{{$type}}</span>
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                    @error('type')
                                                    <span class="badge rounded bg-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="alamat">Alamat</label>
                                                <div class="col-md-9">
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-md-5 mb-1">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('province') is-invalid @enderror" name="province" id="select-province" disabled>
                                                                <option value="">Pilih Provinsi</option>
                                                                @foreach ($provinces as $province)
                                                                <option value="{{ $province->id }}" {{substr($payment->address, 0, 2) == $province->id ? 'selected' : ''}}>
                                                                    {{ $province->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 col-md-5 mb-1">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('district') is-invalid @enderror" name="district" id="select-district" disabled>
                                                                @foreach ($districts as $district)
                                                                <option value="{{ $district->id }}" {{substr($payment->address, 0, 5) == $district->id ? 'selected' : ''}}>
                                                                    {{ $district->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-md-5 mb-1">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('regency') is-invalid @enderror" name="regency" id="select-regency" disabled>
                                                                @foreach ($regencies as $regency)
                                                                <option value="{{ $regency->id }}" {{substr($payment->address, 0, 8) == $regency->id ? 'selected' : ''}}>
                                                                    {{ $regency->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 col-md-5 mb-1">
                                                            <select class="form-control form-select bg-white select2 select2-hidden-accessible @error('village') is-invalid @enderror" name="village" id="select-village" disabled>
                                                                @foreach ($villages as $village)
                                                                <option value="{{ $village->id }}" {{substr($payment->address, 0, 13) == $village->id ? 'selected' : ''}}>
                                                                    {{ $village->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal (Rp)</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="form-group mb-2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    Rp
                                                                </div>
                                                            </div>
                                                            <input type="text" min="1" id="rupiah" class="form-control @error('amount') is-invalid @enderror" name="amount" autocomplete="no" value="{{ $payment->amount }}" readonly>
                                                            @error('amount')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No
                                                    Telp</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$payment->phone}}" readonly>
                                                    @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label col-12 col-md-3 col-lg-3 text-md-right">Bukti
                                                    Pembayaran</label>
                                                <div class="col">
                                                    <div class="row-sm-12 row-md-4">
                                                        <span class="badge badge-primary" for="image-upload" id="file-name">Filename</span>
                                                        <span class="badge badge-primary" id="modal-image-trigger" style="cursor: pointer;"><i class="far fa-eye"></i> Lihat Gambar</span>
                                                        <div>Jenis file: jpg, png, jpeg</div>
                                                    </div>
                                                    <div class="row-sm-12 row-md-4" id="image-edit" style="display: none;">
                                                        <div class="image-preview" height="100%">
                                                            <label class="bagde badge-pill" for="image-upload" id="image-label" style="opacity: 85%; background-color: #6777ef;">Pilih File</label>
                                                            <input type="file" name="proof_of_payment" id="image-upload" value="/{{$payment->proof_of_payment}}">
                                                            <img src="/{{$payment->proof_of_payment}}" id="image-preview" width="100%" height="auto">
                                                        </div>
                                                    </div>
                                                    <div class="row" id="image-detail">
                                                        <div class="card">
                                                            <div class="card-body d-flex justify-content-center">
                                                                <img src="/{{$payment->proof_of_payment}}" alt="" width="100%" height="auto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group row mb-4" id="btn-edit" style="display:true">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="button" id="edit" class="btn btn-primary"><i class="fas fa-pencil"></i> Edit</button>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4" id="btn-save" style="display:none">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

    <!-- Image Modal For Detail -->
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="image-modal-label">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modal-body" src="" width="100%" height="auto">
                </div>
            </div>
        </div>
    </div>


    @include('admin.stisla.script')

    <!-- Jquery for Image Upload and Image Preview -->
    <script>
        $(document).ready(() => {

            let filename = $("#image-preview").attr('src');
            filename = filename.split('/')
            $("#file-name").html(filename[3])
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

    <!-- Jquery for modal detail Image -->
    <script>
        $("#modal-image-trigger").click(function() {
            let src = $("#image-preview").attr('src');
            $("#image-modal").modal("show");
            $("#modal-body").attr("src", src);
        });
    </script>

    <script>
        $(document).on('keyup', '#rupiah', function() {
            rupiah = $('#rupiah').val();
            $('#rupiah').val(formatRupiah(rupiah, 'Rp. '));
        });


        /* Fungsi formatRupiah */
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
        $(document).ready(() => {
            rupiah = $('#rupiah').val();
            $('#rupiah').val(formatRupiah(rupiah, 'Rp. '));
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
                        id: province_id
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
                        id: district_id,
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
                        id: regency_id,
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

    <!-- Enable Edit on Detail -->
    <script>
        $("#edit").click(function() {
            $("[readonly]").removeAttr("readonly");
            $("[disabled]").removeAttr("disabled");
            $("#btn-edit").hide();
            $("#image-detail").hide();
            $("#btn-save").show();
            $("#image-edit").show();
        });
    </script>

    <!-- Swal -->
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

    <!-- NIK  -->
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