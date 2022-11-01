<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.stisla.head')
</head>

<body>
    <div id="app">
        <section class="section">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ $error }}
                </div>
            </div>
            @endforeach
            @endif
            @if (session('status'))
            <div class="alert alert-info alert-dismissible show fade">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('status') }}
                </div>
            </div>
            @endif
            <div class="d-flex flex-wrap align-items-stretch justify-content-start">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-1 bg-white">
                    <div class="p-4 m-3">
                        <div class="text-center">
                            <a href="/" style="font-family: Arial; font-weight:bold; font-size: 1.7em; color: #01502D; text-decoration:none;"><img style="width: 3em;" src="{{url('/assets/img/portfolio/logo/logo3.png')}}">
                                BAZNAS</a>
                        </div>
                        <h4 class="text-dark font-weight-normal mt-5">Welcome to <span class="font-weight-bold">Login
                                Panel Baznas</span>
                        </h4>
                        {{-- <p class="text-muted">Before you get started, you must login or register if you don't already
                            have an account.</p> --}}
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="float-left mt-3">
                                    Forgot Password?
                                </a>
                                @endif
                                <button type="submit" class="btn btn-success btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; Baznas. Made with 💚 by SV UNS
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12 order-lg-2 order-2 min-vh-100 background-walk-x overlay" style="width: 100%;
        background: url('assets/img/korosel4.png') no-repeat center;
       background-size: cover;">
                </div>
            </div>
        </section>
    </div>

    @include('admin.stisla.script')
</body>

</html>