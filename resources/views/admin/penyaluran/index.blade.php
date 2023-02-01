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
                        <h1>Tabel Penyaluran Sedekah</h1>
                    </div>
                    <a href="{{ route('add.penyaluran') }}" class="btn btn-success mb-4"><i class="fa fa-plus" aria-hidden="true"></i>
                        Buat Baru</a>
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
                                        <div class="table-responsive px-3">
                                            <table class="table table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col" width="">Ashnaf</th>
                                                        <th scope="col" width="">Tanggal</th>
                                                        <th scope="col" style="width: 5%">Status</th>
                                                        <th scope="col" style="width: 15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach($data as $distribution)
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><a href="/admin/penyaluran/{{$distribution->id}}">{{$distribution->name}}</a>
                                                        </td>
                                                        <td>{{$distribution->ashnaf}}</td>
                                                        <td>{{date("d F Y",strtotime("$distribution->created_at"))}}
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-warning">Diajukan</span>
                                                            <!-- <span class="badge badge-success">Aktif</span> -->
                                                            <!-- <span class="badge badge-danger">Nonaktif</span> -->
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href="" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                            <a href="" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
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