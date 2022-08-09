@extends('layouts.app')
@section('title') User Manager @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">user manager</li>
    </x-bread-crumb>
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="">
                    <div class="">
                        <h4 class="mb-0 font-weight-bold font-monospace">
                            <i class="bi bi-people me-2"></i>
                            User Manager
                        </h4>
                    </div>
                    <hr class="bg-secondary text-secondary">
                    <div class="">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                                @if(Auth::user()->role != 1)
                                <th>Control</th>
                                @endif
                                <th>Created at</th>
                                <th>Update at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="align-middle">
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ isset($user->photo)? asset('storage/profile/'.$user->photo): asset('img/user.png') }}" alt="" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover; object-position: center">
                                            <span class="ms-2">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    @if(Auth::user()->role != 1)
                                    <td>
                                        @if($user->role != 0)
                                        <a href="{{ route('user.info', $user->id) }}" class="btn btn-sm btn-outline-primary" title="to see information">
                                            <i class="bi bi-info-circle"></i>
                                        </a>

                                        <form action="{{ route('user.makeAdmin', $user->id) }}" class="d-none" method="post" id="makeAdmin{{ $user->id }}">
                                            @csrf
                                        </form>
                                        <button type="button" class="btn btn-sm btn-outline-warning" form="makeAdmin{{ $user->id }}" title="to make admin"
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
                                    </td>
                                    @endif
                                    <td>
                                        <small>
                                            <i class="bi bi-calendar-event"></i>
                                            <span class="ms-2">
                                                {{ $user->created_at->format('d m Y') }}
                                            </span>
                                            <br>
                                            <i class="bi bi-clock"></i>
                                            <span class="ms-2">
                                                {{ $user->created_at->format('h:i A') }}
                                            </span>
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            <i class="bi bi-calendar-event"></i>
                                            <span class="ms-2">
                                                {{ $user->updated_at->format('d m Y') }}
                                            </span>
                                            <br>
                                            <i class="bi bi-clock"></i>
                                            <span class="ms-2">
                                                {{ $user->updated_at->format('h:i A') }}
                                            </span>
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                {{ $users->links() }}
                            </div>
                            <div class="">
                                <h6 class="mb-0 fw-bold">
                                    <i class="bi bi-person-circle me-1"></i>
                                    Total : {{ $users->total() }}
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
