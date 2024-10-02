<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;

    protected $fillable = ['nom','description']; // Les attributs qui peuvent être assignés en masse

    // Définition de la relation avec Chapitre
    public function chapitres()
    {
        return $this->hasMany(Chapitres::class);
    }
}
