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
                        <h1>Tabel Permohonan Bantuan</h1>
                    </div>
                    <a href="{{ route('add.post') }}" class="btn btn-success mb-4"><i class="fa fa-plus"
                            aria-hidden="true"></i> Tambah Permohonan </a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col" width="">Jenis Bantuan</th>
                                                        <th scope="col" width="">Tanggal</th>
                                                        <th scope="col" style="width: 5%">Status</th>
                                                        <th scope="col" style="width: 15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp

                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><a href="/admin/permohonan/BAP30122002001">Rizky
                                                                Joanditya</a></td>
                                                        <td>Pendidikan</td>
                                                        <td>Senin, 12 Oktober 2022</td>
                                                        <td>
                                                            <span class="badge badge-warning">Diajukan</span>
                                                            <!-- <span class="badge badge-success">Aktif</span> -->
                                                            <!-- <span class="badge badge-danger">Nonaktif</span> -->
                                                        </td>
                                                        <td>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td><a href="/admin/permohonan/BAP30122002002">Ridho Fata
                                                                Ulwan</a></td>
                                                        <td>Ekonomi Produktif</td>
                                                        <td>Rabu, 9 September 2022</td>
                                                        <td>
                                                            <!-- <span class="badge badge-warning">Diajukan</span> -->
                                                            <span class="badge badge-success">Diterima</span>
                                                            <!-- <span class="badge badge-danger">Nonaktif</span> -->
                                                        </td>
                                                        <td>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td><a href="/admin/permohonan/BAP30122002003">Nizam</a></td>
                                                        <td>Adovkasi Dakwah</td>
                                                        <td>Kamis, 29 Agustus 2022</td>
                                                        <td>
                                                            <!-- <span class="badge badge-warning">Diajukan</span> -->
                                                            <!-- <span class="badge badge-success">Diterima</span> -->
                                                            <span class="badge badge-danger">Ditolak</span>
                                                        </td>
                                                        <td>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                            </table>

                                        </div>
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