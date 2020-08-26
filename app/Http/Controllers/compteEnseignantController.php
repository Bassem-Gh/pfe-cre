<?php


namespace App\Http\Controllers;
use App\Etab ;
use App\PosteEtab ;
use App\Grade;
use App\Mouvement;
use App\Score;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class compteEnseignantController extends Controller
{



public function show(){


}
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

    
    $data3 = DB::table('grade_ens')
    
    ->select('codegrade','libgrade')
    
    ->get();




      return view('c-enseignant.create', compact('data','data2','data3'));
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
   

    }

    /////////ajouter dans la table mouvement/////////
    
    public function store(Request $request)
    {
      $mouvement =new Mouvement([
       
       'unique_id'=>$request->get('unique_id'),
       'prenom'=>$request->get('prenom'),
       'nom'=>$request->get('nom'),
       'gradeact'=>$request->get('gradeact'),
       'date_mr'=>$request->get('date_mr'),
       'etabact'=>$request->get('etabact'),
       'residencey'=>$request->get('residencey'),
       'nomp_f'=>$request->get('nomp_f'),
       'professionf'=>$request->get('professionf'),
       'residencetf'=>$request->get('residencetf'),
       'datetf'=>$request->get('datetf'),
       'daterecrutement'=>$request->get('daterecrutement'),
       'year'=>$request->get('year'),
       'month'=>$request->get('month'),
       'day'=>$request->get('day'),
       'notebid'=>$request->get('notebid'),
       'datenotebid'=>$request->get('datenotebid'),
       'nbrenfant'=>$request->get('nbrenfant'),
       'matiere'=>$request->get('matiere'),
       'etab_post_dis'=>$request->get('etab_post_dis'),
       'datedebut'=>$request->get('datedebut'),
       

      
   ]);
   $mouvement->save();
  //dd($produit);
  return view('c-enseignant.index');
  /*  return redirect()->route('c-enseignant.create')
    ->with('success','etablissement created successfully.');*/
    }
    

    public function test(Request $request)
{

  if(Request()->ajax()) {
    $cc = $request->all();
}

$id=$cc['id'];

$data2 = DB::table('enseignant')
->select('unique_id')
->where('unique_id', '=', $id)

->get( );

return response()->json($data2);

}




public function insertscore(Request $request)
{ 
  if(Request()->ajax()) {
    $id = $request->all();
}
$uniqueid=$id['uniqueid'];
$score =$id['score'];



   $add_product =new Score([
                          'unique_id'=>$uniqueid,  
                          'score'=>$score,
                         
                        
                    ]);
                    $add_product ->save();


$response = array(
      'status' => 'success',
      'msg' => $request->message,
  );
  return response()->json($response); 


}



}
