<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    
    protected $primaryKey ='idabs';
    protected $table="absence";
    protected $fillable = [
       'id_ensg','nbr_jour','created_at','updated_at'
    ];

}
