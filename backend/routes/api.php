<?php

use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\ModuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->group(function(){
    // Routes pour les modules
    Route::get('/modules', [ModuleController::class, 'index']);//Afficher tous les modules
    Route::get('/modules/create', [ModuleController::class, 'create']); // Obtenir les données pour créer un module
    Route::post('/modules', [ModuleController::class, 'store']);//créer un module
    Route::get('/modules/{id}', [ModuleController::class, 'show']);//Récupére un module par ID
    Route::get('/modules/edit', [ModuleController::class, 'edit']);//Afficher le formulaire de mise à jour
    Route::put('/modules/{id}', [ModuleController::class, 'update']);//Modifier un module
    Route::delete('/modules/{id}', [ModuleController::class, 'destroy']);//Supprimer un module

    // Routes pour les chapitres
    Route::get('/chapitres', [ChapitreController::class, 'index']); // Récupérer tous les chapitres
    Route::get('/chapitres/create', [ChapitreController::class, 'create']); // Obtenir les données pour créer un module
    Route::post('/chapitres', [ChapitreController::class, 'store']); // Créer un nouveau chapitre
    Route::get('/chapitres/{id}', [ChapitreController::class, 'show']); // Récupérer un chapitre par ID
    Route::get('/chapitres/edit', [ChapitreController::class, 'edit']); //Afficher le formulaire de mise à jour
    Route::put('/chapitres/{id}', [ChapitreController::class, 'update']); // Mettre à jour un chapitre
    Route::delete('/chapitres/{id}', [ChapitreController::class, 'destroy']); // Supprimer un chapitre

    // Routes pour les exercices
    Route::get('/exercices', [ExerciceController::class, 'index']);
    Route::post('/exercices', [ExerciceController::class, 'store']);
    Route::get('/exercices/{id}', [ExerciceController::class, 'show']);
    Route::put('/exercices/{id}', [ExerciceController::class, 'update']);
    Route::delete('/exercices/{id}', [ExerciceController::class, 'destroy']);

    // Route pour reponse
    Route::post('/exercices/{id}/reponses', [ExerciceController::class, 'storeReponse']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
