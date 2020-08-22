<?php


namespace App\Http\Controllers;
use App\Etab ;
use App\Niveau;
use App\Classe;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class compteEnseignantController extends Controller
{
  
  public function create()
  {
    $data = DB::table('etab')
    ->join('typeetab', 'typeetab.codetype', '=', 'etab.typeetab')
    ->join('delegation', 'delegation.code', '=', 'etab.delegation')
    
    ->select('etab.codeetab as id','etab.libetab' )
    
    ->get();

      return view('c-enseignant.create', compact('data'));
  }
}
