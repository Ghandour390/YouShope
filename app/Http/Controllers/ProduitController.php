<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Produit;
use App\Models\sucategorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
   
    public function index()
    {
        $produits = Produit::all();
        $categories = categorie::all();
        return view('admin.produits', compact('produits','categories'));
    }


    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('client.produit_view', compact('produit'));
    }

   
    // public function create()
    // {
    //     return view('admin.produits'); 
    // }

    
    public function store(Request $request )
    {

      
        $request->validate([
            'name'=>'required | string',
            'description'=>'required | string',
            'sucategorie_id'=>'required|integer|exists:sucategories,id',
            'prix' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantitue' => 'required|integer|min:1',
        ]);

        dd($request);
        $path = $request->file('image')->store('produits', 'public');

     
    
    
        Produit::create([
            'name' => $request->name,
            'sucategorie_id' => $request->sucategorie_id,
            'prix' => $request->prix,
            'quantitue' => $request->quantite,
            'image' => $path,
        ]);


        return redirect()->route('admin.produits')->with('success', 'Produit ajouté avec succès !');
    }

   
    public function edit($id)
    {
        produit::find($id);
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
