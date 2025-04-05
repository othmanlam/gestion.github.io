<?php

namespace App\Http\Controllers;

use App\Models\panne;
use App\Models\Technicien;
use App\Models\User;
use App\Models\Intervention;
use Illuminate\Http\Request;

class AssignerController extends Controller
{
    /**
     * Display a listing of the pannes.
     */
    public function index()
    {
        // Retrieve all pannes
        $pannes = panne::with(['poste', 'responsable'])->get();

        return view('indexassigner', compact('pannes'));
    }

    /**
     * Show available technicians for a specific panne.
     */
    public function showTechnicians($panne_id)
    {
        // Retrieve panne by id
        $panne = Panne::find($panne_id);

        // Get technicians and their associated users, with count of interventions
        $techniciens = Technicien::with('utilisateur')  // Load associated user with each technician
                                  ->withCount('interventions')  // Count interventions for workload
                                  ->get();

        return view('assignerTechnician', compact('panne', 'techniciens'));
    }

    /**
     * Store the technician assignment in the interventions table.
     */
    public function storeAssignment(Request $request)
{
    $validated = $request->validate([
        'technicien_id' => 'required|exists:techniciens,id',
        'panne_id' => 'required|exists:pannes,id',
        'description' => 'nullable|string',
    ]);

    // Vérifier si le technicien existe dans la table utilisateurs
    $technicien = Technicien::find($validated['technicien_id']);
    if (!$technicien || !$technicien->utilisateur) {
        return redirect()->route('assigner.index')->with('error', 'Technicien non valide.');
    }

    Intervention::create([
        'technicien_id' => $request->technicien_id,
        'panne_id' => $request->panne_id,
        'description' => null,
        'pieces_remplacees' => null,
        'date_fin' => null,
        'statut_intervention' => 'En cours',
    ]);

    return redirect()->route('indexassigner')->with('success', 'Technicien assigné avec succès');
}


    
}
