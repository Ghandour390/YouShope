<?php

namespace App\Http\Controllers;

use App\Models\sucategorie;
use Illuminate\Http\Request;

class SucategorieController extends Controller
{



    public function index(){
        $Sucategories = sucategorie::all();
        return view('admin.sucategorie' , compact('sucateories'));
    }
    public function createProduit(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'categorie_id' => 'required|integer|max:255',
            
        ]);

        sucategorie::create([
            'name' => $request->name,
            'description'=>$request->description,
            'categorie_id'=>$request->catedorie_id
        ]);
        return redirect()->route('admin.roles')->with('success', 'sucategorie ajouté avec succès!');

    }
    public function edit(sucategorie $sucategorie)
    {
        return view('admin.sucategorie_edit', compact('sucategorie'));
    }

    public function update(Request $request, sucategorie $sucategorie)
    {
        $request->validate([
            'name' => 'required|string|max:255',
           
        ]);

        $sucategorie->update([
            'name' => $request->name,
           ]);

        return redirect()->route('admin.role_edit')->with('success', 'sucategorie mis à jour!');
    }

    public function destroy(sucategorie $sucategorie)
    {
        $sucategorie->delete();
        return redirect()->route('admin.roles')->with('success', 'sucategorie supprimé!');
    }
}


