<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',\App\Base::$name)</title>
    <link rel="icon" href="{{ asset('img/logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('head')
</head>
<body class="bg-light">
<!-- Authentication Links -->
@guest
    <a href="{{ route('login') }}" class=""></a>
    <a href="{{ route('register') }}" class=""></a>
@else
    @include('layouts.sidebar')
    @include('layouts.header')

    <!--main-->
    <div class="position-relative">
        <section class="main w-100" id="main">
            <div class="container-fluid">
                <div class="row sub-main px-2 g-0" id="subMain">
                    @yield('content')
                </div>
                @yield('content-two')
            </div>
        </section>
    </div>
    <!--main end-->
@endguest

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@yield('foot')
@auth
    @empty(Auth::user()->phone)
        @include('profile.modal')
    @endempty
@endauth
@include('layouts.toast')
@include('layouts.alert')
</body>
</html>

