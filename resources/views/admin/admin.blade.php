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
                        <h1>Halaman Admin</h1>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">{{ auth()->user()->name }}</h2>
                        <p class="section-lead">
                            Selamat Datang di Halaman Admin
                        </p>
                        <!-- This is where your code ends -->
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
