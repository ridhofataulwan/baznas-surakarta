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
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('/assets/gallery/scene.jpg');">
                                <div class="hero-inner">
                                    <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
                                    <p class="lead">Berkah, Bermanfaat, Berkelanjutan.</p>
                                    <!-- <div class="mt-4">
                                        <a href="/statistik" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-file"></i> Lihat Statistik</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pembayaran</h4>
                                    </div>
                                    <div class="card-body">
                                        {{$count['payment']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-hand-holding-heart"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Penyaluran</h4>
                                    </div>
                                    <div class="card-body">
                                        {{$count['distribution']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Permohonan</h4>
                                    </div>
                                    <div class="card-body">
                                        {{$count['request']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pemasukan</h4>
                                    </div>
                                    <div class="card-body">
                                        {{$amount['in']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pengeluaran</h4>
                                    </div>
                                    <div class="card-body">
                                        {{$amount['out']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Transaksi Pembayaran Terkini</h4>
                                    <div class="card-header-action">
                                        <a href="/admin/pembayaran" class="btn btn-primary">View All <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive px-3 table-invoice">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Besaran</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                                @foreach($table['payment'] as $p)
                                                <tr>
                                                    <td><a href="/admin/pembayaran/{{$p->id}}">{{ $p->id}}</a></td>
                                                    <td>{{ $p->name}}</td>
                                                    <td>{{$p->amount}}</td>
                                                    <td>{{$p->type}}</td>
                                                    <td>{{$p->valid}}</td>
                                                    <td>{{$p->created_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Transaksi Penyaluran Terkini</h4>
                                    <div class="card-header-action">
                                        <a href="/admin/pembayaran" class="btn btn-primary">View All <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive px-3 table-invoice">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Besaran</th>
                                                    <th>Kategori</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                                @foreach($table['distribution'] as $d)
                                                <tr>
                                                    <td><a href="/admin/penyaluran/{{$d->id}}">{{ $d->id}}</a></td>
                                                    <td>{{ $d->name}}</td>
                                                    <td>{{$d->amount}}</td>
                                                    <td>{{$d->type}}</td>
                                                    <td>{{$d->created_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-hero">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="far fa-sign-in"></i>
                                    </div>
                                    <h4>{{$saldo['infaq']}}</h4>
                                    <div class="card-description">Saldo Rekening Infaq</div>
                                </div>
                            </div>
                            <div class="card card-hero">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="far fa-sign-out"></i>
                                    </div>
                                    <h4>{{$saldo['zakat']}}</h4>
                                    <div class="card-description">Saldo Rekening Zakat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Laporan Tahunan Baznas Surakarta</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="{{$now}}" data-toggle="tab" href="#laporan-{{$now}}" role="tab" aria-controls="{{$now}}" aria-selected="false">{{$now}}</a>
                                                </li>
                                                @for($i=$now-1; $i >= $last;$i--)
                                                <li class="nav-item">
                                                    <a class="nav-link" id="{{$i}}" data-toggle="tab" href="#laporan-{{$i}}" role="tab" aria-controls="{{$i}}" aria-selected="true">{{$i}}</a>
                                                </li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <div class="tab-content no-padding" id="myTab2Content">
                                                <div class="tab-pane fade active show" id="laporan-{{$now}}" role="tabpanel" aria-labelledby="{{$now}}">
                                                    <h6>Laporan</h6>
                                                    <p>Unduh laporan tahun {{$now}} <a href="{{route('export.laporan.tahun',['id' => $now])}}">Di
                                                            sini </a>
                                                    </p>
                                                    <hr>
                                                </div>
                                                @for($i=$now-1; $i >= $last;$i--)
                                                <div class="tab-pane fade" id="laporan-{{$i}}" role="tabpanel" aria-labelledby="{{$i}}">
                                                    <h6>Laporan</h6>
                                                    <p>Unduh laporan tahun {{$i}} <a href="{{route('export.laporan.tahun',['id' => $i])}}">Di
                                                            sini </a>
                                                    </p>
                                                    <hr>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Laporan Bulanan Tahun {{$now}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="false">
                                                        {{date("F", mktime(0, 0, 0, $thisMonth, 10))}}</a>
                                                </li>
                                                @for($m = $thisMonth-1; $m>=1; $m--) <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#bulan-{{$m}}" role=" tab" aria-controls="profile" aria-selected="true">
                                                        {{date("F", mktime(0, 0, 0, $m, 10))}}
                                                    </a>
                                                </li>
                                                @endfor

                                            </ul>
                                        </div>
                                        <div class=" col-12 col-sm-12 col-md-8">
                                            <div class="tab-content no-padding" id="myTab2Content">
                                                <?php $id = 1; ?>
                                                <div class="tab-pane fade active show" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                                    Unduh laporan bulan
                                                    {{date("F", mktime(0, 0, 0, $thisMonth, 10))}} tahun
                                                    {{$now}} <a href="{{route('export.laporan.bulan',['id' => $thisMonth])}}">Di
                                                        sini</a>
                                                </div>
                                                @for($m = $thisMonth; $m>=1; $m--) <div class="tab-pane fade" id="bulan-{{$m}}" role=" tabpanel" aria-labelledby="profile-tab4">
                                                    Unduh laporan bulan
                                                    {{date("F", mktime(0, 0, 0, $m, 10))}} tahun
                                                    {{$now}} <a href="{{route('export.laporan.bulan',['id' => $m])}}">Di
                                                        sini</a>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </section>
            </div>
            <footer class="main-footer">
                @include('admin.stisla.footer')
            </footer>
        </div>
    </div>

    @include('admin.stisla.script')
    <!-- Swal -->
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
</body>

</html>