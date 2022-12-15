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
                    <a href="{{ route('add.permohonan-bantuan') }}" class="btn btn-success mb-4"><i class="fa fa-plus"
                            aria-hidden="true"></i>
                        Tambah Permohonan </a>
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
                                                        <th scope="col" width="">Jenis Program</th>
                                                        <th scope="col" width="">Tanggal</th>
                                                        <th scope="col" style="width: 5%">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach($data as $req)
                                                    <tr>
                                                        <th scope="row">{{$no++}}</th>
                                                        <td><a href="/admin/permohonan/{{$req->id}}">{{$req->name}}</a>
                                                        </td>
                                                        <td>{{$programs}}</td>
                                                        <td>{{$req->date}}</td>
                                                        <td>
                                                            <span class="badge badge-warning">Diajukan</span>
                                                            <!-- <span class="badge badge-success">Aktif</span> -->
                                                            <!-- <span class="badge badge-danger">Nonaktif</span> -->
                                                        </td>
                                                    </tr>
                                                    @endforeach
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