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
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Update Data Laporan Zis</h4>
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
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form action="{{ url('admin/data-zis/edit/'.$data->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label for="zis"
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih
                                                    Kategori</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control" id="zis" name="kategori">
                                                        <option value="">Pilih Kategori Zis</option>
                                                        @foreach ($category as $c)
                                                        <option value="{{$c->id}}"
                                                            {{ $c->id == $data->kategori ? 'selected' : '' }}>
                                                            {{$c->display}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" min="0" class="form-control" name="price"
                                                        value="{{ $data->price }}">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" min="0" class="form-control"
                                                        value="{{ $data->created_at }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
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

</html>