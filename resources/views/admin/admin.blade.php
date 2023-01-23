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
                    <!-- <div class="section-header">
                        <h1>Halaman Admin</h1>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">{{ auth()->user()->name }}</h2>
                        <p class="section-lead">
                            Selamat Datang di Halaman Admin
                        </p> -->
                    <!-- This is where your code ends -->
                    <!-- </div> -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="hero text-white hero-bg-image hero-bg-parallax"
                                style="background-image: url('assets/gallery/scene.jpg');">
                                <div class="hero-inner">
                                    <h2>Welcome, {{ auth()->user()->name }}!</h2>
                                    <p class="lead">Berkah, Bermanfaat, Berkelanjutan.</p>
                                    <div class="mt-4">
                                        <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                                class="far fa-user"></i> Setup Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Admin</h4>
                                    </div>
                                    <div class="card-body">
                                        10
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Artikel</h4>
                                    </div>
                                    <div class="card-body">
                                        {{$allpost}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Permohonan</h4>
                                    </div>
                                    <div class="card-body">
                                        {{$count_requests}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Penyaluran</h4>
                                    </div>
                                    <div class="card-body">
                                        47
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Latest Post</h4>
                                    <div class="card-header-action">
                                        <a href="/admin/post/artikel" class="btn btn-primary">View All <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Category</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach($posts as $post)
                                                <tr>
                                                    <td>
                                                        {{ $post->title}}
                                                        <div class="table-links">
                                                            <a href="/admin/post/edit/{{$post->id}}">Edit</a>
                                                            <div class="bullet"></div>
                                                            <a target="_blank" href="/post/{{$post->id}}">View</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="font-weight-600"><img
                                                                src="assets/img/avatar/avatar-1.png" alt="avatar"
                                                                width="30" class="rounded-circle mr-1">
                                                            {{$post->author}}</a>
                                                    </td>
                                                    <td><a href="#">
                                                            <?php if ($post->category_id == 1) {
                                                                $post->category_id = 'Uncategorized';
                                                            } elseif ($post->category_id == 2) {
                                                                $post->category_id = 'Artikel';
                                                            } elseif ($post->category_id == 3) {
                                                                $post->category_id = 'Inspirasi';
                                                            } elseif ($post->category_id == 4) {
                                                                $post->category_id = 'Kabar Zakat';
                                                            } ?>
                                                            {{$post->category_id}}
                                                        </a></td>
                                                    <!-- Date -->
                                                    <td>{{date_format($post->created_at,"d F Y")}}</td>
                                                    <td>
                                                        <a href="/admin/post/edit/{{$post->id}}"
                                                            class="btn btn-primary btn-action mr-1"
                                                            data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </td>
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
                                        <i class="far fa-question-circle"></i>
                                    </div>
                                    <h4>{{$count_messages}}</h4>
                                    <div class="card-description">Messages</div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="tickets-list">
                                        @foreach ($messages as $message)
                                        <a href="#" class="ticket-item">
                                            <div class="ticket-title">
                                                <h4>{{$message->message}}</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div>{{$message->name}}</div>
                                                <div class="bullet"></div>
                                                <div class="text-primary">a few days ago</div>
                                            </div>
                                        </a>
                                        @endforeach
                                        <a href="/admin/pesan" class="ticket-item ticket-more">
                                            View All <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                                    <a class="nav-link active show" id="{{$now}}" data-toggle="tab"
                                                        href="#laporan-{{$now}}" role="tab" aria-controls="{{$now}}"
                                                        aria-selected="false">{{$now}}</a>
                                                </li>
                                                @for($i=$now-1; $i >= $last;$i--)
                                                <li class="nav-item">
                                                    <a class="nav-link" id="{{$i}}" data-toggle="tab"
                                                        href="#laporan-{{$i}}" role="tab" aria-controls="{{$i}}"
                                                        aria-selected="true">{{$i}}</a>
                                                </li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <div class="tab-content no-padding" id="myTab2Content">
                                                <div class="tab-pane fade active show" id="laporan-{{$now}}"
                                                    role="tabpanel" aria-labelledby="{{$now}}">
                                                    <h6>Laporan</h6>
                                                    <p>Unduh laporan tahun {{$now}} <a
                                                            href="{{route('export.laporan.tahun',['id' => $now])}}">Di
                                                            sini </a>
                                                    </p>
                                                    <hr>
                                                </div>
                                                @for($i=$now-1; $i >= $last;$i--)
                                                <div class="tab-pane fade" id="laporan-{{$i}}" role="tabpanel"
                                                    aria-labelledby="{{$i}}">
                                                    <h6>Laporan</h6>
                                                    <p>Unduh laporan tahun {{$i}} <a
                                                            href="{{route('export.laporan.tahun',['id' => $i])}}">Di
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
                                                    <a class="nav-link active show" id="home-tab4" data-toggle="tab"
                                                        href="#home4" role="tab" aria-controls="home"
                                                        aria-selected="false">
                                                        {{date("F", mktime(0, 0, 0, $thisMonth, 10))}}</a>
                                                </li>
                                                @for($m = $thisMonth-1; $m>=1; $m--) <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                        href="#bulan-{{$m}}" role=" tab" aria-controls="profile"
                                                        aria-selected="true">
                                                        {{date("F", mktime(0, 0, 0, $m, 10))}}
                                                    </a>
                                                </li>
                                                @endfor

                                            </ul>
                                        </div>
                                        <div class=" col-12 col-sm-12 col-md-8">
                                            <div class="tab-content no-padding" id="myTab2Content">
                                                <?php $id = 1; ?>
                                                <div class="tab-pane fade active show" id="home4" role="tabpanel"
                                                    aria-labelledby="home-tab4">
                                                    Unduh laporan bulan
                                                    {{date("F", mktime(0, 0, 0, $thisMonth, 10))}} tahun
                                                    {{$now}} <a
                                                        href="{{route('export.laporan.bulan',['id' => $thisMonth])}}">Di
                                                        sini</a>
                                                </div>
                                                @for($m = $thisMonth; $m>=1; $m--) <div class="tab-pane fade"
                                                    id="bulan-{{$m}}" role=" tabpanel" aria-labelledby="profile-tab4">
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

</html>