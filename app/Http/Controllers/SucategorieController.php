<?php

namespace App\Http\Controllers;

use App\Models\Sucategorie;
use Illuminate\Http\Request;

class SucategorieController extends Controller
{
    public function index()
    {
        $souscategories = Sucategorie::all();
        return view('admin.sucategories', compact('sucategories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:40',
            'description' => 'required|string|max:200',
            'categorie_id' => 'required|integer|exists:categories,id',
        ]);

        Sucategorie::create([
            'name' => $request->name,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('admin.sucategories')->with('success', 'Sous-catégorie ajoutée avec succès !');
    }

    public function edit(Sucategorie $sucategorie)
    {
        return view('admin.sucategorie_edit', compact('sucategorie'));
    }
    public function update(Request $request, Sucategorie $sucategorie)
    {
        $request->validate([
            'name' => 'required|string|max:40',
            'description' => 'required|string|max:200',
            'categorie_id' => 'required|integer|exists:categories,id',
        ]);

        $sucategorie->update([
            'name' => $request->name,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('admin.sucategories')->with('success', 'Sous-catégorie mise à jour avec succès !');
    }
    public function destroy(Sucategorie $sucategorie)
    {
        $sucategorie->delete();
        return redirect()->route('admin.sucategories')->with('success', 'Sucatégorie supprimée avec succès !');
    }
}
