@extends('layouts.app')
@section('title') Category @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">category manager</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <div class="">
                        <h4 class="mb-0 font-weight-bold font-monospace">
                            <i class="bi bi-layers me-2"></i>
                            Category Manager
                        </h4>
                    </div>
                    <div class="mt-3">
                        <form action="{{ route('category.store') }}" class="" method="post">
                            @csrf
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control w-75 @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                <button type="submit" class="btn btn-primary ms-2">
                                    create <i class="bi bi-layers ms-2"></i>
                                </button>
                            </div>
                            @error('title')
                            <samll class="text-danger">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </samll>
                            @enderror
                        </form>
                    </div>
                    <hr class="bg-secondary text-secondary">
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <span class="text-black-50">Have a great day sir.</span>
    </div>
@endsection
@section('foot')
    @include('category.action')
@endsection
