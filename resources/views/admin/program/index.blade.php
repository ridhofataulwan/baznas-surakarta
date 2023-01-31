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
                        <h1>Program</h1>
                    </div>
                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Input Program </button>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tabel Program</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @elseif (session('danger'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ session('danger') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                                        <div class="table-responsive px-3">
                                            <table class="table table-bordered table-md" id="myTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" style="width: 5%">No</th>
                                                        <th scope="col" style="width: 15%">Nama Program</th>
                                                        <th scope="col" style="width: 5%">CMS</th>
                                                        <th scope="col" style="width: 5%">Permohonan</th>
                                                        <th scope="col" style="width: 5%">Distribusi</th>
                                                        <th scope="col" style="width: 15px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1;
                                                    @endphp
                                                    @foreach ($program as $p)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td id="value_{{$p->id}}">{{ $p->name }}</td>
                                                        <td class="text-center">
                                                            <label class="custom-switch pl-0">
                                                                <input type="checkbox" name="option_cms_{{$p->id}}" id="cms_{{$p->id}}" value="{{ $p->cms }}" class="custom-switch-input" <?php if ($p->cms == 1) {
                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                            } ?>>
                                                                <span class=" custom-switch-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="text-center">
                                                            <label class="custom-switch pl-0">
                                                                <input type="checkbox" name="option_request_{{$p->id}}" id="request_{{$p->id}}" value="{{ $p->request }}" class="custom-switch-input" <?php if ($p->request == 1) {
                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                        } ?>>
                                                                <span class=" custom-switch-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="text-center">
                                                            <label class="custom-switch pl-0">
                                                                <input type="checkbox" name="option_distribution_{{$p->id}}" id="distribution_{{$p->id}}" value="{{ $p->distribution }}" class="custom-switch-input" <?php if ($p->distribution == 1) {
                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                        } ?>>
                                                                <span class=" custom-switch-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-transparent text-center text-dark edit-program" id="{{$p->id}}">
                                                                <i class="fas fa-edit fa-2x"></i>
                                                            </button>
                                                            <a href="{{ url('admin/program/delete/'.$p->id) }}" class="btn btn-transparent text-center text-dark">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('store.program') }}" method="POST">
                            @csrf
                            <label for="name">Nama Program</label>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('update.program') }}" method="POST">
                            @csrf
                            <label for="name">Nama Program</label>
                            <input class="form-control" type="text" name="id" autocomplete="off" id="id_value" hidden>
                            <input class="form-control" type="text" name="name" autocomplete="off" id="program_value">
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
        $('.edit-program').click(function() {
            let id = $(this).attr('id');
            let modal_value = $('#value_' + id).html()
            $('#modal_edit').modal('show')
            $('#id_value').val(id)
            $('#program_value').val(modal_value)
        })
    });

    // Set State
    $(document).on('change', '.custom-switch-input', function() {
        let state = $(this).val();
        let program_id = $(this).attr('id');
        program_id = program_id.split("_");
        let program = program_id[0]
        let id = program_id[1]
        console.log(id);
        console.log(state);
        console.log(program);
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/program/update-state",
                method: 'POST',
                data: {
                    id: id,
                    state: state,
                    program: program
                },
                success: function(response) {
                    console.log(response);
                }
            })
        });
    })
</script>

</html>