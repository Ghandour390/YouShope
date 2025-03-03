<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Categorie::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Catégorie ajoutée avec succès !');
    }

    
    public function edit(Categorie $categorie)
    {
        return view('admin.categorie_edit', compact('categorie'));
    }

    
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $categorie->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Catégorie mise à jour avec succès !');
    }

    
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('admin.categories')->with('success', 'Catégorie supprimée avec succès !');
    }
}
