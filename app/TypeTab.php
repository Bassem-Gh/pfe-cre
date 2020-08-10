<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTab extends Model
{
    
    protected $primaryKey = 'codetype';
    protected $table="typeetab";
    protected $fillable = [
        'libtype','created_at','updated_at'
    ];
}
