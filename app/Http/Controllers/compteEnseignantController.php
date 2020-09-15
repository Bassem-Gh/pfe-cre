<?php


namespace App\Http\Controllers;
use App\Etab ;
use App\PosteEtab ;
use App\Grade;
use App\Mouvement;
use App\MouvementN;
use App\Enseignant;
use App\Score;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use pdf;
use Illuminate\Support\Facades\Hash;
class compteEnseignantController extends Controller
{
/*
  public function c()
  {
    $user = auth()->user();

    $uid=$user->unique_id;

    $data = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
    ->leftJoin('matiere', 'matiere.codemat', '=', 'enseignant.matiere')
    ->select( 'enseignant.nom','enseignant.nom_fr','enseignant.telephone','enseignant.situation_f','enseignant.nbr_enf','enseignant.sexe','enseignant.sec_s','enseignant.lieu_n','enseignant.date_n','enseignant.adresse', 'grade_ens.libgrade','enseignant.prenom','enseignant.prenom_fr','enseignant.nbr_enf','matiere.libmat','matiere.codemat' )
->distinct()   
->where('enseignant.unique_id','=',$uid)
->get();
    return view('c-enseignant.index', compact('data'));
  }*/

  //////create mouvement mariage //////
  public function create()
  { $user = auth()->user();

    $uid=$user->unique_id;



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

    $data4 = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
    ->leftJoin('matiere', 'matiere.codemat', '=', 'enseignant.matiere')
->select( 'enseignant.nom', 'grade_ens.libgrade','enseignant.prenom','enseignant.nbr_enf','matiere.libmat','matiere.codemat' )
->distinct()   
->where('enseignant.unique_id','=',$uid)
->get();



  return view('c-enseignant.mv', compact('data','data2','data3','data4'));

  }




/////////create mouvement normal //////////
public function create2()
{
  $user = auth()->user();

    $uid=$user->unique_id;

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


    $data4 = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
    ->leftJoin('matiere', 'matiere.codemat', '=', 'enseignant.matiere')
->select( 'enseignant.nom', 'grade_ens.libgrade','enseignant.prenom','enseignant.nbr_enf','matiere.libmat','matiere.codemat' )
->distinct()   
->where('enseignant.unique_id','=',$uid)
->get();


    return view('c-enseignant.mv2', compact('data','data2','data3','data4'));
}





///////////////////





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
      $this->validate($request, [
     
        'prenom' => ['required'],
       'nom' => ['required'],
       'gradeact' => ['required'],
        'date_mr' => ['required'],
        'etabact' => ['required'],
        'residencey' => ['required'],
       'nomp_f' => ['required'],
       'professionf' => ['required'],
        'residencetf' => ['required'],
        'datetf' => ['required'],
         'daterecrutement' => ['required'],
        'year' => ['required'],
       'month' => ['required'],
       'day' => ['required'],
        'residencetf' => ['required'],
        'notebid' => ['required'],
        'datenotebid' => ['required'],
        'nbrenfant' => ['required'],
       'matiere' => ['required'],
       'etab_post_dis' => ['required'],
        'datedebut' => ['required'],
        'copybid' => ['required'],

        'datenotebid' => ['required'],
        'nbrenfant' => ['required'],
       'copymariage' => ['required'],

       'copyikama' => ['required'],
        'datedebut' => ['required'],
        'mathmoun' => ['required'],
        'copysec' => ['required'],
        
        
      
    ]);

      
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
       'copybid'=>$request->file('copybid')->store('public/uploads'),
      'copymariage'=>$request->file('copymariage')->store('public/uploads'),
       'mathmoun'=>$request->file('mathmoun')->store('public/uploads'),
       'tasrih'=>$request->file('tasrih')->store('public/uploads'),
       'copysec'=>$request->file('copysec')->store('public/uploads'),
       'copyikama'=>$request->file('copyikama')->store('public/uploads'),

      
   ]);
   $mouvement->save();
  //dd($produit);
  //return view('c-enseignant.mv');
  return redirect()->route('create')
    ->with('success','تم تعمير النقلة بنجاح');
    }
    

    /////////ajouter dans la table mouvement normal/////////
    
    public function store2(Request $request)
    {
      $this->validate($request, [
    
        'prenom' => ['required'], 'nom' => ['required'],'date_ns' => ['required'],'lieu' => ['required'],'gouvernorat' => ['required'],'tel' => ['required'],'residencey' => ['required'],
        'nomp_f' => ['required'],'professionf' => ['required'],'residencetf' => ['required'],'etab_post_dis' => ['required'],'obstructionenf' => ['required'],'obstructionp' => ['required'],
        'daterecrutement' => ['required'],'datedemarcation' => ['required'],'etats' => ['required'],'etabact' => ['required'],'datedebut' => ['required'],'gradeact' => ['required'],'notebid' => ['required'],  'datenotebid' => ['required'],'decription' => ['required'],
        'copybid' => ['required'],'copymariage' => ['required'], 'mathmoun' => ['required'], 'tasrih' => ['required'], 'copysec' => ['required'], 'copyikama' => ['required'],
      
    ]);


      $mouvement =new MouvementN([
       
       'unique_id2'=>$request->get('unique_id'),
       'matiere'=>$request->get('matiere'),
       'prenom'=>$request->get('prenom'),
       'nom'=>$request->get('nom'),
       'date_ns'=>$request->get('date_ns'),
       'lieu'=>$request->get('lieu'),
       'gouvernorat'=>$request->get('gouvernorat'),
       'tel'=>$request->get('tel'),
       'residencey'=>$request->get('residencey'),
       'etatm'=>$request->get('etatm'),
       'nomp_f'=>$request->get('nomp_f'),
       'professionf'=>$request->get('professionf'),
       'residencetf'=>$request->get('residencetf'),
       'etab_post_dis'=>$request->get('etab_post_dis'),
       'nbrenfant'=>$request->get('nbrenfant'),
       'obstructionenf'=>$request->get('obstructionenf'),
       'obstructionp'=>$request->get('obstructionp'),
       'daterecrutement'=>$request->get('daterecrutement'),
       'datedemarcation'=>$request->get('datedemarcation'),
       'etats'=>$request->get('etats'),
       'etabact'=>$request->get('etabact'),
       'datedebut'=>$request->get('datedebut'),
       'gradeact'=>$request->get('gradeact'),
       'notebid'=>$request->get('notebid'),  
       'datenotebid'=>$request->get('datenotebid'),
       'decription'=>$request->get('decription'),
       'copybid'=>$request->file('copybid')->store('public/uploads'),
      'copymariage'=>$request->file('copymariage')->store('public/uploads'),
       'mathmoun'=>$request->file('mathmoun')->store('public/uploads'),
       'tasrih'=>$request->file('tasrih')->store('public/uploads'),
       'copysec'=>$request->file('copysec')->store('public/uploads'),
       'copyikama'=>$request->file('copyikama')->store('public/uploads')

      
   ]);
   $mouvement->save();
  //dd($mouvement);
  //return view('home');
   return redirect()->route('create2')
    ->with('success','تم تعمير النقلة بنجاح');
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




public function seting(){
  $user = auth()->user();

  $uid=$user->unique_id;

  $data = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
  ->leftJoin('matiere', 'matiere.codemat', '=', 'enseignant.matiere')
  ->select( 'enseignant.id','enseignant.unique_id','enseignant.nom','enseignant.nom_fr','enseignant.telephone','enseignant.situation_f','enseignant.nbr_enf','enseignant.sexe','enseignant.sec_s','enseignant.lieu_n','enseignant.date_n','enseignant.adresse', 'grade_ens.libgrade','enseignant.prenom','enseignant.prenom_fr','enseignant.nbr_enf','matiere.libmat','matiere.codemat' )
  ->distinct()   
  ->where('enseignant.unique_id','=',$uid)
  ->get();

     
  return view('c-enseignant.seting', compact('data'));


}

public function upd(Request $request, $id)
{
  $user = auth()->user();

  $uid=$user->unique_id;

  $user = User::where('unique_id', $uid)->firstOrFail();

    $user->email = $request->get('email');
    $user->password =Hash::make($request->get('password'));

    $user->save();

$mv = Enseignant::findOrFail($id);
    
    $mv->nom= $request->get('nom');
    $mv->nom_fr= $request->get('nom_fr');
    $mv->telephone= $request->get('telephone');
    $mv->situation_f= $request->get('situation_f');
    $mv->nbr_enf= $request->get('nbr_enf');
    $mv->sexe= $request->get('sexe');
    $mv->lieu_n= $request->get('lieu_n');
    $mv->date_n= $request->get('date_n');
    $mv->adresse= $request->get('adresse');
    $mv->prenom= $request->get('prenom');
    $mv->prenom_fr= $request->get('prenom_fr');
  
          $mv->save();
          
    //return view('c-enseignant.seting')->with('success', 'Data Updated');  
    return redirect()->route('seting')
    ->with('success','تم التعديل بنجاح');
}


}
