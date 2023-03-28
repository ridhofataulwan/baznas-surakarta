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
                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Input File </button>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel File</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                                        @if (session('error'))
                                        <div class="alert alert-error alert-dismissible fade show" role="alert">
                                            <strong>{{ session('error') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive px-3">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col">Nama File</th>
                                                        <th scope="col">Nama Dokumen</th>
                                                        <th scope="col" style="width: 15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($file as $f)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td id="value_{{$f->id}}">{{ $f->name }}</td>
                                                        <td id="value_{{$f->id}}">{{ $f->filename }}</td>
                                                        <td>
                                                            <a href="{{ url('uploads/unduhan/'.$f->filename) }}" target="_blank" class="btn btn-transparent text-center text-dark" \>
                                                                <i class="fas fa-eye fa-2x"></i>
                                                            </a>
                                                            <button class="btn btn-transparent text-center text-dark edit-file" id="{{$f->id}}">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </button>
                                                            <a href="{{ url('admin/file/delete/'.$f->id) }}" class="btn btn-transparent text-center text-dark">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('store.file') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Nama File</label>
                            <input class="form-control" type="text" name="name" id="name" autocomplete="off">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <span class="badge badge-primary mt-2" for="image-upload">Filename</span>
                            <div>Jenis file: pdf, doc, docx, xls</div>
                            <div class="image-preview">
                                <label class="bagde badge-pill" for="image-upload" id="image-label" style="opacity: 85%; background-color: #6777ef;">Pilih File</label>
                                <input type="file" name="file" id="image-upload">
                            </div>
                            @error('file')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('update.file') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Nama File</label>
                            <input class="form-control" type="text" name="id" autocomplete="off" id="id_value" hidden>
                            <input class="form-control" type="text" name="name" autocomplete="off" id="file_value">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <span class="badge badge-primary mt-2" for="image-upload">Filename</span>
                            <div>Jenis file: pdf, doc, docx, xls</div>
                            <div class="image-preview">
                                <label class="bagde badge-pill" for="image-upload" id="image-label" style="opacity: 85%; background-color: #6777ef;">Pilih File</label>
                                <input type="file" name="file" id="image-upload">
                            </div>
                            @error('file')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.stisla.script')
</body>
<script>
    $(document).ready(function() {
        $('#').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.edit-file').click(function() {
            let id = $(this).attr('id');
            let modal_value = $('#value_' + id).html()
            $('#modal_edit').modal('show')
            $('#id_value').val(id)
            $('#file_value').val(modal_value)
        })
    });
</script>
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

</html>