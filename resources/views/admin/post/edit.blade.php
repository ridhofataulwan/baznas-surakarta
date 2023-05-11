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
                                        <form action="{{ url('admin/post/update/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{ $post->image }}">
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select type="select" class="form-control" name="category">
                                                        @php
                                                        @foreach ($categories as $c)
                                                        @if($category->category_id == $c->id)
                                                        <option selected value="{{ $c->id }}">{{ $c->name }}
                                                        </option>
                                                        @else
                                                        <option value="{{ $c->id }}">{{ $c->name }}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea style="height: 150px;" name="content" class="form-control summernote-simple">{{ $post->content }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col">
                                                    <div class="row-sm-12 row-md-4">
                                                        <span class="badge badge-primary" for="image-upload" id="file-name">Filename</span>
                                                        <span class="badge badge-primary" id="modal-image-trigger" style="cursor: pointer;"><i class="far fa-eye"></i> Lihat Gambar</span>
                                                        <div>Jenis file: jpg, png, jpeg</div>
                                                    </div>
                                                    <div class="row-sm-12 row-md-4" id="image-edit">
                                                        <div class="image-preview" height="100%">
                                                            <label class="bagde badge-pill" for="image-upload" id="image-label" style="opacity: 85%; background-color: #6777ef;">Pilih File</label>
                                                            <input type="file" name="image[]" id="image-upload" value="/{{$post->image}}" multiple>
                                                            <img src="/{{$post->image}}" id="image-preview" width="100%" height="auto">
                                                        </div>
                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
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

    <!-- Image Modal For Detail -->
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="image-modal-label">{{$post->title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modal-body" src="" width="100%" height="auto">
                </div>
            </div>
        </div>
    </div>
    @include('admin.stisla.script')
    <script>
        CKEDITOR.replace('content');
    </script>

    <!-- Jquery for Image Upload and Image Preview -->
    <script>
        $(document).ready(() => {

            let filename = $("#image-preview").attr('src');
            filename = filename.split('/')
            $("#file-name").html(filename[3])
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
    </script>

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

    <!-- Jquery for modal detail Image -->
    <script>
        $("#modal-image-trigger").click(function() {
            let src = $("#image-preview").attr('src');
            $("#image-modal").modal("show");
            $("#modal-body").attr("src", src);
        });
    </script>
</body>

</html>