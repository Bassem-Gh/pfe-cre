<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    
    protected $primaryKey ='id';
    protected $table="enseignant";
    protected $fillable = [
        'id','unique_id', 'sec_s', 'nom', 'prenom','nom_fr','prenom_fr', 'cin_f','photo','adresse','email','password', 'telephone', 'sexe', 
        'date_n','lieu_n','situation_f','nbr_enf','date_r','statu','date_s','fonction','date_f','designation_grade','matiere'
    ];

}
