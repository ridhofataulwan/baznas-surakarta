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
                    <a href="{{ route('add.pembayaran') }}" class="btn btn-success mb-4"><i class="fa fa-plus" aria-hidden="true"></i>
                        Input Pembayaran</a>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive px-3">
                                            <table class="table table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Pembayaran</th>
                                                        <th>Tanggal</th>
                                                        <th>Besaran</th>
                                                        <th>Status</th>
                                                        <th>Valid</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach($data as $pay)
                                                    <tr>
                                                        <th scope="row">{{$no++}}</th>
                                                        <td><a href="/admin/pembayaran/{{$pay->id}}">{{$pay->name}}</a></td>
                                                        <td>{{$pay->type}}</td>
                                                        <td>
                                                            <a type="button" class="text-primary" tabindex="0" data-toggle="popover" data-trigger="focus" data-content='{{datefmt_format($fmt_date, $pay->created_at)}} - {{datefmt_format($fmt_time, $pay->created_at)}}' data-original-title="Tanggal & Waktu"><i class="fas fa-calendar"></i> {{datefmt_format($fmt_date, $pay->created_at)}}</a>

                                                        </td>
                                                        <td>{{$pay->amount}}</td>
                                                        <td>
                                                            <label class="custom-switch pl-0">
                                                                <input type="checkbox" name="option_{{$pay->id}}" id="option_{{$pay->id}}" value="{{$pay->visible}}" class="custom-switch-input" <?php if ($pay->visible == 'SHOW') {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    } ?>>
                                                                <span class=" custom-switch-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            @if($pay->valid == 'VALID')
                                                            <span class="badge badge-success">{{$pay->valid}}</span>
                                                            @endif
                                                            @if($pay->valid == 'INVALID')
                                                            <span class="badge badge-danger">{{$pay->valid}}</span>
                                                            @endif
                                                            @if($pay->valid == 'UNCHECKED')
                                                            <span class="badge badge-warning">{{$pay->valid}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <!-- <a href="" class="btn btn-transparent text-center text-dark">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </a>
                                                            <button class="btn btn-transparent text-center text-dark delete-payment"">
                                                                <i class=" fas fa-trash-alt fa-2x"></i>
                                                            </button>
                                                            <a href="/admin/pembayaran/validate/{{$pay->id}}/VALID" class="btn btn-success text-center text-dark">
                                                                <i class="fas fa-check fa-2x"></i>
                                                            </a>
                                                            <a href="/admin/pembayaran/validate/{{$pay->id}}/INVALID" class="btn btn-danger text-center text-dark">
                                                                <i class="fas fa-times fa-2x"></i>
                                                            </a> -->
                                                            <div class="dropdown d-inline">
                                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item has-icon" href="/admin/pembayaran/{{$pay->id}}"><i class="far fa-eye"></i> Detail</a>
                                                                    <a class="dropdown-item has-icon" href="https://wa.me/{{$pay->phone}}" target="_blank"><i class="fas fa-phone"></i> Hubungi</a>
                                                                    <a class="dropdown-item has-icon validasi" href="/admin/pembayaran/validate/{{$pay->id}}/VALID" data-id="valid_{{$pay->id}}"><i class=" fas fa-check"></i> Valid</a>
                                                                    <a class="dropdown-item has-icon validasi" href="/admin/pembayaran/validate/{{$pay->id}}/INVALID" data-id="invalid_{{$pay->id}}"><i class=" fas fa-times"></i> Invalid</a>
                                                                    <a class="dropdown-item has-icon delete-payment" href="#" data-id="delete_{{$pay->id}}"><i class="fas fa-trash"></i> Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script type="text/javascript">
    // Set Visibility
    $(document).on('change', '.custom-switch-input', function() {
        let visibility = $(this).val();
        let payment_id = $(this).attr('id');
        payment_id = payment_id.split("_");
        let id = payment_id[1]
        console.log(id);
        console.log(visibility);
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/payment/set-visibility",
                method: 'POST',
                data: {
                    id: id,
                    visibility: visibility,
                },
                success: function(response) {
                    console.log(response);
                }
            })
        });
    })
</script>

<script>
    // Custom File Namme
    function fileName(obj) {
        console.log(obj.value);
        let fullPath = obj.value
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            console.log(filename);
            $("[for='" + obj.id + "']").html(filename)
        }
    }

    // Use Function
    $("[type='file']").change(function() {
        console.log(this);
        fileName(this)
    })
</script>
<script>
    $(document).on('click', '.delete-payment', function(e) {
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
                    location.assign('pembayaran/delete/' + data[1])
                }

            })
    });

    $(document).on('click', '.validasi', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        let data = id.split('_');
        Swal.fire({
                title: "",
                text: "Apakah anda yakin validasi data ini menjadi " + data[0] + "?",
                icon: "info",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya",
                showCancelButton: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    location.assign('pembayaran/validate/' + data[1] + '/' + data[0])
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