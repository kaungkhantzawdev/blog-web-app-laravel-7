
@extends('layouts.app')
@section('title') Profile @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}" class="text-decoration-none">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">update information</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-6 col-xl-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <h5 class="">
                        <i class="bi bi-arrow-up-circle me-2"></i>
                        Update your information
                    </h5>
                    <hr>
                </div>
                <div class="">
                    <form action="{{ route('profile.updateNe') }}" class="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="two" class="form-label">
                                <i class="bi bi-person me-2"></i>
                                Your Name
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="two" name="name" value="{{ old('name', Auth::user()->name) }}">
                            @error('name')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="three" class="form-label">
                                <i class="bi bi-envelope me-2"></i>
                                Your Email
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="three" name="email" value="{{ old('email', Auth::user()->email) }}">
                            @error('email')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="one" required>
                                <label class="form-check-label" for="one">I'm sure.</label>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-arrow-up-circle me-2"></i>
                                update
                            </button>
                        </div>
                    </form>
                    <hr class="my-4">
                    <form action="{{ route('profile.updatePa') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="one" class="form-label">
                                <i class="bi bi-telephone me-2"></i>
                                Your Phone
                            </label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',Auth::user()->phone) }}" name="phone" id="one">
                            @error('phone')
                            <small class="text-danger">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">
                                <i class="bi bi-pin-map me-2"></i>
                                Address
                            </label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="exampleFormControlTextarea1" rows="5">{{ old('address',Auth::user()->address) }}</textarea>
                            @error('address')
                            <small class="text-danger">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" required>
                                <label class="form-check-label" for="flexSwitchCheckDefault">I'm sure.</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-arrow-up-circle me-2"></i>
                                update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <span class="text-black-50">Have a great day sir.</span>
    </div>
@endsection
