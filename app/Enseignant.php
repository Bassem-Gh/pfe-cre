<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    
    protected $primaryKey ='id';
    protected $table="enseignant";
    protected $fillable = [
        'id', 'sec_s', 'nom', 'prenom', 'email', 'telephone', 'sexe', 
    ];

}
