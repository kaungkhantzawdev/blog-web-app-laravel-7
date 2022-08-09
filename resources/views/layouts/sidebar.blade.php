<!--side bar-->
<aside class="sidebar py-3 px-4 shadow-sm bg-white" id="sidebar">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="brand d-flex align-items-center justify-content-between">
                    <div class="brand-logo d-flex align-items-center">
                        <img src="{{ asset(\App\Base::$logo) }}" alt="" class="" style="width: 25px">
                        <span class="h4 ms-3 mb-0 fw-bolder font-monospace text-primary">Blog</span>
                    </div>
                    <div class="">
                        <button type="button" class="border-0 bg-white" id="menu-close">
                            <i class="bi bi-x-circle text-secondary" style="font-size: 18px"></i>
                        </button>
                    </div>
                </div>
                <div class="my-3" >
                    <div class="">
                        <ul class="sidebar-menu">
                            <x-side-bar-item link="{{ route('home') }}" class="bi-house-door" name="Home"></x-side-bar-item>
                            <x-side-bar-item link="{{ route('welcome') }}" class="bi-box-seam" name="News"></x-side-bar-item>
                            <x-menu-spacer></x-menu-spacer>

                            <x-menu-title name="Category"></x-menu-title>
                            <x-side-bar-item link="{{ route('category.index') }}" class="bi-layers" name="Category Manager"></x-side-bar-item>
                            <x-menu-spacer></x-menu-spacer>

                           <x-menu-title name="Article"></x-menu-title>
                            <x-side-bar-item link="{{ route('article.create') }}" class="bi-plus-circle" name="Create Article"></x-side-bar-item>
                            <x-side-bar-item link="{{ route('article.index') }}" class="bi-list-ul" name="Articles"></x-side-bar-item>

                            @if(Auth::user()->role != 1)
                            <x-menu-spacer></x-menu-spacer>
                            <x-menu-title name="User"></x-menu-title>
                            <x-side-bar-item link="{{ route('user.manager') }}" class="bi-people" name="Users"></x-side-bar-item>
                            @endif

                            <x-menu-spacer></x-menu-spacer>
                            <x-menu-title name="User Profile"></x-menu-title>
                            <x-side-bar-item link="{{ route('profile') }}" class="bi-person" name="Your Profile"></x-side-bar-item>
                            <x-side-bar-item link="{{ route('profile.photo-upload') }}" class="bi-camera" name="Photo Upload"></x-side-bar-item>
                            <x-side-bar-item link="{{ route('profile.updateInfo') }}" class="bi-arrow-up-circle" name="update info"></x-side-bar-item>
                            <x-side-bar-item link="{{ route('profile.changeP') }}" class="bi-shield-lock" name="change password"></x-side-bar-item>

                            <x-menu-spacer></x-menu-spacer>
                            <x-menu-title name="Logout"></x-menu-title>
                            <x-side-bar-item link="{{ route('logout') }}" class="bi-emoji-frown" name="Logout"></x-side-bar-item>
                        </ul>
                    </div>
                </div>
{{--                <div class="position-fixed bottom-0 mb-3 bg-white">--}}
{{--                    <x-menu-spacer></x-menu-spacer>--}}
{{--                    <li class="menu-title text-capitalize font-monospace small">--}}
{{--                            <span class="">--}}
{{--                                Copy Right © {{ date('Y') }} RiO, <br> All Rights Reserved.--}}
{{--                            </span>--}}
{{--                    </li>--}}
{{--                    <div class="">--}}
{{--                        <x-menu-spacer></x-menu-spacer>--}}
{{--                        <li class="menu-title text-capitalize font-monospace small">--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <a href="" class="me-2 text-secondary"><i class="bi bi-facebook"></i></a>--}}
{{--                                <a href="" class="me-2 text-secondary"><i class="bi bi-instagram"></i></a>--}}
{{--                                <a href="" class="me-2 text-secondary"><i class="bi bi-github"></i></a>--}}
{{--                                <a href="" class="me-2 text-secondary"><i class="bi bi-twitter"></i></a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</aside>
<!--side bar end-->
