<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\User; // Assurez-vous d'inclure le modèle User pour les responsables
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Afficher la liste des postes.
     */
    public function index()
    {
        $postes = Poste::all();
        return view('indexP', compact('postes'));
    }

    /**
     * Afficher le formulaire de création d'un poste.
     */
    public function create()
    {
        $responsables = User::all();
        return view('createP', compact('responsables'));
    }

    /**
     * Enregistrer un nouveau poste.
     */
    public function store(Request $request)
{
    
    $request->validate([
        'numero_serie' => 'required|unique:postes',
        'modele' => 'required',
        'emplacement' => 'required',
        'responsable_id' => [
            'required',
            'integer',
            function ($attribute, $value, $fail) {
                if (!\App\Models\User::where('id', $value)->exists()) {
                    $fail("Le responsable sélectionné est invalide.");
                }
            },
        ],
        'etat' => 'required|in:Disponible,En Panne,En Réparation'
    ]);
    
    Poste::create($request->all());
    
    return redirect()->route('postes.index')->with('success', 'Poste ajouté avec succès.');
    

}

 

    /**
     * Afficher un poste spécifique.
     */
    public function show($id)
    {
        $poste = Poste::findOrFail($id);
        return view('postes.show', compact('poste'));
    }

    public function edit($id)
    {
        $poste = Poste::findOrFail($id);
        $responsables = User::whereIn('role', ['Employé'])->get();
        
        
    
        return view('editposte', compact('poste', 'responsables'));
    }
    

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'numero_serie' => 'required|unique:postes,numero_serie,' . $id,
            'modele' => 'required',
            'emplacement' => 'required',
            'responsable_id' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    if (!\App\Models\User::where('id', $value)->exists()) {
                        $fail("Le responsable sélectionné est invalide.");
                    }
                },
            ],
            'etat' => 'required|in:Disponible,En Panne,En Réparation'
        ]);
    
        // Récupérer le poste à mettre à jour
        $poste = Poste::findOrFail($id);
    
        // Mise à jour du poste avec les données validées
        $poste->update([
            'numero_serie' => $request->numero_serie,
            'modele' => $request->modele,
            'emplacement' => $request->emplacement,
            'responsable_id' => $request->responsable_id,
            'etat' => $request->etat,
        ]);
    
        // Rediriger vers la liste des postes avec un message de succès
        return redirect()->route('postes.index')->with('success', 'Poste mis à jour avec succès.');
    }
    /**
     * Supprimer un poste.
     */
    public function destroy($id)
    {
        // Récupérer et supprimer le poste
        $poste = Poste::findOrFail($id);
        $poste->delete();

        // Rediriger vers la liste des postes avec un message de succès
        return redirect()->route('postes.indexP')->with('success', 'Poste supprimé avec succès.');
    }
}
