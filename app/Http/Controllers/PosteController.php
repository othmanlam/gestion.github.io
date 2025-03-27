<?php

namespace App\Http\Controllers;

use App\Models\;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    public function index()
    {
        $postes = Poste::all();
        return view('postes.index', compact('postes'));
    }

    public function create()
    {
        return view('postes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_poste' => 'required',
            'description' => 'required'
        ]);

        Poste::create($request->all());

        return redirect()->route('postes.index')->with('success', 'Poste ajouté avec succès');
    }

    public function edit($id)
    {
        $poste = Poste::findOrFail($id);
        return view('postes.edit', compact('poste'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_poste' => 'required',
            'description' => 'required'
        ]);

        $poste = Poste::findOrFail($id);
        $poste->update($request->all());

        return redirect()->route('postes.index')->with('success', 'Poste mis à jour avec succès');
    }

    public function destroy($id)
    {
        $poste = Poste::findOrFail($id);
        $poste->delete();

        return redirect()->route('postes.index')->with('success', 'Poste supprimé avec succès');
    }
}
