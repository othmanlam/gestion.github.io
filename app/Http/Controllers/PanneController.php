<?php

namespace App\Http\Controllers;

use App\Models\panne;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanneController extends Controller
{
    /**
     * Afficher les pannes assignées à l'utilisateur connecté.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        // Récupérer les pannes assignées à l'utilisateur
        $pannes = Poste::where('responsable_id', Auth::id())->get(); // Récupère les pannes pour le responsable connecté
        return view('indexPanne', compact('pannes'));
    }

    /**
     * Afficher le formulaire de création d'une panne.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        return view('panne.create');
    }

    /**
     * Enregistrer une nouvelle panne.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        $request->validate([
            'poste_id' => 'required|exists:postes,id',
            'type_panne' => 'required',
            'date_signalement' => 'required|date',
            'statut' => 'required|in:Disponible,En Panne,En Réparation',
            'responsable_id' => 'required|exists:users,id',
        ]);

        Panne::create($request->all());

        return redirect()->route('pannes.index')->with('success', 'Panne enregistrée avec succès.');
    }

    /**
     * Afficher les détails d'une panne.
     */
    public function show(panne $panne)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        if (Auth::id() !== $panne->responsable_id) {
            return redirect()->route('pannes.index')->with('error', 'Accès refusé.');
        }

        return view('panne.show', compact('panne'));
    }

    /**
     * Modifier une panne.
     */
    public function edit(panne $panne)
    {
        //
    }

    /**
     * Mettre à jour une panne.
     */
    public function update(Request $request, Panne $panne)
    {
       //
    }

    /**
     * Supprimer une panne.
     */
    public function destroy(panne $panne)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        $panne->delete();

        return redirect()->route('pannes.index')->with('success', 'Panne supprimée avec succès.');
    }

    /**
     * Signaler un problème sur une panne.
     */
    public function signalerProbleme(Request $request, panne $panne)
    {
        if (!Auth::check()) {
            return redirect()->route('signup')->with('error', 'Vous devez être connecté.');
        }

        if (Auth::id() !== $panne->responsable_id) {
            return redirect()->route('panne')->with('error', 'Vous ne pouvez signaler un problème que sur vos propres pannes.');
        }

        $request->validate([
            'probleme' => 'required|string|max:500',
        ]);

        // Enregistrer le problème dans la panne (exemple simple)
        $panne->probleme = $request->probleme;
        $panne->save();

        return redirect()->route('mes.pannes')->with('success', 'Problème signalé avec succès.');
    }

    /**
     * Afficher le formulaire pour déclarer un problème.
     */
    public function declarerProbleme($id)
    {
        $poste = Poste::findOrFail($id);  // Récupère le poste
        return view('declarer', compact('poste'));
    }

    /**
     * Enregistrer la déclaration de problème.
     */
    public function storeDeclaration(Request $request, $id)
    {
        $request->validate([
            'type_panne' => 'required|string|max:255',
            'date_signalement' => 'required|date',
            'statut' => 'required|string|max:255',
        ]);

        // Enregistrer la déclaration de panne
        panne::create([
            'poste_id' => $id,
            'employe_id' => auth()->User()->id,  // L'employé actuellement connecté
            'type_panne' => $request->type_panne,
            'date_signalement' => $request->date_signalement,
            'statut' => $request->statut,
        ]);

        return redirect()->route('pannes.index')->with('success', 'Problème signalé avec succès');
    }
    public function demandeSuivi()
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('signup')->with('error', 'Vous devez être connecté.');
        }
    
        // Récupérer toutes les pannes où un problème a été déclaré
        $pannes = panne::all(); 
        $pannes = Panne::with(['poste', 'responsable'])->get();
                return view('demandeSuivi', compact('pannes'));
    }
}   