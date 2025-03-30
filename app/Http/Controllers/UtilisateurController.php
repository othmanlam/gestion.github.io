<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = User::all();
        return view('index', compact('utilisateurs'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'email' => 'required|email|unique:utilisateurs',
        'role' => 'required',
        'mot_de_passe' => 'required|min:6', 
    ]);
    
    $data = $request->all();
    $data['mot_de_passe'] = bcrypt($request->password);

    User::create($data);

    return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur ajouté avec succès');
}

    public function edit($id)
    {
        $utilisateur = User::findOrFail($id);
        return view('edit', compact('utilisateur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:utilisateurs,email,' . $id,
            'role' => 'required'
        ]);

        $utilisateur = User::findOrFail($id);
        $utilisateur->update($request->all());

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy($id)
    {
        $utilisateur = User::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
