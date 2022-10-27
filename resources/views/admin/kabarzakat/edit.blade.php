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
                                        <h4>Edit Berita</h4>
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
                                        <form action="{{ url('admin/kabarzakat/update/'.$kabarzakat->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{ $kabarzakat->gambar }}">
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="judul" value="{{ $kabarzakat->judul }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea style="height: 150px;" name="deskripsi" class="form-control summernote-simple">{{ $kabarzakat->deskripsi }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="file" class="form-control" name="gambar" >
                                                    <img src="{{ asset($kabarzakat->gambar) }}" alt=""
                                                        style="height: 200px; width:400px;" class="mt-4">
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
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>

</html>
