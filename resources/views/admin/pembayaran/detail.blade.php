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
                        <div class="align-self-start">Senin, 12 Oktober 2022</div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title"
                                                    value="3320490002340230001">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title"
                                                    value="Rizky Joanditya">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat,
                                                Tanggal Lahir</label>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input type="text" class="form-control" name="title" value="Purwokerto">
                                            </div>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input type="date" class="form-control" name="date" value="2002-01-21">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                Bantuan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select type="select" class="form-control" name="category">
                                                    <option selected value="Pendidikan">Pendidikan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title" value="Islam">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title" value="Mahasiswa">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No
                                                Telp</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="title"
                                                    value="08712378981729">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input type="text" class="form-control" name="title" value="Banjarsari">
                                            </div>
                                            <div class="col-sm-6 col-md-3 col-6">
                                                <input type="text" class="form-control" name="date" value="Mojosongo">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea style="height: 150px;" name="content"
                                                    class="form-control summernote-simple">Buat Beasiswa</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row col-12 ml-5 pr-5">
                                            <div class="col-12 col-sm-12 text-center">
                                                <h3>Kelengkapan Persyaratan</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 col-md-4 mb-4">
                                                <a href="/assets/img/pasar-gede.png" target="_blank">
                                                    <div style="height:10rem;background-image: url('http://127.0.0.1:8000/assets/img/portfolio/thumbnails/1.jpg');background-size:cover;"
                                                        class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;"
                                                            width="100%" class="col text-light p-3 ">
                                                            <h5>Surat Permohonan</h5>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="col-sm-12 col-md-4 mb-4">
                                                <a href="/assets/img/pasar-gede.png" target="_blank">
                                                    <div style="height:10rem;background-image: url('http://127.0.0.1:8000/assets/img/portfolio/thumbnails/2.jpg');background-size:cover;"
                                                        class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;"
                                                            width="100%" class="col text-light p-3 ">
                                                            <h5>SKTM Gakin</h5>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="col-sm-12 col-md-4 mb-4">
                                                <a href="/assets/img/pasar-gede.png" target="_blank">
                                                    <div style="height:10rem;background-image: url('http://127.0.0.1:8000/assets/img/portfolio/thumbnails/3.jpg');background-size:cover;"
                                                        class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;"
                                                            width="100%" class="col text-light p-3 ">
                                                            <h5>Scan KTP</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-4 mb-4">
                                                <a href="/uploads/persyaratan-permohonan/surat-permohonan.pdf"
                                                    target="_blank">

                                                    <div style="height:10rem;background-image: url('http://127.0.0.1:8000/assets/img/portfolio/thumbnails/4.jpg');background-size:cover;"
                                                        class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;"
                                                            width="100%" class="col text-light p-3 ">
                                                            <h5>Scan KK</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-4 mb-4">
                                                <a href="/assets/img/pasar-gede.png" target="_blank">
                                                    <div style="height:10rem;background-image: url('http://127.0.0.1:8000/assets/img/portfolio/thumbnails/5.jpg');background-size:cover;"
                                                        class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;"
                                                            width="100%" class="col text-light p-3 ">
                                                            <h5>Surat Keterangan Kelurahan</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-4 mb-4">
                                                <a href="/assets/img/pasar-gede.png" target="_blank">
                                                    <div style="height:10rem;background-image: url('http://127.0.0.1:8000/assets/img/portfolio/thumbnails/6.jpg');background-size:cover;"
                                                        class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;"
                                                            width="100%" class="col text-light p-3 ">
                                                            <h5>Tagihan Sekolah</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status
                                                Permohonan</label>
                                            <div class="selectgroup col-md-4 col-sm-12">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="transportation" value="1"
                                                        class="selectgroup-input" checked="">
                                                    <span
                                                        class="selectgroup-button selectgroup-button-icon">Diterima</i></span>
                                                </label>
                                                <style>
                                                .selectgroup-input.denied:checked+.selectgroup-button {
                                                    background-color: red;
                                                    color: #ffffff;
                                                }
                                                </style>
                                                <label class="selectgroup-item">
                                                    <input selected type="radio" name="transportation" value="2"
                                                        class="selectgroup-input denied">
                                                    <span
                                                        class="selectgroup-button selectgroup-button-icon">Ditolak</span>
                                                </label>
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