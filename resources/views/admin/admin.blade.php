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
                                        1,201
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
                                        <a href="#" class="btn btn-danger">View More <i
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
                                    <h4>14</h4>
                                    <div class="card-description">Customers need help</div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="tickets-list">
                                        <a href="#" class="ticket-item">
                                            <div class="ticket-title">
                                                <h4>My order hasn't arrived yet</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div>Laila Tazkiah</div>
                                                <div class="bullet"></div>
                                                <div class="text-primary">1 min ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="ticket-item">
                                            <div class="ticket-title">
                                                <h4>Please cancel my order</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div>Rizal Fakhri</div>
                                                <div class="bullet"></div>
                                                <div>2 hours ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="ticket-item">
                                            <div class="ticket-title">
                                                <h4>Do you see my mother?</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div>Syahdan Ubaidillah</div>
                                                <div class="bullet"></div>
                                                <div>6 hours ago</div>
                                            </div>
                                        </a>
                                        <a href="features-tickets.html" class="ticket-item ticket-more">
                                            View All <i class="fas fa-chevron-right"></i>
                                        </a>
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
                                                <tr>
                                                    <td>
                                                        Introduction Laravel 5
                                                        <div class="table-links">
                                                            in <a href="#">Web Development</a>
                                                            <div class="bullet"></div>
                                                            <a href="#">View</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="font-weight-600"><img
                                                                src="assets/img/avatar/avatar-1.png" alt="avatar"
                                                                width="30" class="rounded-circle mr-1"> Bagus Dwi
                                                            Cahya</a>
                                                    </td>
                                                    <td><a href="#">Artikel</a></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            title="" data-original-title="Edit"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a class="btn btn-danger btn-action trigger--fire-modal-1"
                                                            data-toggle="tooltip" title=""
                                                            data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                            data-confirm-yes="alert('Deleted')"
                                                            data-original-title="Delete"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Laravel 5 Tutorial - Installation
                                                        <div class="table-links">
                                                            in <a href="#">Web Development</a>
                                                            <div class="bullet"></div>
                                                            <a href="#">View</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="font-weight-600"><img
                                                                src="assets/img/avatar/avatar-1.png" alt="avatar"
                                                                width="30" class="rounded-circle mr-1"> Bagus Dwi
                                                            Cahya</a>
                                                    </td>
                                                    <td><a href="#">Artikel</a></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            title="" data-original-title="Edit"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a class="btn btn-danger btn-action trigger--fire-modal-2"
                                                            data-toggle="tooltip" title=""
                                                            data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                            data-confirm-yes="alert('Deleted')"
                                                            data-original-title="Delete"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
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