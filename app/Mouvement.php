<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    
    protected $primaryKey ='unique_id';
    protected $table="mouvement_mariage";
    protected $fillable = [
        'unique_id', 'prenom','nom','gradeact','date_mr','etabact','residencey','nomp_f','professionf','residencetf','datetf','daterecrutement',
        'year','month','day','notebid','datenotebid','nbrenfant','datedebut','matiere','etab_post_dis','created_at','updated_at','etat'
    ];


}
