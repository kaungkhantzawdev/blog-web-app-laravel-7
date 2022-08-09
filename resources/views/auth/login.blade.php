<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="icon" href="{{ asset('img/logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('head')
</head>
<body class="bg-light">

<section class="container">
    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-12 col-mg-6 col-lg-5">
            <div class="">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{ asset(\App\Base::$logo) }}" style="width: 50px" alt="">
                </div>
                <div class="card border-0 shadow-sm">
                    <div class="p-4">
                        <h2 class="text-center font-weight-normal font-monospace">Sign In</h2>
                        <p class="text-center text-black-50 mb-5">
                            Don't have an account yet?
                            <a href="{{ route('register') }}" class="text-decoration-none">Sign up here</a>
                        </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label d-flex align-items-center">
                                    <i class="bi bi-envelope text-primary me-3"></i>
                                    Email address
                                </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label d-flex align-items-center">
                                    <i class="bi bi-shield-lock me-3 text-primary"></i>
                                    Password
                                </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="">
                                <button type="submit" class="btn w-100 btn-primary">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="bi bi-arrow-right"></i>
                                        <span class="ms-3 font-monospace">Login</span>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/app.js') }}"></script>
@yield('foot')
@include('layouts.toast')
@include('layouts.alert')
</body>
</html>




