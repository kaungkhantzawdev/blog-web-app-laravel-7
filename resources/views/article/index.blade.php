@extends('layouts.app')
@section('title') Articles @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Articles</li>
    </x-bread-crumb>
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <div class="">
                        <h4 class="mb-0 font-weight-bold font-monospace">
                            <i class="bi bi-list-ul me-2"></i>
                            Article lists
                        </h4>
                    </div>
                    <div class="mt-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            ‌<a href="{{ route('article.index') }}" class="btn btn-outline-primary"><i class="bi bi-list-ul"></i></a>
                            @if(request()->search)
                            <div class="ms-3">
                                <p class="mb-0">
                                    Search By : " {{ request()->search }} "
                                </p>
                            </div>
                            @endif
                        </div>
                        <div class="">
                            <div class="">
                                <form action="{{ route('article.index') }}" class="d-flex align-items-center" method="get">
                                    <input type="text" class="form-control" id="one" name="search" value="{{ old('photo', request()->search) }}">
                                    <button type="submit" class="btn ms-2 btn-outline-primary"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                            @error('photo')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                            @enderror
                        </div>
                    </div>
                    <hr class="bg-secondary text-secondary">
                    <div class="">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Category</th>
                                @if(Auth::user()->role == 0)
                                <th>User</th>
                                @endif
                                <th>Control</th>
                                <th>Created at</th>
                                <th>Update at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $article)
                                <tr class="align-middle">
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        <span class="fw-bold d-block"> {{ $article->title }}</span>
                                        <p class="text-black-50 small mb-0">
                                            {{ Str::words($article->excerpt, 20) }}
                                        </p>
                                        @if($article->photo)
                                        <div class="my-2">
                                            <img src="{{ isset($article->photo)? asset('storage/article/'.$article->photo): "" }}" alt="" class="rounded" style="width: 80px; height: 50px; object-fit: cover; object-position: center">
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $article->category->title }}</td>
                                    @if(Auth::user()->role == 0)
                                    <td>
                                        <div class="">
                                            <div class="text-center mb-2">
                                                <img src="{{ isset($article->user->photo)? asset('storage/profile/'.$article->user->photo): asset('img/user.png') }}" alt="" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover; object-position: center">
                                            </div>
                                            <span class="ms-2">{{ $article->user->name }}</span>
                                        </div>
                                    </td>
                                    @endif
                                    <td class="text-nowrap">
                                        <a title="article detail" href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-text-paragraph"></i>
                                        </a>
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
                                    </td>
                                    <td class="text-nowrap">
                                        <small>
                                            <i class="bi bi-calendar-event"></i>
                                            <span class="ms-2">
                                                {{ $article->created_at->format('d m Y') }}
                                            </span>
                                            <br>
                                            <i class="bi bi-clock"></i>
                                            <span class="ms-2">
                                                {{ $article->created_at->format('h:i A') }}
                                            </span>
                                        </small>
                                    </td>
                                    <td class="text-nowrap">
                                        <small>
                                            <i class="bi bi-calendar-event"></i>
                                            <span class="ms-2">
                                                {{ $article->updated_at->format('d m Y') }}
                                            </span>
                                            <br>
                                            <i class="bi bi-clock"></i>
                                            <span class="ms-2">
                                                {{ $article->updated_at->format('h:i A') }}
                                            </span>
                                        </small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-warning">There is no data.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                {{ $articles->appends(Request::all())->links() }}
                            </div>
                            <div class="">
                                <h6 class="mb-0 fw-bold">
                                    <i class="bi bi-person-circle me-1"></i>
                                    Total : {{ $articles->total() }}
                                </h6>
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
