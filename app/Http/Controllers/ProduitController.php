<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
   
    public function index()
    {
        $produits = Produit::all();
        return view('client.produits', compact('produits'));
    }


    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('client.product_view', compact('produit'));
    }

   
    public function create()
    {
        return view('admin.produit_edit'); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'quantitue' => 'required|integer',
            'sucategorie_id' => 'required|integer',
        ]);

        Produit::create($request->all());
        return redirect()->route('admin.produits')->with('success', 'Produit ajouté avec succès !');
    }

   
    public function edit(Produit $produit)
    {
        return view('admin.produit_edit', compact('produit'));
    }

  
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'quantitue' => 'required|integer',
            'sucategorie_id' => 'required|integer',
        ]);

        $produit->update($request->all());
        return redirect()->route('admin.produits')->with('success', 'Produit mis à jour avec succès !');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('admin.produits')->with('success', 'Produit supprimé avec succès !');
    }
}
