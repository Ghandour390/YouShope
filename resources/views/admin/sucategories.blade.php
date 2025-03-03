@extends('dashboard')

@section('content')
    <div>
        <!-- Button trigger modal -->
        <div>
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                add New Category
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light text-dark dark-mode">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" method="POST" action="/admin/category/create" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-wrap justify-content-xl-center  d-flex" style="width: 100%; gap: 20px">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Description</th>
                    <th scope="col">Super Category</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody class="table-light">
                @foreach($sucategories as $sucategorie)
                    <tr>
                        <td><strong>{{ $sucategorie->name }}</strong></td>
                        <td>{{ $sucategorie->description }}</td>
                        <td>
                            @if($sucategorie->sucategorie)
                                <span class="badge bg-success">{{ $sucategorie->sucategorie->name }} Category</span>
                            @else
                                <span class="badge bg-secondary">No sucategorie</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ url('/admin/sucategorie/get') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Update
                                </button>
                                <input type="hidden" name="sucategorie" value="{{ $sucategorie->id }}">
                            </form>

                            <form action="{{ url('/admin/sucategorie/delete') }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                                <input type="hidden" name="sucategorie" value="{{ $sucategorie->id }}">
                            </form>
                        </td>
                    </tr>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
