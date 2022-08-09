<!--header-->
<header class="header shadow-sm w-100 pt-3 pb-2 px-4" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col">
                <div id="subHeader" class="sub-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                            <span style="cursor: pointer" id="menu">
                               <i class="bi bi-x-diamond text-primary" style="font-size: 20px"></i>
                            </span>
                        <span class="d-inline-block font-monospace ms-4 ms-lg-5 text-secondary d-flex align-items-center">
                                <span class="me-3">welcome</span>
                                <i class="bi bi-emoji-heart-eyes mt-1"></i>
                            </span>
                    </div>
                </div>
            </div>
            <div class="col px-1">
                <div class="d-flex justify-content-end">
                    <div class="me-4">
                        <a href="" class="text-secondary d-flex align-items-center text-decoration-none">
                            <i class="bi bi-postcard mt-1"></i>
                            <span class="ms-3">your posts</span>
                        </a>
                    </div>
                    <div class="" style="margin-top: -6px">
                        <div class="dropdown">
                            <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ isset(Auth::user()->photo)? asset('storage/profile/'.Auth::user()->photo): asset('img/user.png') }}" alt="" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover; object-position: center">
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
                                            <button type="submit" form="logout-form" class="btn btn-sm btn-danger w-100">
                                                <i class="bi bi-arrow-right me-2"></i>
                                                logout
                                            </button>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-black-50">
                                            Copy Right © {{ date('Y') }} {{\App\Base::$name}} by KKZ, All Rights Reserved.
                                        </small>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header end-->
