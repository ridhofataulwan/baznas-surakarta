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
                        <h1>Kategori Kabar</h1>
                    </div>
                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Input Kategori </button>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Kategori Kabar</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col" style="width: 15%">Nama Kategori</th>
                                                        <th scope="col" style="width: 15px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($category_post as $c)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td id="value_{{$c->id}}">{{ $c->name }}</td>
                                                        <td>
                                                            @if($c->id != 1)
                                                            <button class="btn btn-transparent text-center text-dark edit-category" id="{{$c->id}}">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </button>
                                                            <a href="{{ url('admin/category/delete/'.$c->id) }}" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </a>
                                                            @endif
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('store.category') }}" method="POST">
                            @csrf
                            <label for="name">Nama Kategori</label>
                            <input class="form-control" type="text" name="name" id="name" autocomplete="off">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('update.category') }}" method="POST">
                            @csrf
                            <label for="name">Nama Kategori</label>
                            <input class="form-control" type="text" name="id" autocomplete="off" id="id_value" hidden>
                            <input class="form-control" type="text" name="name" autocomplete="off" id="category_value">
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
        $('.edit-category').click(function() {
            let id = $(this).attr('id');
            let modal_value = $('#value_' + id).html()
            $('#modal_edit').modal('show')
            $('#id_value').val(id)
            $('#category_value').val(modal_value)
        })
    });
</script>

</html>