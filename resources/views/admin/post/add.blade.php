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
                                    <!-- <div class="card-header">
                                        <h4>Add Post</h4>
                                    </div> -->
                                    <div class="card-body">
                                        <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="title">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select type="select" class="form-control" name="category">
                                                        @php
                                                        @foreach ($category as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea style="height: 150px;" name="content" class="form-control summernote-simple"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                                <div class="col">
                                                    <span class="badge badge-primary" for="image-upload">Filename</span>
                                                    <div>Jenis file: jpg, png, jpeg</div>
                                                    <div class="image-preview" height="100%">
                                                        <label class="bagde badge-pill" for="image-upload" id="image-label" style="opacity: 85%; background-color: #6777ef;">Pilih File</label>
                                                        <input type="file" name="image" id="image-upload">
                                                        <img src="" id="image-preview" width="100%" height="auto" hidden="true">
                                                    </div>
                                                    @error('image')
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

    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
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
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>