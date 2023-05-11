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
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tambah Berita</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('store.galeri') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="judul">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col">
                                                    <span class="badge badge-primary" for="image-upload">Filename</span>
                                                    <div>Jenis file: jpg, png, jpeg</div>
                                                    <div class="image-preview" height="100%">
                                                        <label class="bagde badge-pill" for="image-upload" id="image-label" style="opacity: 85%; background-color: #6777ef;">Pilih File</label>
                                                        <input type="file" name="gambar" id="image-upload">
                                                        <img src="" id="image-preview" width="100%" height="auto" hidden="true">
                                                    </div>
                                                    @error('gambar')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
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

    <!-- Script for image upload preview -->
    <script>
        $(document).ready(() => {
            $("#image-upload").change(function() {
                const file = this.files[0];
                if (file) {
                    $("#file-name").html(file.name).removeAttr("hidden");
                    $("#image-file").attr("hidden", true);
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#image-preview").attr("src", event.target.result).removeAttr("hidden");
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        $("[type='file']").change(function() {
            var file = this.files[0].name;
            $("[for='" + this.id + "']").html(file);
        });

        function fileName(obj) {
            var file = obj.value.split(/(\\|\/)/g).pop();
            $("[for='" + obj.id + "']").html(file);
        }

        // Use Function
        $("[type='file']").change(function() {
            fileName(this)
        })
    </script>

</body>

</html>