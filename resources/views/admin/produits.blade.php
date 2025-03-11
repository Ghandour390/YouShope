@extends('dashboard')
@extends('layouts.bootstrap')

@section('content')
            <div>
                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
     @endif
            </div>
    <div>
        <!-- Button trigger modal -->
        <div>
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ajoute produit
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light text-dark dark-mode">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                        <form id="registerForm" method="POST" action="/admin/produits/create"  enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="input-group mb-3 border-2">
                                <label class="input-group-text" for="inputGroupFile01">Upload Image</label>
                                <input type="file" name="image" class="form-control" id="inputGroupFile01">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">name</label>
                                <input type="text" class="form-control" name="name" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>
                            <div class="mb-3">
                                <label for="prix" class="form-label">$Prix</label>
                                <input type="number" class="form-control" name="prix" id="prix" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantitue" class="form-label">quantitue</label>
                                <input type="number" class="form-control" name="quantitue" id="quantitue" required>
                            </div>
                            <div class="mb-3">
                                <label for="categorie" class="form-label">Categorie</label>
                                <select class="form-select" name="categorie" id="categorie">
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}" >{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <input type="hidden" class="form-control" name="user" id="user" value="{{ Auth::user()->id }}" required> --}}
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-wrap justify-content-xl-center d-flex" style="width: 100%; gap: 20px">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">name</th>
                    <th scope="col">Prix</th>
                    <th scope="col">quantitue</th>
                    <th scope="col">Categorie</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="table-light">
                @foreach($produits as $produit)
                    <tr>
                        <td style="width: 10%"><img src="{{ asset('storage/' . $produit->image) }}"></td>
                        <td><strong>{{ $produit->name }}</strong></td>
                        <td>${{ $produit->prix }}</td>
                        <td><span class="badge bg-primary">{{ $produit->quantitue }}</span></td>
                        {{-- <td><span class="badge bg-success">{{ $product->user->name }}</span></td> --}}
                        <td><span class="badge bg-primary">{{ $produit->categorie->name }}</span></td>
                        <td>
                            <form action="{{ url('/admin/produit/edit') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Update
                                </button>
                                <input type="hidden" name="product" value="{{ $produit->id }}">
                            </form>

                            <form action="{{ url('/admin/produit/delete') }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                                <input type="hidden" name="produit" value="{{ $produit->id }}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
