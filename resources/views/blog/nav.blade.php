<nav class="navbar navbar-expand-lg navbar-light w-100">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/logo.svg') }}" alt="" class="" style="width: 28px;">
                <span class="ms-2 font-monospace fw-bold text-primary">Blog</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex justify-content-center w-100">
                <div class="d-flex rounded bg-light p-1 w-50">
                    <input name="search" type="text" value="{{ request()->search }}" form="sF" id="search" class="border-0 ms-2 w-100 bg-light rounded form-control p-0 me-2">
                    <button class="btn btn-sm btn-primary" form="sF" type="submit"><i class="bi bi-search"></i></button>
                </div>
                <form action="{{ route('welcome') }}" id="sF" class="d-none" method="get"></form>
            </div>
            <ul class="navbar-nav ms-auto text-center mb-2 mb-lg-0">

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">welcome </a>
                        </li>
                        <li class="nav-item dropdown" style="margin-top: -5px;">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ isset(Auth::user()->photo)? asset('storage/profile/'.Auth::user()->photo): asset('img/user.png') }}" alt="" class="shadow-sm rounded-circle" style="width: 36px; height: 36px; object-fit: cover; object-position: center">
                            </a>
                            <ul class="dropdown-menu border-0 shadow-sm">
                                <div class="px-3 py-1">
                                    <div class="d-flex">
                                        <img src="{{ isset(Auth::user()->photo)? asset('storage/profile/'.Auth::user()->photo): asset('img/user.png') }}" alt="" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover; object-position: center">
                                        <div class="ms-3">
                                            <h6 class="mb-0 font-monospace">{{ Auth::user()->name }}</h6>
                                            <small class="text-black-50">{{ Auth::user()->email }}</small>
                                        </div>
                                    </div>
                                    <hr class="bg-secondary text-secondary">
                                    <div class="text-black-50">
                                        <div class="">
                                            <i class="bi bi-postcard me-3"></i>
                                            <span class="">You have 35 posts</span>
                                        </div>
                                        <div class="my-2">
                                            <i class="bi bi-telephone me-3"></i>
                                            <span class="">
                                                {{ isset(Auth::user()->phone)? Auth::user()->phone : "Phone Number" }}
                                            </span>
                                        </div>
                                        <div class="">
                                            <i class="bi bi-geo-alt me-3"></i>
                                            <span class="">
                                                {{ isset(Auth::user()->address)? Auth::user()->address : "Address" }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="mt-4">
                                            <a href="{{ route('home') }}" class="btn btn-sm btn-primary w-100">
                                                <i class="bi bi-grid me-2"></i>
                                                Dashboard
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>

                    @else
                        <div class="d-flex align-items-center ms-2">
                            <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary ms-2">Login</a>
                        </div>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
