<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $table = 'matiere';
    protected $fillable = [ 
        'nom_Matiere','nom_Section','nom_Classe' , 'prof_Matiere' , 'surveillant1' , 'surveillant2' , 'classe' , 'heure' , 'date'   
    ];
}
