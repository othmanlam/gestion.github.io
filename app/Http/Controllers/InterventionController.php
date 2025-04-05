<?php

namespace App\Http\Controllers;

use App\Models\Panne;
use App\Models\Technicien;
use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    // Affiche la liste des pannes
    public function index()
    {
        $pannes = Panne::all();
        return view('pannes', compact('pannes'));
    }

    // Affiche les techniciens pour une panne donnée
    public function showTechniciens($panne_id)
    {
        $techniciens = Technicien::with('utilisateur')->get();
        return view('assign', compact('techniciens', 'panne_id'));
    }

    // Enregistre l'intervention avec technicien_id et panne_id
    public function assign(Request $request)
    {
        Intervention::create([
            'technicien_id' => $request->technicien_id,
            'panne_id' => $request->panne_id,
            'description' => null,
            'pieces_remplacees' => null,
            'date_fin' => null,
            'statut_intervention' => 'En cours',
        ]);

        return redirect()->route('interventions.index')->with('success', 'Technicien assigné avec succès !');
    }
}

