<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
       
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // public function create()
    // {
    //     return view('users.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|unique:users',
    //         'password' => 'required|string|min:6',
    //         'role_id' => 'required|integer',
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role_id' => $request->role_id ?? 1
    //     ]);

    //     return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès!');
    // }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
           
            'nom' => 'required|string|max:20',
            'prenom' => 'required|string|max:20',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role_id' => 'required|integer',
        ]);

        $user->update([
            'nome' => $request->nome,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé!');
    }
}
