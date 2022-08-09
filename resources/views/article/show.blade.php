@extends('layouts.app')
@section('title') Detail Article @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}" class="text-decoration-none">Articles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail article</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold">
                        {{ $article->title }}
                    </h5>
                    <small>
                        {{ $article->updated_at->diffForHumans() }}
                    </small>
                </div>
                <div class="mt-2">
                    <small class="d-flex align-items-center">
                        <div class="">
                            <i class="bi bi-person-circle"></i>
                            <span class="ms-2">
                            {{ $article->user->name }}
                            </span>
                        </div>
                        <div class="mx-3">
                            <i class="bi bi-calendar-event"></i>
                            <span class="ms-2">
                            {{ $article->updated_at->format('d m Y') }}
                            </span>
                        </div>

                        <div class="">
                            <i class="bi bi-clock "></i>
                            <span class="ms-2">
                            {{ $article->updated_at->format('h:i A') }}
                        </span>
                        </div>
                    </small>
                </div>
                <div class="">
                    <div class="">
                        @if($article->photo)
                            <img src="{{ isset($article->photo)? asset('storage/article/'.$article->photo) : "" }}" alt="" class="w-100 mt-3 rounded">
                        @endif
                        <p class=" text-black-50" style="white-space: pre-line">
                            {{ $article->description }}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <a href="{{ route('article.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-list-ul"></i>
                        </a>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <button type="button" onclick="return showAlert({{ $article->id }})"
                                class="btn btn-sm btn-outline-danger" form="form{{ $article->id }}">
                            <i class="bi bi-trash3"></i>
                        </button>
                        <form action="{{ route('article.destroy',$article->id) }}" class="d-none" id="form{{ $article->id }}" method="post">
                            @csrf
                            @method('delete')
                        </form>
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
@section('foot')
    <script>
        function showAlert(id) {
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

