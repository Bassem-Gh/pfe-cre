<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $primaryKey = 'codesection';
    protected $table="section";
    protected $fillable = [
        'libsection','created_at','updated_at'
    ];
}
