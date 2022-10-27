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
                        <h1>Halaman Daftar Pembayar Zakat</h1>
                    </div>
                    {{-- <a href="{{ url('admin/layanan/rekening/add') }}" class="btn btn-success mb-1"><i class="fa fa-plus" aria-hidden="true"></i> Input Rekening </a> --}}
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12" style="width: 100%;">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Pembayar Zakat</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('status') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Jenis Zakat
                                                            <select class="form-control form-control-sm" id='filterText' style='display:inline-block' onchange='filterText()'>
                                                                <option value='all' selected>Semua</option>
                                                                <option value='Maal'>Maal</option>
                                                                <option value='Infaq'>Infaq</option>
                                                                <option value='Fitrah'>Fitrah</option>
                                                                <option value='Fidyah'>Fidyah</option>
                                                                <option value='Qurban'>Qurban</option>
                                                            </select>
                                                        </th>
                                                        <th scope="col">No Telp</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Nominal</th>
                                                        <th scope="col">Bukti</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($bayar as $g)
                                                    <tr class="content">
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $g->name }}</td>
                                                        <td>{{ $g->jenis }}</td>
                                                        @php
                                                        $phone = $g->phone;
                                                        if (substr($phone, 0, 2) != "62") {
                                                        $sufix = substr($phone, 1);
                                                        $phone = "62" . $sufix;
                                                        } else if (substr($phone, 0, 2) == "62") {
                                                        $phone = $phone;
                                                        };
                                                        @endphp
                                                        <td><a href="https://wa.me/{{$phone}}" target="_blank">
                                                                {{$g->phone}}
                                                            </a></td>
                                                        <td>{{ $g->email }}</td>
                                                        <td>{{ $g->nominal }}</td>
                                                        <td>
                                                            <img src="{{ asset($g->image) }}" alt="" style="height: 40px; width:70px;">
                                                        </td>
                                                        <td>{{ $g->status }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/layanan/pembayaran/'.$g->id.'/status') }}" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
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

<script>
    function filterText() {
        var rex = RegExp($('#filterText').val());
        console.log(rex);
        if (rex == "/all/") {
            clearFilter()
        } else {
            $('.content').hide();
            $('.content').filter(function() {
                return rex.test($(this).text());
            }).show();
        }
    }

    function clearFilter() {
        $('.filterText').val('');
        $('.content').show();
    }
</script>

</html>