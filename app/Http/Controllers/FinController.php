<?php

namespace App\Http\Controllers;


use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FinController extends Controller
{
     // Afficher toutes les interventions
     public function index()
     {
         // Récupérer toutes les interventions avec leurs relations (panne, technicien, utilisateur)
         $interventions = Intervention::with(['panne', 'technicien', 'utilisateur'])->get();
 
         // Retourner la vue avec les interventions
         return view('indexfin', compact('interventions'));
     }
 
     // Afficher un formulaire pour éditer une intervention
    // Afficher le formulaire pour éditer une intervention
 public function edit($id)
 {
     // Récupérer l'intervention à modifier
     $intervention = Intervention::findOrFail($id);
 
     // Retourner la vue d'édition avec l'intervention
     return view('editfin', compact('intervention'));
 }
 
 
     // Mettre à jour une intervention
    // Mettre à jour une intervention
 public function update(Request $request, $id)
 {
     // Récupérer l'intervention à mettre à jour
     $intervention = Intervention::findOrFail($id);
 
     // Validation des données envoyées
     $request->validate([
         'description' => 'required|string|max:255',
         'pieces_remplacees' => 'nullable|string|max:255',
         'date_fin' => 'nullable|date',
         'statut_intervention' => 'required|string|max:255',
     ]);
 
     // Mettre à jour l'intervention avec les nouvelles données
     $intervention->update([
         'description' => $request->input('description'),
         'pieces_remplacees' => $request->input('pieces_remplacees'),
         'date_fin' => $request->input('date_fin'),
         'statut_intervention' => $request->input('statut_intervention'),
     ]);
 
     // Rediriger vers la liste des interventions avec un message de succès
     return redirect()->route('interventions.index')->with('success', 'Intervention mise à jour avec succès.');
 }
}
