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
            // dd($request);
        Categorie::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Catégorie ajoutée avec succès !');
    }

    
    public function edit( $id)
    {
       $categorie = categorie::find($id);
        return view('admin.categorie_edit',compact('categorie'));
    }
    // public function edit($request ,$categorie) {
    //    return view('admin.categorie-edit' , compact('categorie'));
    // }
    
    public function update(Request $request , categorie $categorie)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
      
        // $categorie = new categorie();
        $categorie->name = $request->name ;
        $categorie->description = $request->description ;
        $categorie->save();
        // echo "Ascascasc";
        // die();
        return redirect()->route('admin.categories')->with('success', 'Catégorie mise à jour avec succès !');
    }

    
    public function destroy(Request $request)
    { if($request->id ){
        $categorie=categorie::find($request->id);
        $categorie->delete();
        
    }
    return redirect()->route('admin.categories')->with('success', 'Catégorie supprimée avec succès !');
       
    }
}
