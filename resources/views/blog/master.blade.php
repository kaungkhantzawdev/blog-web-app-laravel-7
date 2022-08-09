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
    <style>
        #search:focus{
            olor: #212529 !important;
            outline: 0;
            box-shadow: none !important;
        }
        .blog .article-preview:last-child{
            border: none !important;
        }
    </style>
    @yield('head')
</head>
<body>
@include('blog.nav')

<!-- article -->
<section class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="py-3 my-4 border-bottom banner" style="background-image: url({{ asset('img/banner.svg') }});">
                <div class="text-center">
                    <h3 class="font-monospace text-info mb-0">BLOG</h3>
                    <h2 class="font-monospace my-2 fw-bolder text-primary">ARTICLE & NEWS</h2>
                    <div class="d-none d-lg-block">
                        <h6 class="font-monospace fw-bolder text-black-50 text-uppercase">
                            website created by rio
                        </h6>
                        <div class="mt-3">
                            <a href="" class="text-black-50"><i class="bi bi-twitter"></i></a>
                            <a href="" class="mx-2 text-black-50"><i class="bi bi-facebook"></i></a>
                            <a href="" class="text-black-50"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <a href="{{ request()->url() }}" class="font-monospace text-decoration-none mb-2 d-block">www.blog.rio.com</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="row">
                <div class="col-12">
                    <div class="d-block text-center d-lg-none">
                        <div class="dropdown">
                            <a style="border-radius: 30px;" class="btn btn-sm px-3 btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-layers me-2"></i> categories
                            </a>
                            <ul class="dropdown-menu">
                                @forelse(\App\Category::all() as $category)
                                <li><a class="dropdown-item" href="{{ route('blog.baseOnCategory', $category->slug) }}">{{ $category->title }}</a></li>
                                @empty
                                <li><a class="dropdown-item" href="#">no category</a></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center text-center d-none d-lg-block">
                        <a href="{{ route('welcome') }}" class="btn btn-sm {{ request()->url()== route('welcome')? "btn-primary" : "btn-light" }} px-3 me-2" style="border-radius: 30px;">All</a>
                        @forelse(\App\Category::all() as $category)
                            <a href="{{ route('blog.baseOnCategory', $category->slug) }}" class="btn btn-sm {{ route('blog.baseOnCategory', $category->slug) == request()->url()? "btn-primary": "btn-light" }} px-3 me-2" style="border-radius: 30px;">{{ $category->title }}</a>
                        @empty
                            <a href="#" class="btn btn-sm btn-light px-3 me-2" style="border-radius: 30px;">no category</a>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row g-5 mt-2 blog justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<section class="container px-lg-0">
    <div class="row">
        <div class="col-12 border-top">
            <div class="d-flex align-content-center justify-content-between my-5">
                <div class="">
                    <h6 class="mb-0 fw-bold">
                        Copyright © {{ date('Y') }} Blog
                    </h6>
                </div>
                <div class="">
                    <a href="" class="">
                        <img src="{{ asset('img/logo.svg') }}" alt="" class="" style="width: 28px;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@yield('foot')
</body>
</html>

