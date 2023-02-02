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
                    <a href="{{ route('add.permohonan-bantuan') }}" class="btn btn-success mb-4"><i class="fa fa-plus" aria-hidden="true"></i>
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
                                        <div class="table-responsive px-3">
                                            <table class="table table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col" width="">Jenis Program</th>
                                                        <th scope="col" width="">Tanggal</th>
                                                        <th scope="col" style="width: 5%">Status</th>
                                                        <th>Action</th>
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
                                                        <td>{{$req->created_at}}</td>
                                                        <td>
                                                            @if($req->status == 'VALID')
                                                            <span class="badge badge-info">{{$req->status}}</span>
                                                            @endif
                                                            @if($req->status == 'INVALID')
                                                            <span class="badge badge-danger">{{$req->status}}</span>
                                                            @endif
                                                            @if($req->status == 'UNCHECKED')
                                                            <span class="badge badge-warning">{{$req->status}}</span>
                                                            @endif
                                                            @if($req->status == 'ACCEPTED')
                                                            <span class="badge badge-success">{{$req->status}}</span>
                                                            @endif
                                                            @if($req->status == 'INVESTIGATE')
                                                            <span class="badge badge-info">{{$req->status}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown d-inline">
                                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item has-icon" href="/admin/permohonan/{{$req->id}}"><i class="far fa-eye"></i> Detail</a>
                                                                    <a class="dropdown-item has-icon" href="https://wa.me/{{$req->phone}}" target="_blank"><i class="fas fa-phone"></i> Hubungi</a>
                                                                    <a class="dropdown-item has-icon validasi" href="/admin/pembayaran/validate/{{$req->id}}/VALID" data-id="valid_{{$req->id}}"><i class=" fas fa-check"></i> Valid</a>
                                                                    <a class="dropdown-item has-icon validasi" href="/admin/pembayaran/validate/{{$req->id}}/INVALID" data-id="invalid_{{$req->id}}"><i class=" fas fa-times"></i> Invalid</a>
                                                                    <a class="dropdown-item has-icon delete-request" href="#" data-id="delete_{{$req->id}}"><i class="fas fa-trash"></i> Hapus</a>
                                                                </div>
                                                            </div>
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

<script>
    $(document).on('click', '.delete-request', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        let data = id.split('_');
        Swal.fire({
                title: "",
                text: "Apakah anda yakin ingin menghapus data ini?",
                icon: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya",
                showCancelButton: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    location.assign('permohonan/delete/' + data[1])
                }

            })
    });

    $(document).on('click', '.validasi', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        let data = id.split('_');
        Swal.fire({
                title: "",
                text: "Apakah anda yakin validasi data ini menjadi " + data[0] + "?",
                icon: "info",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya",
                showCancelButton: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    location.assign('permohonan/validate/' + data[1] + '/' + data[0])
                }

            })
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

</html>