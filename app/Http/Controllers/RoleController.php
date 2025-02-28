<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('admin.roles' , compact('roles'));
    }
    public function createProduit(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            
        ]);

        Role::create([
            'name' => $request->name,
        

        ]);
        return redirect()->route('admin.roles')->with('success', 'role ajouté avec succès!');

    }
    public function edit(Role $role)
    {
        return view('admin.role_edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
           
        ]);

        $role->update([
            'name' => $request->name,
           ]);

        return redirect()->route('admin.role_edit')->with('success', 'role mis à jour!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles')->with('success', 'role supprimé!');
    }
}
