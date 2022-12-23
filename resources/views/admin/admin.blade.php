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
                                        <h4>News</h4>
                                    </div>
                                    <div class="card-body">
                                        42
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
                                    <h4>Invoices</h4>
                                    <div class="card-header-action">
                                        <a href="#" class="btn btn-primary">View More <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <th>Customer</th>
                                                    <th>Status</th>
                                                    <th>Due Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">INV-87239</a></td>
                                                    <td class="font-weight-600">Kusnadi</td>
                                                    <td>
                                                        <div class="badge badge-warning">Unpaid</div>
                                                    </td>
                                                    <td>July 19, 2018</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">INV-48574</a></td>
                                                    <td class="font-weight-600">Hasan Basri</td>
                                                    <td>
                                                        <div class="badge badge-success">Paid</div>
                                                    </td>
                                                    <td>July 21, 2018</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">INV-76824</a></td>
                                                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                                    <td>
                                                        <div class="badge badge-warning">Unpaid</div>
                                                    </td>
                                                    <td>July 22, 2018</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">INV-84990</a></td>
                                                    <td class="font-weight-600">Agung Ardiansyah</td>
                                                    <td>
                                                        <div class="badge badge-warning">Unpaid</div>
                                                    </td>
                                                    <td>July 22, 2018</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">INV-87320</a></td>
                                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                                    <td>
                                                        <div class="badge badge-success">Paid</div>
                                                    </td>
                                                    <td>July 28, 2018</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
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
                        <div class="col-12 col-sm-5 col-lg-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Laporan Tahunan Baznas Surakarta</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="home-tab3" data-toggle="tab"
                                                        href="#home" role="tab" aria-controls="home"
                                                        aria-selected="false">2021</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                        href="#profile" role="tab" aria-controls="profile"
                                                        aria-selected="true">2020</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab4" data-toggle="tab"
                                                        href="#contact" role="tab" aria-controls="contact"
                                                        aria-selected="false">2019</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab4" data-toggle="tab"
                                                        href="#about" role="tab" aria-controls="contact"
                                                        aria-selected="false">2018</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab4" data-toggle="tab"
                                                        href="#section" role="tab" aria-controls="contact"
                                                        aria-selected="false">2017</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <div class="tab-content no-padding" id="myTab2Content">
                                                <div class="tab-pane fade active show" id="home" role="tabpanel"
                                                    aria-labelledby="home-tab4">
                                                    <h6>Pendistribusian</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto
                                                        repudiandae minima quod, asperiores porro ad dolores
                                                        perferendis, aliquam deserunt omnis numquam, inventore ducimus
                                                        tempora commodi deleniti ex reiciendis nam vel!</p>
                                                    <hr>
                                                    <h6>Penerimaan</h6>
                                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla
                                                        quidem, culpa adipisci reiciendis quam atque quisquam
                                                        reprehenderit ex tempore quas sit sed facere quia consectetur
                                                        dolores, earum facilis recusandae rerum.</p>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                                    aria-labelledby="profile-tab4">
                                                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit
                                                    tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat,
                                                    sed fermentum justo rutrum ultrices. Proin quis iaculis tellus.
                                                    Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis
                                                    neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a
                                                    mattis velit. Donec hendrerit venenatis justo, eget scelerisque
                                                    tellus pharetra a.
                                                </div>
                                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                                    aria-labelledby="contact-tab4">
                                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                                    maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit
                                                    eget mauris. Pellentesque fermentum, sem interdum molestie finibus,
                                                    nulla diam varius leo, nec varius lectus elit id dolor. Nam
                                                    malesuada orci non ornare vulputate. Ut ut sollicitudin magna.
                                                    Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum
                                                    bibendum augue ut luctus.
                                                </div>
                                                <div class="tab-pane fade" id="about" role="tabpanel"
                                                    aria-labelledby="contact-tab4">
                                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                                    maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit
                                                    eget mauris. Pellentesque fermentum, sem interdum molestie finibus,
                                                    nulla diam varius leo, nec varius lectus elit id dolor. Nam
                                                    malesuada orci non ornare vulputate. Ut ut sollicitudin magna.
                                                    Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum
                                                    bibendum augue ut luctus.
                                                </div>
                                                <div class="tab-pane fade" id="section" role="tabpanel"
                                                    aria-labelledby="contact-tab4">
                                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                                    maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit
                                                    eget mauris. Pellentesque fermentum, sem interdum molestie finibus,
                                                    nulla diam varius leo, nec varius lectus elit id dolor. Nam
                                                    malesuada orci non ornare vulputate. Ut ut sollicitudin magna.
                                                    Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum
                                                    bibendum augue ut luctus.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-lg-7">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Laporan Penyaluran Tahun 2022</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="home-tab4" data-toggle="tab"
                                                        href="#home4" role="tab" aria-controls="home"
                                                        aria-selected="false">Desember</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                        href="#profile4" role="tab" aria-controls="profile"
                                                        aria-selected="true">November</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab4" data-toggle="tab"
                                                        href="#contact4" role="tab" aria-controls="contact"
                                                        aria-selected="false">Oktober</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <div class="tab-content no-padding" id="myTab2Content">
                                                <div class="tab-pane fade active show" id="home4" role="tabpanel"
                                                    aria-labelledby="home-tab4">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                    veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                    esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                    cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est
                                                    laborum.
                                                </div>
                                                <div class="tab-pane fade" id="profile4" role="tabpanel"
                                                    aria-labelledby="profile-tab4">
                                                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit
                                                    tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat,
                                                    sed fermentum justo rutrum ultrices. Proin quis iaculis tellus.
                                                    Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis
                                                    neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a
                                                    mattis velit. Donec hendrerit venenatis justo, eget scelerisque
                                                    tellus pharetra a.
                                                </div>
                                                <div class="tab-pane fade" id="contact4" role="tabpanel"
                                                    aria-labelledby="contact-tab4">
                                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                                    maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit
                                                    eget mauris. Pellentesque fermentum, sem interdum molestie finibus,
                                                    nulla diam varius leo, nec varius lectus elit id dolor. Nam
                                                    malesuada orci non ornare vulputate. Ut ut sollicitudin magna.
                                                    Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum
                                                    bibendum augue ut luctus.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Latest Posts</h4>
                                    <div class="card-header-action">
                                        <a href="#" class="btn btn-primary">View All</a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                    <td>
                                                        <a href="/admin/post/edit/{{$post->id}}"
                                                            class="btn btn-primary btn-action mr-1"
                                                            data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a class="btn btn-danger btn-action trigger--fire-modal-1"
                                                            data-toggle="tooltip" title=""
                                                            data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                            data-confirm-yes="alert('Deleted')"
                                                            data-original-title="Delete"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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