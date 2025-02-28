@extends('welcome')
@section('title', 'Catalogue')
@section('content')
    @foreach ($produits as $produit)
        <div class="bg-white shadow-lg rounded-lg p-6">
            <img src="{{ url('storage/'. $produit->image) }}" alt="{{ $produit->title }}" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $produit->title }}</h2>
            <p class="text-gray-600">{{ Str::limit($produit->description, 120) }}</p>
            <p class="text-lg font-bold text-blue-600 mt-2">{{ $produit->price }} €</p>
            <div class="flex gap-2">
                <form action="{{ url('/products/view') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 p-8" >View</button>
                    <input type="hidden" name="product" value="{{ $produit->id }}">
                </form>
                <form action="" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 p-8">Add to Cart</button>
                    <input type="hidden" name="product" value="{{ $produit->id }}">
                </form>
            </div>
        </div>
    @endforeach
@endsection
