<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importation ajoutée
use Illuminate\Support\Facades\Validator;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercices = Exercice::all();
        return response()->json($exercices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'chapitre_id' => 'required|exists:chapitres,id',
            'corrige' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $exercice = Exercice::create($request->all());
        return response()->json($exercice, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exercice = Exercice::findOrFail($id);
        return response()->json($exercice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercice $exercice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $exercice = Exercice::findOrFail($id);

        $request->validate([
            'type' => 'sometimes|required|string',
            'chapitre_id' => 'sometimes|required|exists:chapitres,id',
            'corrige' => 'nullable|string',
        ]);

        $exercice->update($request->all());
        return response()->json($exercice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exercice = Exercice::findOrFail($id);
        $exercice->delete();
        return response()->json(null, 204);
    }

    public function storeReponse(Request $request, $exerciceId)
    {
        $request->validate([
            'contenu' => 'required|string',
            'est_correct' => 'required|boolean',
        ]);

        $reponse = Reponse::create([
            'exercice_id' => $exerciceId,
            'contenu' => $request->contenu,
            'est_correct' => $request->est_correct,
        ]);

        return response()->json($reponse, 201);
    }
}
