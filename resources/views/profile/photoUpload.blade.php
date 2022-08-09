@extends('layouts.app')
@section('title') Profile @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}" class="text-decoration-none">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">upload profile photo</li>
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
                    <div class="mt-4">
                        <label for="upload" class="form-label d-flex align-items-center">
                            <i class="bi bi-camera me-2"></i>
                            <span class="">Upload Your Photo</span>
                        </label>
                        <div class="d-flex align-items-center">
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" required id="upload" name="photo" form="uploadForm">
                            <button class="btn btn-primary ms-3" type="submit" form="uploadForm"><i class="bi bi-upload"></i></button>
                        </div>
                        @error('photo')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                        <form action="{{ route('profile.upload') }}" method="post" class="d-none" id="uploadForm" enctype="multipart/form-data">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <span class="text-black-50">Upload your photo.</span>
    </div>
@endsection
