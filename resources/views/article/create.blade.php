@extends('layouts.app')
@section('title') Create Article @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}" class="text-decoration-none">Articles</a></li>
        <li class="breadcrumb-item active" aria-current="page">create article</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <h5 class="">
                        <i class="bi bi-plus-circle me-2"></i>
                        Create your article
                    </h5>
                    <hr>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label for="one" class="form-label">
                                    <i class="bi bi-camera me-2"></i>
                                    Header photo
                                </label>
                                <input form="createArticle" type="file" class="form-control @error('photo') is-invalid @enderror" id="one" name="photo" value="{{ old('photo') }}">
                                @error('photo')
                                <small class="text-danger">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </small>
                                @enderror
                            </div>
                            <div class="">
                                <h6 class="">
                                    <i class="bi bi-layers me-2"></i>
                                    Categories
                                </h6>
                                <select form="createArticle" name="category" id="" class="form-select @error('category') is-invalid @enderror">
                                    <option value="" class="">select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category')==$category->id?"selected":"" }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <small class="text-danger">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="">
                                <div class="mb-3">
                                    <label for="three" class="form-label">
                                        <i class="bi bi-postcard me-2"></i>
                                        Article title
                                    </label>
                                    <input form="createArticle" type="text" class="form-control @error('title') is-invalid @enderror" id="three" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <small class="text-danger">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="two" class="form-label">
                                        <i class="bi bi-text-paragraph me-2"></i>
                                        Article Description
                                    </label>
                                    <textarea form="createArticle" class="form-control @error('description') is-invalid @enderror" rows="10" id="two" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <small class="text-danger">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="">
                                <div class="form-check form-switch mb-2">
                                    <input form="createArticle" class="form-check-input" type="checkbox" role="switch" id="one" required>
                                    <label class="form-check-label" for="one">I'm sure.</label>
                                </div>
                                <button class="btn btn-primary w-100" type="submit" form="createArticle">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <span class="text-black-50">Have a great day sir.</span>
    </div>
    <div class="">
        <form action="{{ route('article.store') }}" id="createArticle" class="d-none" method="post" enctype="multipart/form-data">
            @csrf
        </form>
    </div>
@endsection
