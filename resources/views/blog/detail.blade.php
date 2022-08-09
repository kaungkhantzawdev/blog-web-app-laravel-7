@extends('blog.master')
@section('content')
    <div class="col-12 col-lg-10">
        <div class="card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold">
                        {{ $article->title }}
                    </h5>
                    <small>
                        {{ $article->updated_at->diffForHumans() }}
                    </small>
                </div>
                <div class="">
                    <div class="">
                        @if($article->photo)
                            <img src="{{ isset($article->photo)? asset('storage/article/'.$article->photo) : "" }}" alt="" class="w-100 mt-3 rounded shadow-sm">
                        @endif
                            <div class="mt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <img src="{{ isset($article->user->photo)? asset('storage/profile/'.$article->user->photo) : asset('img/user.png')}}" alt="{{ $article->user->photo }}" class="rounded-circle" style="object-fit: cover !important; object-position: center !important; width: 36px; height: 36px">

                                        <span class="ms-2">
                                        {{ $article->user->name }}
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="mx-3">
                                            {{ $article->updated_at->format('d M Y') }}
                                        </div>

                                        <div class="">
                                            {{ $article->updated_at->format('h:i A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class=" text-black-50" style="white-space: pre-line">
                            {{ $article->description }}
                        </p>
                    </div>
                </div>
                <hr>
                @php
                    $previousArrow = \App\Article::where('id','<',$article->id)->latest('id')->first();
                    $nextArrow = \App\Article::where('id','>',$article->id)->first();
                @endphp
                <div class="my-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ isset($previousArrow)? $previousArrow->slug : '#' }}">
                            <i class="bi bi-arrow-left-circle {{ isset($previousArrow)? 'text-primary ' : 'text-secondary' }} fs-2"></i>
                        </a>
                        <div class="">
                            <a href="{{ route('welcome') }}" class="btn btn-sm px-3 rounded-pill btn-outline-primary">All Articles</a>
                        </div>
                        <a href="{{ isset($nextArrow)? $nextArrow->slug : '#' }}">
                            <i class="bi bi-arrow-right-circle {{ isset($nextArrow)? 'text-primary ' : 'text-secondary' }} fs-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
