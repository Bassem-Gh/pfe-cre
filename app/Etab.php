<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etab extends Model
{
    
    protected $primaryKey = 'codeetab';
    protected $table="etab";
    public $incrementing = false;
    protected $fillable = [
        'codeetab','codeetab','dre','categorie','libetab','typeetab','delegation','created_at','updated_at'
    ];
}
