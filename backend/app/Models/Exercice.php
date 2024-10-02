<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'chapitre_id',
        'corrige',
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapitres::class);
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
