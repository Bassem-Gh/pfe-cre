<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $primaryKey = 'codegrade';
    protected $table="grade";
    protected $fillable = [
        'libgrade','created_at','updated_at'
    ];
}
