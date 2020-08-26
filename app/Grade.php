<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $primaryKey = 'codegrade';
    protected $table="grade_ens";
    protected $fillable = [
        'libgrade','created_at','updated_at'
    ];
}
