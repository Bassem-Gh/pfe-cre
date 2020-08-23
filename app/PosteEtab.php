<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosteEtab extends Model
{
     
    protected $primaryKey = 'id';
    protected $table="posteetab";
    //public $incrementing = false;
    protected $fillable = [
        'idetab','codemat','nbrpost','created_at','updated_at'
    ];

}
