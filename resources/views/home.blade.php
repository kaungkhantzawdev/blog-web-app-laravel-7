@extends('layouts.app')
@section('title') dashboard @endsection
@section('content')
   <div class="col">
       <div class="row g-3">
           <div class="col-12 col-md-4 ani-tran">
               <div class="card border-0 shadow-sm">
                   <div class="card-body">
                       <div class="d-flex align-items-center justify-content-between flex-column-reverse flex-lg-row">
                           <div class="">
                               <div class="">
                                   <small class="text-black-50 font-monospace">Total articles</small>
                               </div>
                               <h4 class="mb-0 fw-bold">{{ count(\App\Article::all()) }}</h4>
                               <div class="">
                                   <span class="badge p-1 text-warning" style="background-color: #fff4d9;">{{ count(\App\Article::all())/100*10 }}%</span>
                                   <small class="text-black-50 font-monospace">of articles</small>
                               </div>
                           </div>
                           <div class="rounded-circle text-center mb-2 mb-lg-0" style="background-color: #fff4d9; width: 60px; height: 60px; line-height: 60px">
                               <i class="bi bi-box-seam-fill text-warning" style="font-size: 30px"></i>
                           </div>
                       </div>

                   </div>
               </div>
           </div>
           <div class="col-12 col-md-4 ani-tran">
               <div class="card border-0 shadow-sm">
                   <div class="card-body">
                       <div class="d-flex align-items-center justify-content-between flex-column-reverse flex-lg-row">
                           <div class="">
                               <div class="">
                                   <small class="text-black-50 font-monospace">Total categories</small>
                               </div>
                               <h4 class="mb-0 fw-bold">{{ count(\App\Category::all()) }}</h4>
                               <div class="">
                                   <span class="badge p-1" style="background-color: #dcfaf8; color: #17dbcc">{{ count(\App\Category::all())/100*10 }}%</span>
                                   <small class="text-black-50 font-monospace">of categories</small>
                               </div>
                           </div>
                           <div class="rounded-circle text-center mb-2 mb-lg-0" style="background-color: #dcfaf8; width: 60px; height: 60px; line-height: 60px">
                               <i class="bi bi-layers-fill" style="font-size: 30px; color: #17dbcc"></i>
                           </div>
                       </div>

                   </div>
               </div>
           </div>
           <div class="col-12 col-md-4 ani-tran">
               <div class="card border-0 shadow-sm">
                   <div class="card-body">
                       <div class="d-flex align-items-center justify-content-between flex-column-reverse flex-lg-row">
                           <div class="">
                               <div class="">
                                   <small class="text-black-50 font-monospace">Total users</small>
                               </div>
                               <h4 class="mb-0 fw-bold">{{ count(\App\User::all()) }}</h4>
                               <div class="">
                                   <span class="badge p-1 text-primary" style="background-color: #e7edff;">{{ count(\App\User::all())/100*10 }}%</span>
                                   <small class="text-black-50 font-monospace">of users</small>
                               </div>
                           </div>
                           <div class="rounded-circle text-center mb-2 mb-lg-0" style="background-color: #e7edff; width: 60px; height: 60px; line-height: 60px">
                               <i class="bi bi-people-fill text-primary" style="font-size: 30px"></i>
                           </div>
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
@section('content-two')
    <div class="row sub-main-two px-2 g-0 mt-3" id="subMainTwo">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-7 ani-tran">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between chart-title">
                                <h5 class="mb-0">Articles</h5>
                                <div class="">
                                    <i class="bi bi-graph-down"></i>
                                </div>
                            </div>
                            <div class="">
                                <canvas id="Chart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 mt-3 mt-lg-0 ani-tran">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between chart-title">
                                <h5 class="mb-0">Categories</h5>
                                <div class="">
                                    <i class="bi bi-layers"></i>
                                </div>
                            </div>
                            <div class="">
                                <canvas id="pieChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <div class="">
                                        <div class="mb-2"><h4 class="mb-0 me-2 fw-bold d-inline-block main-color">{{ count(\App\Category::all()) }}</h4> <span class="text-pink d-inline-block">Categories</span></div>
                                        <span class="text-pink btn btn-sm"><i class="bi bi-layers me-2"></i> total categories</span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="">
                                        <i class="feather-pie-chart text-pink" style="font-size: 40px"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="my-2">
                                <div class="progress roundC" style="height: 10px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{ count(\App\Category::all())/100*10 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3 ani-tran">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h5 class="mb-0 main-color">Recent New</h5>
                                <div class="w-25">
                                    <div class="text-end">
                                        <span class="me-2 text-primary">{{ count(\App\Article::all())/100*10 }} %</span>
                                        <i class="bi bi-list-check text-pink"></i>
                                    </div>
                                    <div class="">
                                        <div class="progress roundC" style="height: 6px">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{ count(\App\Article::all())/100*10 }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('foot')
    <script>
        $('#apk').click(function () {
            alert('hello')
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: "success",
                title: "Hello Heloo"
            })
        })

        let dataC = [];
        @foreach(\App\Category::all() as $c)
            dataC.push("{{ $c->title }}");
        @endforeach
        console.log(dataC)

        let dataCid = [];
        @foreach(\App\Category::all() as $c)
        dataCid.push("{{ $c->id }}");
        @endforeach
        console.log(dataCid)

        let dataB = [];
        @foreach(\App\User::all() as $c)
        dataB.push("{{ $c->id }}");
        @endforeach
        console.log(dataB)

        let dataA = [];
        @foreach(\App\Article::all() as $c)
        dataA.push("{{ $c->id }}");
        @endforeach
        console.log(dataA)

        let dataAtitle = [];
        @foreach(\App\Article::all() as $c)
        dataAtitle.push("{{ $c->category->title }}");
        @endforeach
        console.log(dataAtitle)

        const ctx = document.getElementById('Chart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dataC,
                datasets: [
                    {
                        label: 'articles',
                        data: dataA,
                        fill: false,
                        backgroundColor : '#ff20cf',
                        borderColor: '#ff20cf',
                        tension: 0.1
                    },


                ],

            },
            options: {
                plugins : {
                    legend : {
                        display : true,
                        labels: {
                            usePointStyle : true
                        }
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                }
            }
        });

        const pie = document.getElementById('pieChart');
        const pieCh = new Chart(pie, {
            type: 'doughnut',
            data: {
                labels: dataC,
                datasets: [{
                    label: 'My First Dataset',
                    data: dataCid,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        '#20adff',
                        'rgb(255, 205, 86)',
                        'rgb(22,43,54)',
                        '#ff2020',
                        'rgb(0,255,105)',
                        'rgb(255,0,54)',
                        '#0900ff',
                        'rgb(255,180,0)',
                        'rgb(90,199,255)',
                        '#ffa620',
                        'rgb(241,0,255)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins : {
                    legend : {
                        display : true,
                        position : "bottom",
                        labels: {
                            usePointStyle : true
                        }
                    },
                },
            }

        });

    </script>

    @endsection
