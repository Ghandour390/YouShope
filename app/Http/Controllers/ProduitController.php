<?php

namespace App\Http\Controllers;


use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index(){
        $produits = Produit::all();
        return view('client.produits' , compact('produits'));
    }
    public function createProduit(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|float',
            'quantitue' => 'required|integer',
            'sucategorie_id' => 'required|integer',
        ]);

        Produit::create([
            'name' => $request->name,
            'image'=>$request->image,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantitue'=>$request->quantitue,
            'sucategorie_id' => $request->sucategorie_id ,

        ]);
        return redirect()->route('produit.index')->with('success', 'produit ajouté avec succès!');

    }
    public function edit(Produit $produit)
    {
        return view('produit.edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|float',
            'quantitue' => 'required|integer',
            'sucategorie_id' => 'required|integer',
        ]);

        $produit->update([
            'name' => $request->name,
            'image'=>$request->image,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantitue'=>$request->quantitue,
            'sucategorie_id' => $request->sucategorie_id ]);

        return redirect()->route('produit.index')->with('success', 'produit mis à jour!');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produit.index')->with('success', 'produit supprimé!');
    }
}
