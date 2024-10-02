<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercice_id', // Ajoutez cette ligne
        'contenu',
        'est_correct',
    ];

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }
}
