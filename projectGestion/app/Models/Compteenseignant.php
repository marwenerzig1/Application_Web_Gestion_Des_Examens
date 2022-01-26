<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compteenseignant extends Model
{
    protected $table = 'compteenseignant';
    protected $fillable = [ 
        'nom','prenom','role','mode','departement','login','password'
    ];
}
