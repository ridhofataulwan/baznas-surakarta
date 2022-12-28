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
                        <h1>Form Pembayaran Sedekah</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-warning alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        {{ $error }}
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @if (session('status'))
                                <div class="alert alert-info alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        {{ session('status') }}
                                    </div>
                                </div>
                                @endif
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h4>Add Post</h4>
                                    </div> -->
                                    <div class="card-body">
                                        <form action="{{ route('store.pembayaran') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="nik">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama /
                                                    Lembaga
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 c   ol-lg-3">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="genderlaki" value="LAKI_LAKI">
                                                        <label class="form-check-label" for="genderlaki">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="genderperempuan" value="PEREMPUAN">
                                                        <label class="form-check-label" for="genderperempuan">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                    Email</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="email" class="form-control" name="email" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                    Pembayaran
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select type="select" class="form-control" name="type">
                                                        <option value="Maal">Maal</option>
                                                        <option value="Infaq">Infaq</option>
                                                        <option value="Fidyah" disabled>Fidyah</option>
                                                        <option value="Fitrah" disabled>Fitrah</option>
                                                        <option value="Qurban" disabled>Qurban</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"
                                                    for="alamat">Alamat</label>
                                                <div class="col-md-9">
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-md-4">
                                                            <select class="form-control form-select bg-white"
                                                                name="province" id="select-province">
                                                                <option value="">Pilih Provinsi</option>
                                                                @foreach ($data as $provinsi)
                                                                <option value="{{ $provinsi->id }}">
                                                                    {{ $provinsi->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4">
                                                            <select class="form-control form-select bg-white"
                                                                name="district" id="select-district">
                                                                <option class="form-option" value="" disabled selected>
                                                                    Pilih
                                                                    Kota/Kabupaten</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-md-4">
                                                            <select class="form-control form-select bg-white"
                                                                name="regency" id="select-regency"
                                                                onchange="pilihKec(this.value)">
                                                                <option class="form-option" value="" disabled selected>
                                                                    Pilih
                                                                    Kecamatan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4">
                                                            <select class="form-control form-select bg-white"
                                                                name="village" id="select-village">
                                                                <option class="form-option" value="" disabled selected>
                                                                    Pilih
                                                                    Kelurahan/Desa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal
                                                    (Rp)</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" min="1" id="rupiah" class="form-control"
                                                        name="amount" autocomplete="no">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No
                                                    Telp</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="phone">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label col-12 col-md-3 col-lg-3 text-md-right">Bukti
                                                    Pembayaran</label>
                                                <div class="custom-file col-sm-12 col-md-7">
                                                    <div class="">
                                                        <input id="proof-of-payment" type="file"
                                                            class="custom-file-input" name="proof_of_payment">
                                                    </div>
                                                    <label for="proof-of-payment" class="custom-file-label"></label>

                                                </div>

                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
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
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>
    <script>
    CKEDITOR.replace('content');
    </script>
    <!-- 
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
    </script> -->

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

</body>

</html>