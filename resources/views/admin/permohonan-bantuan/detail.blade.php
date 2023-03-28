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
                            <h1>Detail Permohonan Bantuan</h1>
                        </div>
                        <div class="align-self-start">{{$req->created_at}}</div>
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
                                                <input readonly type="text" class="form-control" name="nik" value="{{$req->nik}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input disabled type="text" class="form-control" name="name" value="{{$req->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                Kelamin</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="selectgroup">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="LAKI_LAKI" class="selectgroup-input" disabled {{$req->gender == 'LAKI_LAKI' ? 'checked' : ''}}>
                                                        <span class="selectgroup-button selectgroup-button-icon">Laki - laki</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="PEREMPUAN" class="selectgroup-input" disabled {{$req->gender == 'PEREMPUAN' ? 'checked' : ''}}>
                                                        <span class="selectgroup-button selectgroup-button-icon">Perempuan</span>
                                                    </label>
                                                </div>
                                                @error('gender')
                                                <a class="text-danger" style="font-size: 80%;">{{ $message }}</a>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat,
                                                Tanggal Lahir</label>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input readonly type="text" class="form-control" name="birthplace" value="{{$req->birthplace}}">
                                            </div>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input readonly type="date" class="form-control" name="birthdate" value="{{$req->birthdate}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                Bantuan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select readonly type="select" class="form-control" name="program_id">
                                                    <option selected value="Pendidikan">Pendidikan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input readonly type="text" class="form-control" name="religion" value="{{$req->religion}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input readonly type="text" class="form-control" name="job" value="{{$req->job}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No
                                                Telp</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input readonly type="text" class="form-control" name="phone" value="{{$req->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="alamat">Alamat</label>
                                            <div class="col-md-9">
                                                <div class="row mb-2">
                                                    <div class="col-sm-6 col-md-4">
                                                        <select disabled class="form-control form-select bg-white" name="province" id="select-province">
                                                            <option value="">Pilih Provinsi</option>
                                                            @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}" {{substr($req->address, 0, 2) == $province->id ? 'selected' : ''}}>
                                                                {{ $province->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <select disabled class="form-control form-select bg-white" name="district" id="select-district">
                                                            @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}" {{substr($req->address, 0, 5) == $district->id ? 'selected' : ''}}>
                                                                {{ $district->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-6 col-md-4">
                                                        <select disabled class="form-control form-select bg-white" name="regency" id="select-regency" onchange="pilihKec(this.value)">
                                                            @foreach ($regencies as $regency)
                                                            <option value="{{ $regency->id }}" {{substr($req->address, 0, 8) == $regency->id ? 'selected' : ''}}>
                                                                {{ $regency->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <select disabled class="form-control form-select bg-white" name="village" id="select-village">
                                                            @foreach ($villages as $village)
                                                            <option value="{{ $village->id }}" {{substr($req->address, 0, 13) == $village->id ? 'selected' : ''}}>
                                                                {{ $village->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea readonly style="height: 150px;" name="description" class="form-control summernote-simple">{{$req->description}}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row col-12 ml-5 pr-5">
                                            <div class="col-12 col-sm-12 text-center">
                                                <h3>Kelengkapan Persyaratan</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <?php $req->requirements = json_decode($req->requirements) ?>
                                            @foreach($req->requirements as $key => $value)
                                            @if($value != null)
                                            <div class="col-sm-12 col-md-4 mb-4">
                                                <a href="/{{$value}}" target="_blank">
                                                    <div style="height:10rem;background-image: url('http://127.0.0.1:8000/assets/img/portfolio/thumbnails/surat.jpg');background-size:cover;" class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;" width="100%" class="col text-light p-3 ">
                                                            <h5>{{strtoupper($key)}}</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status
                                                Permohonan</label>
                                            <div class="selectgroup col-md-4 col-sm-12">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="transportation" value="1" class="selectgroup-input" checked="">
                                                    @if($req->status == 'UNCHECKED')
                                                    <span class="selectgroup-button selectgroup-button-icon bg-warning">{{$req->status}}</i></span>
                                                    @elseif($req->status == 'INVALID')
                                                    <span class="selectgroup-button selectgroup-button-icon bg-danger">{{$req->status}}</i></span>
                                                    @elseif($req->status == 'VALID')
                                                    <span class="selectgroup-button selectgroup-button-icon bg-info">{{$req->status}}</i></span>
                                                    @elseif($req->status == 'INVESTIGATE')
                                                    <span class="selectgroup-button selectgroup-button-icon bg-warning">{{$req->status}}</i></span>
                                                    @elseif($req->status == 'ACCEPTED')
                                                    <span class="selectgroup-button selectgroup-button-icon bg-success">{{$req->status}}</i></span>
                                                    @elseif($req->status == 'UNACCEPTED')
                                                    <span class="selectgroup-button selectgroup-button-icon bg-danger">{{$req->status}}</i></span>
                                                    @elseif($req->status == 'DONE')
                                                    <span class="selectgroup-button selectgroup-button-icon bg-success">{{$req->status}}</i></span>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4" style="display:true">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Aksi</label>
                                            @if($req->status == 'UNCHECKED' || $req->status == 'INVALID')
                                            <div class="col-sm-12 col-md-7">
                                                <a href="/admin/permohonan/validate/{{$req->id}}/VALID" class="btn btn-info">Valid</a>
                                                <a href="/admin/permohonan/validate/{{$req->id}}/INVALID" class="btn btn-danger">Tidak Valid</a>
                                            </div>
                                            @endif
                                            @if($req->status == 'VALID')
                                            <div class="col-sm-12 col-md-7">
                                                <a href="/admin/permohonan/validate/{{$req->id}}/INVESTIGATE" class="btn btn-warning">Tinjau Permohonan</a>
                                            </div>
                                            @endif
                                            @if($req->status == 'INVESTIGATE')
                                            <div class="col-sm-12 col-md-7">
                                                <a href="/admin/permohonan/validate/{{$req->id}}/ACCEPTED" class="btn btn-success">Terima Permohonan</a>
                                                <a href="/admin/permohonan/validate/{{$req->id}}/UNACCEPTED" class="btn btn-danger">Tolak Permohonan</a>
                                            </div>
                                            @endif
                                            @if($req->status == 'ACCEPTED')
                                            <div class="col-sm-12 col-md-7">
                                                <a href="/admin/permohonan/validate/{{$req->id}}/DONE" class="btn btn-info">Selesaikan</a>
                                            </div>
                                            @endif
                                            @if($req->status == 'DONE' || $req->status == 'UNACCEPTED' )
                                            <div class="col-sm-12 col-md-7">
                                                <a class="btn btn-secondary" href="">Aksi tidak tersedia</a>
                                            </div>
                                            @endif
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

</html>