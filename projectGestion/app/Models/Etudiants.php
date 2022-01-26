<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    protected $table = 'etudiant';
    protected $fillable = [ 
        'nom','prenom','nom_Classe' , 'nom_Section', 'place' , 'matiere' , 'note' 
    ];
}
