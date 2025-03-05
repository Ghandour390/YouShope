<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Sucategorie;
use Illuminate\Http\Request;

class SucategorieController extends Controller
{
    public function index()
    {
        $sucategories = sucategorie::all();
        $categories= categorie::all();
        // dd($sucategories);
        // dd($categories);
        
        // return view('admin.sucategories',compact('sucategories','categories'))
        return view('admin.sucategories')->with('categories',$categories)
        ->with('sucategories',$sucategories);
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

    public function edit($id)
    {
        $sucategorie= sucategorie::find($id);
        $categories =categorie::all();
        return view('admin.sucategorie_edit', compact('sucategorie','categories'));
    }
    public function update(Request $request , sucategorie $sucategorie)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
      
        // $categorie = new categorie();
        $sucategorie->name = $request->name ;
        $sucategorie->categorie_id;
        $sucategorie->description = $request->description ;
        
        // $sucategorie->save();
        // echo "Ascascasc";
        // die();
        return redirect()->route('admin.sucategories')->with('success', 'Catégorie mise à jour avec succès !');
    }

    
    public function destroy(Request $request)
    { if($request->id ){
        $sucategorie=categorie::find($request->id);
        $sucategorie->delete();
        
    }
    return redirect()->route('admin.sucategories')->with('success', 'sucatégorie supprimée avec succès !');
       
    }
}
