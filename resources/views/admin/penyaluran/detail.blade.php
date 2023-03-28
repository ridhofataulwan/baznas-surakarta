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
                                        <div class="form-group row mb-3">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Penerima</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="selectgroup">
                                                    <label class="selectgroup-item">
                                                        <input disabled type="radio" name="dist_type" value="1" class="selectgroup-input" {{ $dist->dist_type == "PERORANGAN" ? 'checked' : '' }} checked>
                                                        <span class="selectgroup-button selectgroup-button-icon">Perorangan</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input disabled type="radio" name="dist_type" value="2" class="selectgroup-input" {{ $dist->dist_type == "LEMBAGA" ? 'checked' : '' }}>
                                                        <span class="selectgroup-button selectgroup-button-icon">Lembaga</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Distribusi</label>
                                            <div class="col-sm-6 col-md-3">
                                                <input readonly type="date" class="form-control @error('dist_date') is-invalid @enderror" name="dist_date" value="{{$dist->distribution_date}}">
                                                @error('dist_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
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
                                        @if($dist->dist_type == 'PERORANGAN')
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                Kelamin</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="selectgroup">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="LAKI_LAKI" class="selectgroup-input" disabled {{$dist->gender == 'LAKI_LAKI' ? 'checked' : ''}}>
                                                        <span class="selectgroup-button selectgroup-button-icon">Laki - laki</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="gender" value="PEREMPUAN" class="selectgroup-input" disabled {{$dist->gender == 'PEREMPUAN' ? 'checked' : ''}}>
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
                                                <input type="text" class="form-control" name="title" readonly value="{{$dist->birthplace}}">
                                            </div>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input type="date" class="form-control" name="date" readonly value="{{$dist->birthdate}}">
                                            </div>
                                        </div>
                                        @endif
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
                                                            @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}" {{substr($dist->address, 0, 2) == $province->id ? 'selected' : ''}}>
                                                                {{ $province->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <select class="form-control form-select bg-white" name="district" id="select-district">
                                                            @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}" {{substr($dist->address, 0, 5) == $district->id ? 'selected' : ''}}>
                                                                {{ $district->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-6 col-md-4">
                                                        <select class="form-control form-select bg-white" name="regency" id="select-regency">
                                                            @foreach ($regencies as $regency)
                                                            <option value="{{ $regency->id }}" {{substr($dist->address, 0, 8) == $regency->id ? 'selected' : ''}}>
                                                                {{ $regency->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                        <select class="form-control form-select bg-white" name="village" id="select-village">
                                                            @foreach ($villages as $village)
                                                            <option value="{{ $village->id }}" {{substr($dist->address, 0, 13) == $village->id ? 'selected' : ''}}>
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
                                                <textarea style="height: 150px;" name="content" readonly class="form-control summernote-simple">{{$dist->description}}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row col-12 ml-5 pr-5">
                                            <div class="col-12 col-sm-12 text-center">
                                                <h3>Kelengkapan Persyaratan</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <?php $dist->requirements = json_decode($dist->requirements) ?>
                                            @foreach($dist->requirements as $key => $value)
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