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
                        <h1>Tabel Pesan Masyarakat</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12" style="width: 100%;">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h4>Tabel Pesan Masyarakat</h4>
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
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('status') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md align-middle" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama / Email</th>
                                                        <th scope="col">Kategori</th>
                                                        <th scope="col">Pesan</th>
                                                        <th scope="col">Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($message as $r)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>
                                                            <h6 class="m-0 pb-0">{{ $r->name }} </h6><span
                                                                class="text-primary d-block">{{$r->email}}</span>
                                                        </td>
                                                        <td>{{ $r->kategori }}</td>
                                                        <td>{{ $r->message }}</td>
                                                        <td>{{ $r->created_at }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
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