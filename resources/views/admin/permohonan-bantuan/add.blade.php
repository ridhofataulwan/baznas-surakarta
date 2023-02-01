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
                    <div class="section-header">
                        <h1>Form Permohonan Bantuan</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('store.request') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                    Bantuan</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select type="select" class="form-control" name="program_id" id="select-program">
                                                        <option value="" disabled selected>Plih Jenis Bantuan</option>
                                                        @foreach($program as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
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
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                                    @error('name')
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
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat
                                                    Tanggal Lahir</label>
                                                <div class="col-sm-6 col-md-3">
                                                    <input type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ old('birthplace') }}">
                                                    @error('birthplace')
                                                    <span class="badge rounded text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}">
                                                    @error('birthdate')
                                                    <span class="badge rounded text-danger">{{ $message }}</span>
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
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select type="select" class="form-control" name="religion">
                                                        <option value="Islam">Islam</option>
                                                        <option value="Katholik">Katholik</option>
                                                        <option value="Protestan">Protestan</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" value="{{ old('job') }}">
                                                    @error('job')
                                                    <span class="badge rounded text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No
                                                    Telp</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                                    @error('phone')
                                                    <span class="badge rounded text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea style="height: 150px;" name="description" class="form-control summernote-simple @error('description') is-invalid @enderror" value="{{ old('description') }}"></textarea>
                                                    @error('description')
                                                    <span class="badge rounded text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-6">
                                                    <h3>Persyaratan</h3>
                                                </div>
                                            </div>
                                            <div id="persyaratan">
                                                <div id="element_sp" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Surat Permohonan</label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="surat_permohonan" id="sp"><label class="custom-file-label" for="sp">Choose file</label>
                                                            <div class="mt-2">Template surat permohonan bisa download <a href="/assets/file/Format%20Surat%20Permohonan%20Bantuan%20Perorangan.docx" class="font-weight-bold text-primary">Di sini</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="element_ktpkk" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Scan KTP</label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="ktp" id="ktp"><label class="custom-file-label" for="ktp">Choose file</label></div>
                                                    </div>
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Scan KK</label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="kk" id="kk"><label class="custom-file-label" for="kk">Choose file</label></div>
                                                    </div>
                                                </div>
                                                <div id="element_sktm" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">SKTM atau Gakin </label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="sktm" id="sktm"><label class="custom-file-label" for="sktm">Choose file</label></div>
                                                    </div>
                                                </div>
                                                <div id="element_sp_kelurahan" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Suket Permohonan Bantuan<br>ke Baznas dari kelurahan </label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="sp_kelurahan" id="sp_kelurahan"><label class="custom-file-label" for="sp_kelurahan">Choose file</label></div>
                                                    </div>
                                                </div>
                                                <div id="element_tagihan_sklh" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Tagihan Sekolah </label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="tagihan_sklh" id="tagihan_sklh"><label class="custom-file-label" for="tagihan_sklh">Choose file</label></div>
                                                    </div>
                                                </div>
                                                <div id="element_foto_usaha" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Foto Bukti Usaha </label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="foto_usaha" id="foto_usaha"><label class="custom-file-label" for="foto_usaha">Choose file</label></div>
                                                    </div>
                                                </div>
                                                <div id="element_tagihan_rs" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Tagihan dari Rumah Sakit </label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="tagihan_rs" id="tagihan_rs"><label class="custom-file-label" for="tagihan_rs">Choose file</label></div>
                                                    </div>
                                                </div>
                                                <div id="element_proposal" style="display: none;">
                                                    <div class="form-group row mb-3"><label class="col-form-label mr-3 text-md-right col-12 col-md-3 col-lg-3">Proposal</label>
                                                        <div class="col-sm-12 col-md-6"><input type="file" class="custom-file-input" name="proposal" id="proposal"><label class="custom-file-label" for="proposal">Choose file</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" class="btn btn-primary">Tambah
                                                        Permohonan</button>
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
        // Custom File Namme
        function fileName(obj) {
            console.log(obj.value);
            let fullPath = obj.value
            if (fullPath) {
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                console.log(filename);
                $("[for='" + obj.id + "']").html(filename)
            }
        }

        // Use Function
        $("[type='file']").change(function() {
            console.log(this);
            fileName(this)
        })
    </script>

    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
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
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    <script>
        CKEDITOR.replace('content');
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
        $("#select-program").change(function() {
            let program = $(this).val()
            console.log(program);
            switch (program) {
                case "2":
                    $("#element_sp").show();
                    $("#element_ktpkk").show();
                    $("#element_sktm").show();
                    $("#element_sp_kelurahan").show();
                    $("#element_tagihan_sklh").show();
                    $("#element_foto_usaha").hide();
                    $("#element_tagihan_rs").hide();
                    $("#element_proposal").hide();
                    break;
                case "5":
                    $("#element_sp").show();
                    $("#element_ktpkk").show();
                    $("#element_sktm").show();
                    $("#element_sp_kelurahan").show();
                    $("#element_tagihan_sklh").hide();
                    $("#element_foto_usaha").show();
                    $("#element_tagihan_rs").hide();
                    $("#element_proposal").hide();
                    break;
                case "4":
                    $("#element_sp").show();
                    $("#element_ktpkk").hide();
                    $("#element_sktm").hide();
                    $("#element_sp_kelurahan").hide();
                    $("#element_tagihan_sklh").hide();
                    $("#element_foto_usaha").hide();
                    $("#element_tagihan_rs").hide();
                    $("#element_proposal").show();
                    break;
                case "1":
                    $("#element_sp").show();
                    $("#element_ktpkk").show();
                    $("#element_sktm").show();
                    $("#element_sp_kelurahan").show();
                    $("#element_tagihan_sklh").hide();
                    $("#element_foto_usaha").hide();
                    $("#element_tagihan_rs").hide();
                    $("#element_proposal").hide();
                    break;
                case "3":
                    $("#element_sp").show();
                    $("#element_ktpkk").show();
                    $("#element_sktm").show();
                    $("#element_sp_kelurahan").show();
                    $("#element_tagihan_sklh").hide();
                    $("#element_foto_usaha").hide();
                    $("#element_tagihan_rs").show();
                    $("#element_proposal").hide();
                    break;
                default:
                    requirements += "Pilih Jenis Bantuan terlebih dahulu!"
                    break;
            }
        })
    </script>
</body>

</html>