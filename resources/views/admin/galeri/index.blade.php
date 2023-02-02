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
                        <h1>{{$title}}</h1>
                    </div>
                    <a href="{{ route('add.galeri') }}" class="btn btn-success mb-4"><i class="fa fa-plus" aria-hidden="true"></i> Input Galeri </a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12" style="width: 100%;">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h4>Tabel Galeri</h4>
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

                                        <div class="row">
                                            @foreach ($galeri as $g)
                                            <div style="height:10rem" class="card shadow-none  px-3 col-3">
                                                @foreach (explode('|', $g->gambar) as $image)
                                                <a href="{{ url('admin/galeri/edit/'.$g->id) }}">
                                                    <div style="height:10rem;background-image: url('{{ asset($image) }}');background-size:cover;" class="card-body container ml-1 p-0 rounded row align-items-end ">
                                                        <div style="background-color:red;background: linear-gradient(0deg, rgba(2,0,36,1), rgba(2,0,36,0.6197829473586309), rgba(2,0,36,0));height:3.4rem;" width="100%" class="col text-light p-3 ">
                                                            <h5>
                                                                <?= $g->judul ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach
                                            </div>
                                            @endforeach
                                        </div>


                                        <div class="table-responsive px-3">
                                            <table class="table table-striped" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scrope="col" width="5%">No</th>
                                                        <th scrope="col" width="15%">Judul</th>
                                                        <th scrope="col" width="35%">Gambar</th>
                                                        <th scrope="col" width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($galeri as $g)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $g->judul }}</td>
                                                        <td>
                                                            @foreach (explode('|', $g->gambar) as $image)
                                                            <img src="{{ asset($image) }}" alt="" style="height: 40px; width:70px;">
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('admin/galeri/edit/'.$g->id) }}" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href="{{ url('admin/galeri/delete/'.$g->id) }}" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $galeri->links() }}
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