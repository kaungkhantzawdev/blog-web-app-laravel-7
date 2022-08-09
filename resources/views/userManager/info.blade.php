@extends('layouts.app')
@section('title') Profile @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('user.manager') }}" class="text-decoration-none">user-manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $user->name }} information</li>
    </x-bread-crumb>
    <div class="col-12 col-lg-6 col-xl-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <div class="text-center">
                        <img src="{{ isset($user->photo)? asset('storage/profile/'.$user->photo): asset('img/user.png') }}" alt="" class="rounded-circle img-thumbnail my-3 shadow-sm" style="width: 150px; height: 150px; object-fit: cover; object-position: center">
                        <h3 class="mb-0 font-weight-bold font-monospace">
                            {{ $user->name }}
                        </h3>
                        <small class="text-black-50">
                            {{ $user->email }}
                        </small>
                    </div>
                    <hr class="bg-secondary text-secondary">
                    <div class="text-black-50">
                        <div class="">
                            <i class="bi bi-person me-3"></i>
                            <span class="">{{ $user->name }}</span>
                        </div>
                        <div class="my-2">
                            <i class="bi bi-envelope me-3"></i>
                            <span class="">{{ $user->email }}</span>
                        </div>
                        <div class="">
                            <i class="bi bi-postcard me-3"></i>
                            <span class="">You have been created 35 posts. </span>
                        </div>
                        <div class="my-2">
                            <i class="bi bi-telephone me-3"></i>
                            <span class="">
                                {{ isset($user->phone)? $user->phone : "Phone Number" }}
                            </span>
                        </div>
                        <div class="">
                            <i class="bi bi-geo-alt me-3"></i>
                            <span class="">
                                {{ isset($user->address)? $user->address : "Address" }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 d-flex align-items-center justify-content-between">
                        <div class="">
                            <a href="{{ route('user.manager') }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-people me-2"></i>
                                user list
                            </a>
                        </div>
                        <div class="">
                            @if($user->role != 0)
                                <a href="{{ route('user.info', $user->id) }}" class="btn btn-sm btn-outline-primary" title="to see information">
                                    <i class="bi bi-info-circle"></i>
                                </a>

                                <form action="{{ route('user.makeAdmin', $user->id) }}" class="d-none" method="post" id="makeAdmin{{ $user->id }}">
                                    @csrf
                                </form>
                                <button type="button" class="btn btn-sm btn-outline-warning mx-2" form="makeAdmin{{ $user->id }}" title="to make admin"
                                        onclick="return makeAdmin({{ $user->id }})">
                                    <i class="bi bi-person-circle"></i>
                                </button>
                                @if($user->isBanned != 1)
                                    <form action="{{ route('user.banUser', $user->id) }}" class="d-none" method="post" id="banUser{{ $user->id }}">
                                        @csrf
                                    </form>
                                    <button type="button" class="btn btn-sm btn-outline-danger" form="banUser{{ $user->id }}" title="to make admin"
                                            onclick="return banUser({{ $user->id }})">
                                        to ban
                                    </button>
                                @else
                                    <form action="{{ route('user.unbanUser', $user->id) }}" class="d-none" method="post" id="unbanUser{{ $user->id }}">
                                        @csrf
                                    </form>
                                    <button type="button" class="btn btn-sm btn-outline-danger" form="unbanUser{{ $user->id }}" title="to make admin"
                                            onclick="return unbanUser({{ $user->id }})">
                                        isn't ban
                                    </button>
                                @endif
                            @else
                                <form action="{{ route('user.unmakeAdmin', $user->id) }}" class="d-none" method="post" id="unmakeAdmin{{ $user->id }}">
                                    @csrf
                                </form>
                                <button type="button" class="btn btn-sm btn-outline-warning" form="unmakeAdmin{{ $user->id }}" title="to make admin"
                                        onclick="return unmakeAdmin({{ $user->id }})">
                                    <i class="bi bi-person-circle me-1"></i>
                                    unmake admin
                                </button>
                            @endif
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
        function makeAdmin(id) {
            Swal.fire({
                title: 'Are you sure <br> to upgrade role?',
                text: "role ချိန်လိုက်ရင် admin လုပ်ပိုင်ခွင့်များကို ရရှိမှာဖြစ်ပါတယ်။",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Role Updated',
                        'အကောင့်မြှင်တင်ချင်း အောင်မြင်ပါသည်။',
                        'success'
                    );
                    setTimeout(function () {
                        $("#makeAdmin"+id).submit();
                    }, 1500)
                }
            })
        }

        function unmakeAdmin(id) {
            Swal.fire({
                title: 'Are you sure <br> to unmake admin role?',
                text: "role ချိန်လိုက်ရင် admin လုပ်ပိုင်ခွင့်များကို ရရှိမှ မဟုတ်တော့ပါ။",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Role Changed',
                        'အကောင့်မြှင်တင်ချင်း အောင်မြင်ပါသည်။',
                        'success'
                    );
                    setTimeout(function () {
                        $("#unmakeAdmin"+id).submit();
                    }, 1500)
                }
            })
        }

        function banUser(id) {
            Swal.fire({
                title: 'Are you sure <br> to Ban this user?',
                text: "user access banned",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Banned User',
                        'user is banned',
                        'success'
                    );
                    setTimeout(function () {
                        $("#banUser"+id).submit();
                    }, 1500)
                }
            })
        }

        function unbanUser(id) {
            Swal.fire({
                title: 'Are you sure <br> to remove ban list this user?',
                text: "user access",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Remove Ban list this user',
                        'user access',
                        'success'
                    );
                    setTimeout(function () {
                        $("#unbanUser"+id).submit();
                    }, 1500)
                }
            })
        }


    </script>
@endsection
