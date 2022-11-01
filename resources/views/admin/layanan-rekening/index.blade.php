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
                        <h1>Halaman Daftar Rekening</h1>
                    </div>
                    <a href="{{ url('admin/layanan/rekening/add') }}" class="btn btn-success mb-1"><i class="fa fa-plus"
                            aria-hidden="true"></i> Input Rekening </a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12" style="width: 100%;">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Rekening</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('status') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" width="3%">No</th>
                                                        <th scope="col">Gambar</th>
                                                        <th scope="col">Nomor Rekening</th>
                                                        <th scope="col" width="15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($rek as $g)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>
                                                            <img src="{{ asset($g->image) }}" alt=""
                                                                style="height: 5rem; ">
                                                        </td>
                                                        <td>{{ $g->no_rek }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/layanan/rekening/'.$g->id.'/edit') }}"
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href="{{ url('admin/layanan/rekening/'.$g->id.'/delete') }}"
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{-- {{ $rek->links() }} --}}
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