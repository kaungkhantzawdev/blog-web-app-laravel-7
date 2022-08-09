@extends('blog.master')
@section('head')
    <style>
        .page-item{
            width: 35px;
            height: 35px;
            text-align: center;
            padding: 0;
            line-height: 35px;
        }

        .page-item.active .page-link{
            border-radius: 50% !important;
            border : 1px solid var(--bs-primary) !important;
            background: transparent !important;
            color: var(--bs-primary) !important;
        }
        .page-link{
            padding: 0 !important;
            border: none;
            border-radius: 50% !important;
            font-weight: bold;
        }
        .page-link:hover{
            border-radius: 50% !important;
        }

    </style>
@endsection
@section('content')
    <div class="col-12 col-lg-7">
        <div class="">
            @forelse($articles as $article)
            <div class="border-bottom mb-4 pb-4 article-preview">
                <div class="d-flex align-items-center justify-content-between">
                    <a class="fw-bold h4 d-block text-decoration-none" href="">
                        {{ $article->title }}
                    </a>
                    <small class="text-black-50">{{ $article->updated_at->diffForHumans() }}</small>
                </div>

                <div class="small post-category">
                    <a href="" class="btn btn-sm btn-light px-3" style="border-radius: 30px;">{{ $article->category->title }}</a>
                </div>
                @if($article->photo)
                <div class="my-2">
                    <img alt="{{ $article->photo }}" src="{{ isset($article->photo)? asset('storage/article/'.$article->photo): "" }}" class="rounded w-100 shadow-sm">
                </div>
                @endif
                <div class="text-black-50 the-excerpt">
                    <p style="white-space: pre-line">
                        {{$article->excerpt}}
                    </p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ isset($article->user->photo)? asset('storage/profile/'.$article->user->photo) : asset('img/user.png')}}" alt="{{ $article->user->photo }}" class="rounded-circle" style="object-fit: cover !important; object-position: center !important; width: 50px; height: 50px">
                        <div class="ms-2">
                                  <span class="small">
                                      <i class="bi bi-person"></i>
                                      {{ $article->user->name }}
                                  </span>
                            <br>
                            <span class="small">{{ $article->updated_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('blog.detail', $article->slug) }}" class="btn btn-sm btn-outline-primary px-3" style="border-radius: 30px;">Read More</a>
                </div>
            </div>
            @empty
                <div class="my-4 pb-4 ">
                    <div class="d-flex justify-content-center">
                        <div class="">
                            <h4 class="">There is no article 😔</h4>
                            <div class="my-2">
                                <p class="mb-0">
                                    Please add article, go to login to Dashboard
                                </p>
                            </div>
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('home') }}" class="btn btn-sm rounded-pill px-3 btn-primary"><i class="bi bi-grid me-2"></i> Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-sm rounded-pill px-3 btn-primary me-2">Login</a>
                                    <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <div class=" d-block d-lg-none">
                {{ $articles->onEachSide(1)->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
    @if($oldArticle)
    <div class="col-12 col-lg-5 border-start">
        <div class="">
            <div class="border-bottom mb-4 pb-4">
                <div class="d-flex align-items-center justify-content-between">
                    <a class="fw-bold h4 d-block text-decoration-none" href="">
                        {{ $oldArticle->title }}
                    </a>
                    <small class="text-black-50">{{ $oldArticle->updated_at->diffForHumans() }}</small>
                </div>

                <div class="small post-category">
                    <a href="" class="btn btn-sm btn-light px-3" style="border-radius: 30px;">{{ $oldArticle->category->title }}</a>
                </div>
                @if($oldArticle->photo)
                    <div class="my-2">
                        <img alt="{{ $oldArticle->photo }}" src="{{ isset($oldArticle->photo)? asset('storage/article/'.$oldArticle->photo): asset('img/user.png') }}" class="rounded" style="object-fit: cover !important; object-position: center !important; width: 100%; height: 400px">
                    </div>
                @endif
                <div class="text-black-50 the-excerpt">
                    <p style="white-space: pre-line">
                        {{$oldArticle->excerpt}}
                    </p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ isset($oldArticle->user->photo)? asset('storage/profile/'.$oldArticle->user->photo) : asset('img/user.png')}}" alt="{{ $oldArticle->user->photo }}" class="rounded-circle" style="object-fit: cover !important; object-position: center !important; width: 50px; height: 50px">
                        <div class="ms-2">
                                  <span class="small">
                                      <i class="bi bi-person"></i>
                                      {{ $oldArticle->user->name }}
                                  </span>
                            <br>
                            <span class="small">{{ $oldArticle->updated_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <a href="" class="btn btn-sm btn-outline-primary px-3" style="border-radius: 30px;">Read More</a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class=" d-none d-lg-block">
                    {{ $articles->onEachSide(1)->appends(Request::all())->links() }}
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
