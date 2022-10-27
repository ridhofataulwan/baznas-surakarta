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
                        <h1>Admin Page</h1>
                    </div>
                    <div class="form-group col-md-4 col-12 col-sm-12 col-lg-4">
                        <label for="zis">Pilih Kategori</label>
                        <select class="form-control" id="zis">
                            <option value="" selected>Pilih Kategori Zis</option>
                            @foreach ($category as $c)
                                <option value="{{$c->id}}">{{$c->display}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Laporan Data Zis</h4>
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col">Kategori</th>
                                                        <th scope="col" width="">Nominal</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="resultzis">
                                                    @foreach ($data as $b)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $b->category->display }}</td>
                                                        <td>{{ $b->price }}</td>
                                                        <td>
                                                            {{$b->created_at}}
                                                        </td>
                                                        <td>

                                                            <a href="{{ url('admin/data-zis/edit/'.$b->id) }}"
                                                                class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <a  href="{{ url('admin/data-zis/delete/'.$b->id) }}"
                                                                class="btn btn-transparent text-center text-dark" >
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                        </td>
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
    <script>
        $(document).ready(function () {
            $(document).on('change', '#zis', function () {
                var data = $('#zis').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/data-zis-ajax') }}",
                    method: 'POST',
                    data: {
                        id: data,
                    },
                    success: function (response) {
                        $('#resultzis').html(response);
                    }
                })
            });
        });
    </script>
</body>
</html>
