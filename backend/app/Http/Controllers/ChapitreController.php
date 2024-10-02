<?php

namespace App\Http\Controllers;

use App\Models\Chapitres;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    /**
     * Affiche une liste de tous les chapitres.
     */

     public function index()
     {
        $chapitres = Chapitres::all();
        return response()->json($chapitres);
     }

     /**
     * Stock un nouveau chapitre.
     */

     public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'module_id' => 'required|exists:modules,id', // Assurez-vous que votre table est correcte
            'professeur' => 'required|string',
        ]);

        $chapitre = Chapitres::create($request->all());
        return response()->json($chapitre, 201);
    }

    /**
     * Affiche un chapitre spécifique par ID.
     */
    public function show($id)
    {
        $chapitre = Chapitres::findOrFail($id);
        return response()->json($chapitre);
    }

    /**
     * Met à jour un chapitre existant.
     */
    public function update(Request $request, $id)
    {
        $chapitre = Chapitres::findOrFail($id);

        $request->validate([
            'titre' => 'sometimes|required|string',
            'module_id' => 'sometimes|required|exists:modules,id',
            'professeur' => 'sometimes|required|string',
        ]);

        $chapitre->update($request->all());
        return response()->json($chapitre);
    }

    /**
     * Supprime un chapitre existant.
     */
    public function destroy($id)
    {
        $chapitre = Chapitres::findOrFail($id);
        $chapitre->delete();
        return response()->json(null, 204);
    }


}
