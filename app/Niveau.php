<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $primaryKey = 'codeniv';
    protected $table="niveau";
    protected $fillable = [
        'codeniv','libniv','sect','created_at','updated_at'
    ];
}
