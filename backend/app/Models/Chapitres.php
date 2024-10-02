<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitres extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'module_id','professeur']; // Les attributs qui peuvent être assignés en masse

    // Définition de la relation avec Module
    public function module()
    {
        return $this->belongsTo(Modules::class);
    }
}
