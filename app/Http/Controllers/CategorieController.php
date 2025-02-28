<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = categorie::all();
        return view('admin.categorie' , compact('categories'));
    }
    public function createProduit(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'categorie_id' => 'required|integer|max:255',
            
        ]);

        categorie::create([
            'name' => $request->name,
            'description'=>$request->description,
            
        ]);
        return redirect()->route('admin.roles')->with('success', 'sucategorie ajouté avec succès!');

    }
    public function edit(categorie $categorie)
    {
        return view('admin.categorie_edit', compact('categorie'));
    }

    public function update(Request $request, categorie $sucategorie)
    {
        $request->validate([
            'name' => 'required|string|max:255',
           
        ]);

        $sucategorie->update([
            'name' => $request->name,
           ]);

        return redirect()->route('admin.role_edit')->with('success', 'sucategorie mis à jour!');
    }

    public function destroy(categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('admin.roles')->with('success', 'sucategorie supprimé!');
    }
}
