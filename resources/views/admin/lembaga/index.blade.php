<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.stisla.head')
</head>

<body>
    <div class="response" data-title="<?= session()->get('title') ?>" data-message="<?= session()->get('message') ?>" data-status="<?= session()->get('status') ?>"></div>

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
                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Input Lembaga </button>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Lembaga</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @elseif (session('danger'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ session('danger') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive px-3">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th style="width: 5%">No</th>
                                                        <th style="width: 10%">Kode</th>
                                                        <th style="width: 15%">Nama Lembaga</th>
                                                        <th style="width: 15%">Tipe</th>
                                                        <th style="width: 15%">Terakhir Diubah</th>
                                                        <th style="width: 15px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($lembaga as $l)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td id="value_code_{{$l->code}}">{{ $l->code}}</td>
                                                        <td id="value_name_{{$l->code}}">{{ $l->name}}</td>
                                                        <td id="value_type_{{$l->code}}">{{ $l->type}}</td>
                                                        <td><span class="badge badge-primary badge-sm"><i class="fas fa-calendar"></i> {{datefmt_format($fmt_date, $l->updated_at)}} - <i class="fas fa-clock"></i> {{datefmt_format($fmt_time, $l->updated_at)}}</span></td>
                                                        <td>
                                                            <button class="btn btn-transparent text-center text-dark edit-lembaga" id="{{$l->code}}">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </button>
                                                            <button class="btn btn-transparent text-center text-dark delete-lembaga" data-id="delete_{{$l->code}}">
                                                                <i class="fas fa-trash-alt fa-2x"></i>
                                                            </button>
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
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lembaga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('store.lembaga') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="code">Kode Lembaga</label>
                                <input class="form-control" type="text" name="code" id="code" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Lembaga</label>
                                <input class="form-control" type="text" name="name" id="name" autocomplete="off" required>
                            </div>
                            <div class="form-group col mb-3">
                                <label class="row" for="type">Tipe</label>
                                <div class="row">
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="PEMBAYAR" class="selectgroup-input" required>
                                            <span class="selectgroup-button btn-outline">PEMBAYAR</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="PENERIMA" class="selectgroup-input" required>
                                            <span class="selectgroup-button btn-outline">PENERIMA</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="PEMBAYAR_PENERIMA" class="selectgroup-input" required>
                                            <span class="selectgroup-button btn-outline">PEMBAYAR_PENERIMA</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lembaga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('update.lembaga') }}" method="POST">
                            @csrf
                            <input class="form-control" type="hidden" name="code" id="code_value" autocomplete="off">
                            <div class="form-group">
                                <label for="code">Kode Lembaga</label>
                                <input class="form-control" type="text" name="new_code" id="new_code_value" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Lembaga</label>
                                <input class="form-control" type="text" name="name" id="name_value" autocomplete="off" required>
                            </div>
                            <div class="form-group col mb-3">
                                <label class="row" for="type">Tipe</label>
                                <div class="row">
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="PEMBAYAR" class="selectgroup-input" data-type-value="PEMBAYAR" required>
                                            <span class="selectgroup-button btn-outline">PEMBAYAR</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="PENERIMA" class="selectgroup-input" data-type-value="PENERIMA" required>
                                            <span class="selectgroup-button btn-outline">PENERIMA</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type" value="PEMBAYAR_PENERIMA" class="selectgroup-input" data-type-value="PEMBAYAR_PENERIMA" required>
                                            <span class="selectgroup-button btn-outline">PEMBAYAR_PENERIMA</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
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
        $('#myTable').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.edit-lembaga').click(function() {
            let code_value = $(this).attr('id');
            let name_value = $('#value_name_' + code_value).html()
            let type_value = $('#value_type_' + code_value).html()
            $('#modal_edit').modal('show')
            $('#code_value').val(code_value)
            $('#new_code_value').val(code_value)
            $('#name_value').val(name_value)
            switch (type_value) {
                case 'PEMBAYAR':
                    $('input[data-type-value="PEMBAYAR"]').attr('checked', true)
                    break;
                case 'PENERIMA':
                    $('[data-type-value="PENERIMA"]').attr('checked', true)
                    break;
                case 'PEMBAYAR_PENERIMA':
                    $('[data-type-value="PEMBAYAR_PENERIMA"]').attr('checked', true)
                    break;
                default:
                    break;
            }

        })
    });
</script>
<script>
    $(document).on('click', '.delete-lembaga', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        let data = id.split('_');
        Swal.fire({
                title: "",
                text: "Apakah anda yakin ingin menghapus data ini?",
                icon: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya",
                showCancelButton: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    location.assign('lembaga/delete/' + data[1])
                }

            })
    });
</script>
<script>
    let title = $(".response").data("title");
    let message = $(".response").data("message");
    let status = $(".response").data("status");
    if (status) {
        Swal.fire(
            title,
            message,
            status
        )
    }
</script>

</html>