@extends('dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Update Category</h4>
            </div>
            <div class="card-body">
                <form id="registerForm" method="POST" action="/admin/category/update" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" value="{{ $categorie->name }}" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Category Description</label>
                        <input type="text" class="form-control" value="{{ $categorie->description }}" name="description" id="description" required>
                    </div>
                    <input type="hidden" name="category" value="{{ $categorie->id }}">
                    <button type="submit" class="btn btn-warning w-100"><i class="bi bi-pencil"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
