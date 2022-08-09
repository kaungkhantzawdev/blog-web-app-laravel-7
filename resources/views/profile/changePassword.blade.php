
@extends('layouts.app')
@section('title') Profile @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}" class="text-decoration-none">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">change password</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-6 col-xl-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <h5 class="">
                        <i class="bi bi-shield-lock me-2"></i>
                        Change Password
                    </h5>
                    <hr>
                </div>
                <div class="">
                    <form action="{{ route('profile.changePassword') }}" class="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="two" class="form-label">
                                <i class="bi bi-shield-lock me-2"></i>
                                Current Password
                            </label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="two" name="current_password">
                            @error('current_password')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="four" class="form-label">
                                <i class="bi bi-key me-2"></i>
                                New Password
                            </label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="four" name="new_password">
                            @error('new_password')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="three" class="form-label">
                                <i class="bi bi-key me-2"></i>
                                New Confirm Password
                            </label>
                            <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" id="three" name="new_confirm_password">
                            @error('new_confirm_password')
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
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <span class="text-black-50">Have a great day sir.</span>
    </div>
@endsection
