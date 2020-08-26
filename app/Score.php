<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    
    protected $primaryKey = 'idscore';
    protected $table="scoremv";
    protected $fillable = [
        'unique_id','score','created_at','updated_at'
    ];
}
