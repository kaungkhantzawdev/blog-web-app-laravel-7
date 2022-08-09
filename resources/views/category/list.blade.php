<div class="">
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>User Name</th>
            <th>Control</th>
            <th>Created at</th>
            <th>Update at</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr class="align-middle">
                <td>{{ $category->id }}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <span class="ms-2">{{ $category->title }}</span>
                    </div>
                </td>
                <td>{{ $category->user->name }}</td>
                <td>
                    <button type="button" onclick="return showAlert({{ $category->id }})"
                            class="btn btn-sm btn-outline-danger" form="form{{ $category->id }}">
                        <i class="bi bi-trash3"></i>
                    </button>
                    <form action="{{ route('category.destroy',$category->id) }}" class="d-none" id="form{{ $category->id }}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                <td>
                    <small>
                        <i class="bi bi-calendar-event"></i>
                        <span class="ms-2">
                                                {{ $category->created_at->format('d m Y') }}
                                            </span>
                        <br>
                        <i class="bi bi-clock"></i>
                        <span class="ms-2">
                                                {{ $category->created_at->format('h:i A') }}
                                            </span>
                    </small>
                </td>
                <td>
                    <small>
                        <i class="bi bi-calendar-event"></i>
                        <span class="ms-2">
                                                {{ $category->updated_at->format('d m Y') }}
                                            </span>
                        <br>
                        <i class="bi bi-clock"></i>
                        <span class="ms-2">
                                                {{ $category->updated_at->format('h:i A') }}
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
            {{ $categories->links() }}
        </div>
        <div class="">
            <h6 class="mb-0 fw-bold">
                <i class="bi bi-layers me-1"></i>
                Total : {{ $categories->total() }}
            </h6>
        </div>
    </div>
</div>
