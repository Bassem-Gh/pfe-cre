<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    
    protected $primaryKey = 'codemat';
    protected $table="matiere";
    protected $fillable = [
        'libmat','codeniv','nbh','created_at','updated_at'
    ];


       
    public function niveau()
    {
        return $this->belongsToMany(Niveau::class, 'codemat', 'codeniv');
    }
}
