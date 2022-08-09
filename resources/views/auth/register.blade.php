<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
                        <h2 class="text-center font-weight-normal font-monospace">Create Account</h2>
                        <p class="text-center text-black-50 mb-5">
                            Already have an account yet?
                            <a href="{{ route('login') }}" class="text-decoration-none">sign in</a>
                        </p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label d-flex align-items-center">
                                    <i class="bi bi-person me-3 text-primary"></i>
                                    Your Name
                                </label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label d-flex align-items-center">
                                    <i class="bi bi-envelope text-primary me-3"></i>
                                    Email address
                                </label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label d-flex align-items-center">
                                    <i class="bi bi-shield-lock me-3 text-primary"></i>
                                    Passwrod
                                </label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label d-flex align-items-center">
                                    <i class="bi bi-shield-lock me-3 text-primary"></i>
                                    Confirm Password
                                </label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I accept the <a href="#" class="text-decoration-none">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/app.js') }}"></script>
@yield('foot')
</body>
</html>

