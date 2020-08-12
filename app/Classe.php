<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $primaryKey = ['codetab','codeniv','anscol'];
    protected $table="classe";
    protected $fillable = [
        'codetab','codeniv','anscol','nbclasse','created_at','updated_at'
    ];


    public function niveau()
    {
        return $this->belongsToMany(Niveau::class, 'codemat', 'codeniv');
    }
}
