<?php


namespace App\Http\Controllers;
use App\Etab ;
use App\PosteEtab ;
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

      
    $data2 = DB::table('matiere')
    
    ->select('matiere.codemat','matiere.libmat')->distinct()
    
    ->get();



      return view('c-enseignant.create', compact('data','data2'));
  }



    public function getetab(Request $request){
   
      if(Request()->ajax()) {
        $id = $request->all();
    }

    $gg=$id['ccod'];
$c=0;
    $data = DB::table('posteetab')
    ->join('etab', 'etab.codeetab', '=', 'posteetab.idetab')
    ->join('matiere', 'matiere.codemat', '=', 'posteetab.codemat')

    ->where('posteetab.codemat','=',$gg)
    ->where('posteetab.nbrpost','>',0)
    ->select('posteetab.idetab','etab.libetab','posteetab.nbrpost')->distinct()
    ->get();
return response ($data);

    }


  public function insertpost(Request $request)
    { 
      if(Request()->ajax()) {
        $id = $request->all();
    }
    $nbr=$id['nbrposte'];
    $idetab =$id['idetab'];
    $codemat = $id['codemat'];
    
    //$nbr = $request->nbr;
    //$idetab = $request->idetab;
    //$codemat = $request->codemat;

      
    $data = DB::table('posteetab')
    ->join('etab', 'etab.codeetab', '=', 'posteetab.idetab')
    ->join('matiere', 'matiere.codemat', '=', 'posteetab.codemat')
    ->where('posteetab.idetab','=',$idetab )
    ->where('posteetab.codemat','=',$codemat)
    ->select('posteetab.nbrpost', 'posteetab.codemat', 'posteetab.idetab')
    
    ->get();

 foreach($data as $row){
if($row->nbrpost !=$nbr){

}
 }

        
    
       $add_product =new PosteEtab([
                              'idetab'=>$idetab,  
                              'codemat'=>$codemat,
                              'nbrpost'=>$nbr,
                            
                        ]);
                        $add_product ->save();


  $response = array(
          'status' => 'success',
          'msg' => $request->message,
      );
      return response()->json($response); 
      /*
        if($add_product){
          echo "done";
        }else{
          echo "c'est informations exist déja";
        }*/
    

    }
}
