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
                        <h1>Statistik</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Pembayaran</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Pendistribusian</h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Permohonan</h5>
                                    </div>
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

</html>