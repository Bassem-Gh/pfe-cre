<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MouvementN extends Model
{
    
    protected $primaryKey ='unique_id2';
    protected $table="mouvement";
    protected $fillable = [
       
        'unique_id2','matiere','prenom', 'nom','date_ns','lieu','gouvernorat','tel','residencey','etatm','etat',
        'nomp_f','professionf','residencetf','etab_post_dis','nbrenfant','obstructionenf','obstructionp',
        'daterecrutement','datedemarcation','etats','etabact','datedebut','gradeact','notebid',  'datenotebid','decription','copybid',
       'copymariage', 'mathmoun', 'tasrih', 'copysec', 'copyikama'
    ];

}
