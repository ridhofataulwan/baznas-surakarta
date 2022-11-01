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
                        <h1>Table <?= $category_name; ?></h1>
                    </div>
                    <a href="{{ route('add.post') }}" class="btn btn-success mb-4"><i class="fa fa-plus"
                            aria-hidden="true"></i> Tambah Post </a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h4>Tabel </?= $category_name ?></h4>
                                    </div> -->
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
                                                        <th scope="col">Judul</th>
                                                        <th scope="col" width="">Deskripsi</th>
                                                        <th scope="col" style="width: 10%">Gambar</th>
                                                        <th scope="col" style="width: 5%">Status</th>
                                                        <th scope="col" style="width: 15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($post as $p)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $p->title }}</td>
                                                        <td>{{ $p->content }}</td>
                                                        <td><img src="{{ asset($p->image) }}" alt=""
                                                                style="height: 40px; width:70px;">
                                                        </td>
                                                        <td style="text-align: center">
                                                            @if ($p->status == 'ACTIVE')
                                                            <span class="badge badge-success">Aktif</span>
                                                            @else
                                                            <span class="badge badge-danger">Nonaktif</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('admin/post/edit/'.$p->id) }}"
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href="{{ url('admin/post/status/'.$p->id) }}"
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                            <a href="{{ url('admin/post/delete/'.$p->id) }}"
                                                                class="btn btn-transparent text-center text-dark">
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