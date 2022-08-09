@extends('layouts.app')
@section('title') Profile @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('user.manager') }}" class="text-decoration-none">user-manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->name }} info</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-6 col-xl-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <div class="text-center">
                        <img src="{{ isset(Auth::user()->photo)? asset('storage/profile/'.Auth::user()->photo): asset('img/user.png') }}" alt="" class="rounded-circle img-thumbnail my-3 shadow-sm" style="width: 150px; height: 150px; object-fit: cover; object-position: center">
                        <h3 class="mb-0 font-weight-bold font-monospace">
                            {{ Auth::user()->name }}
                        </h3>
                        <small class="text-black-50">
                            {{ Auth::user()->email }}
                        </small>
                    </div>
                    <hr class="bg-secondary text-secondary">
                    <div class="text-black-50">
                        <div class="">
                            <i class="bi bi-person me-3"></i>
                            <span class="">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="my-2">
                            <i class="bi bi-envelope me-3"></i>
                            <span class="">{{ Auth::user()->email }}</span>
                        </div>
                        <div class="">
                            <i class="bi bi-postcard me-3"></i>
                            <span class="">You have been created 35 posts. </span>
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
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <span class="text-black-50">Have a great day sir.</span>
    </div>
@endsection
