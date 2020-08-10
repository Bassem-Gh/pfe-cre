<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeHorraire extends Model
{
    
    protected $primaryKey = ['codetab','codniv','codsect','anscol'];
    protected $table="etab";
    protected $fillable = [
        'codetab','nbclasse','nbhe','created_at','updated_at'
    ];
}

