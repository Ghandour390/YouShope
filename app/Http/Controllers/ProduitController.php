<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Produit;
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

    
    public function store(Request $request , Produit $produit)
    {

        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $path = $request->file('image')->store('public/images');
    
    
        $fileName = str_replace('public/', '', $path);
        $produit->name =$request->name;
        $produit->image=$fileName;
        $produit->description=$request->prix;
        $produit->prix=$request->quantitue;
        $produit->sucategorie_id->$request->categorie;


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
