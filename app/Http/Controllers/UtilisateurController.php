<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Technicien;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = User::all();
        $utilisateurs = User::with('technicien')->get(); 
        return view('index', compact('utilisateurs'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:Admin,Employé,Technicien,AgentHyperdesk',
            'mot_de_passe' => 'required|min:6',
        ]);

        $utilisateur = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => bcrypt($request->mot_de_passe),
            'role' => $request->role,
        ]);

        // Si c'est un technicien, on enregistre ses infos dans la table techniciens
        if ($request->role === 'Technicien') {
            $request->validate([
                'specialite' => 'required|string|max:255',
                'charge_de_travail' => 'required|integer|min:0',
                'disponible' => 'required|boolean',
            ]);

            Technicien::create([
                'utilisateur_id' => $utilisateur->id,
                'specialite' => $request->specialite,
                'charge_de_travail' => $request->charge_de_travail,
                'disponible' => $request->disponible,
            ]);
        }

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur ajouté avec succès');
    }

    public function edit($id)
    {
        $utilisateur = User::findOrFail($id);

        return view('edit', compact('utilisateur'));
    }

    public function update(Request $request, $id)
    {
        $utilisateur = User::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:Admin,Employé,Technicien,AgentHyperdesk',
        ]);

        // Mise à jour sans écraser le mot de passe s'il n'est pas modifié
        $data = $request->only(['nom', 'email', 'role']);
        if ($request->filled('mot_de_passe')) {
            $data['mot_de_passe'] = bcrypt($request->mot_de_passe);
        }

        $utilisateur->update($data);

        // Mettre à jour les informations du technicien
        if ($request->role === 'Technicien') {
            $request->validate([
                'specialite' => 'required|string|max:255',
                'charge_de_travail' => 'required|integer|min:0',
                'disponible' => 'required|boolean',
            ]);

            Technicien::updateOrCreate(
                ['utilisateur_id' => $utilisateur->id],
                [
                    'specialite' => $request->specialite,
                    'charge_de_travail' => $request->charge_de_travail,
                    'disponible' => $request->disponible,
                ]
            );
        } else {
            // Supprimer l'entrée dans la table techniciens si l'utilisateur n'est plus un technicien
            Technicien::where('utilisateur_id', $utilisateur->id)->delete();
        }

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy($id)
    {
        $utilisateur = User::findOrFail($id);
        $utilisateur->delete();

        // Supprimer aussi le technicien s'il en a un
        Technicien::where('utilisateur_id', $id)->delete();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
