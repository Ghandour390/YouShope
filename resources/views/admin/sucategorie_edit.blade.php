@extends('dashboard')
@extends('layouts.bootstrap');

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Update SubCategory</h4>
            </div>
            <div class="card-body">
                <form id="registerForm" method="POST" action="/admin/sucategories/update" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">SuCategorie Name</label>
                        <input type="text" class="form-control" value="{{ $sucategorie->name }}" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">SuCategorie Description</label>
                        <input type="text" class="form-control" value="{{ $sucategorie->description }}" name="description" id="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Categorie</label>
                        <select class="form-select" name="categorie_id">
                            @foreach($categories as $catigorie)
                                <option value="{{ $catigorie->id }}" @if($catigorie->id === $sucategorie->categorie->id) selected @endif>{{ $catigorie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="sucategorie" value="{{ $sucategorie->id }}">
                    <button type="submit" class="btn btn-warning w-100"><i class="bi bi-pencil"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
