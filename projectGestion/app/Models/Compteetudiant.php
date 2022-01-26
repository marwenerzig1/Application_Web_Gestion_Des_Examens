<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compteetudiant extends Model
{
    protected $table = 'compteetudiant';
    protected $fillable = [ 
        'nom','prenom','matricule','classe','mode','departement','section','login','password'
    ];
}
