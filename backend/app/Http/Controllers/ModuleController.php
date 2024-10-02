<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    //Afficher tous les modules
    public function index()
    {
        $modules = Modules::all();
        return response()->json($modules);//retourne tous les modules en JSON car c'est un api
    }

    // Afficher le formulaire pour l'ajout d'un module
    public function create()
    {
        return response()->json([
            'message' => 'Formulaire de création de module'
        ]);
    }

    // Créer un module
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        $module = Modules::create($request->all());
        return response()->json($module, 201); //retourne le module créer
    }

    // Afficher un module spécifique
    public function show($id)
    {
        $module = Modules::findOrFail($id);
        return response()->json($module);//retourne le module
    }

    //Afficher le formulaire de mise à jour
    public function edit()
    {
        return response()->json([
            'message' => 'Formulaire de mise à jour'
        ]);
    }

    // Mis à jour d'un module
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        $module = Modules::findOrFail($id);
        $module->update($request->all());
        return response()->json($module);//retourne le module mis à jour
    }

    // Suppression d'un module
    public function destroy($id)
    {
        $module = Modules::findOrFail($id);
        $module->delete();
        return response()->json(null, 204);
    }
}
