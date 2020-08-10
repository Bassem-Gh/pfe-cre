<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegation extends Model
{
    protected $primaryKey = 'code';
    protected $table="delegation";
    protected $fillable = [
        'lib','created_at','updated_at'
    ];
}
