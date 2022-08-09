@extends('layouts.app')
@section('title') Edit Article @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}" class="text-decoration-none">Articles</a></li>
        <li class="breadcrumb-item active" aria-current="page">edit article</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <h5 class="">
                        <i class="bi bi-pencil-square me-2"></i>
                        Edit your article
                    </h5>
                    <hr>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                @if($article->photo)
                                    <div class="mb-2">
                                        <img src="{{ isset($article->photo)? asset('storage/article/'.$article->photo): "" }}" alt="" class="rounded" style="width: 100px; height: 60px; object-fit: cover; object-position: center">
                                        <button type="button" onclick="return showD({{ $article->id }})"
                                                class="btn btn-sm btn-outline-danger" form="form{{ $article->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                        <form action="{{ route('article.photoDelete') }}" class="d-none" id="form{{ $article->id }}" method="post">
                                            @csrf
                                            <input type="hidden" class="d-none" name="article" value="{{ $article->id}}">
                                        </form>
                                    </div>
                                @endif
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
                                    @foreach(\App\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ old('category',$article->category_id)==$category->id?"selected":"" }}>{{ $category->title }}</option>
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
                                    <input form="createArticle" type="text" class="form-control @error('title') is-invalid @enderror" id="three" name="title" value="{{ old('title', $article->title) }}">
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
                                    <textarea form="createArticle" class="form-control @error('description') is-invalid @enderror" rows="10" id="two" name="description">{{ old('description', $article->description) }}</textarea>
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
                                    <i class="bi bi-arrow-up-circle me-2"></i>
                                    Update
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
        <form action="{{ route('article.update',$article->id) }}" id="createArticle" class="d-none" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
        </form>
    </div>
@endsection
@section('foot')
    <script>
        function showD(id) {
            Swal.fire({
                title: 'Are you sure <br> to Delete this Article?',
                text: "This article make delete.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Article deleted',
                        'successfully',
                        'success'
                    );
                    setTimeout(function () {
                        $("#form"+id).submit();
                    }, 1500)
                }
            })
        }

    </script>
@endsection
