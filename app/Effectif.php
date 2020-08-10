<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Effectif extends Model
{
    
    protected $primaryKey = ['codetab','codemat','anscol'];
    protected $table="effectif";
    protected $fillable = [
        'nb12','nb15','nb16','nb18','nb05','created_at','updated_at'
    ];


}
