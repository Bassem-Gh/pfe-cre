<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Enseignant;
use App\Diplome;
use App\Grade;
use App\Decision;
use App\User;
use App\Mouvement;
use App\MouvementN;
use DB ;
use Datatables;
use Redirect;
use PDF ; 
use App;
use Response;
//use Auth;
class EnseignantController extends Controller
{
    

    public function indexuser()
    {
        
        
        $data = DB::table('scoremv')
       ->join('mouvement_mariage', 'mouvement_mariage.unique_id', '=', 'scoremv.unique_id')
      // ->join('matiere', 'matiere.codemat', '=', 'mouvement_mariage.matiere')
       
       ->select('mouvement_mariage.unique_id as id','mouvement_mariage.prenom','mouvement_mariage.etat','mouvement_mariage.etab_post_dis','mouvement_mariage.copybid','mouvement_mariage.nom','mouvement_mariage.gradeact','mouvement_mariage.matiere','mouvement_mariage.etabact','scoremv.score' )
       ->distinct()
       ->orderBy('scoremv.score','desc')
       ->get();

       
       $data2 = DB::table('mouvement')
      // ->join('mouvement_mariage', 'mouvement_mariage.unique_id', '=', 'scoremv.unique_id')
      // ->join('matiere', 'matiere.codemat', '=', 'mouvement_mariage.matiere')
       
       ->select('mouvement.unique_id2 as id','mouvement.prenom','mouvement.copybid','mouvement.etat','mouvement.etab_post_dis','mouvement.nom','mouvement.gradeact','mouvement.matiere','mouvement.etabact' )
       ->distinct()
       ->get();
 

  return view('enseignants.liste_mouvement',compact('data','data2'));
    }


    public function downloadPDF($id) {
    
     
  $data = DB::table('mouvement_mariage')
 
  ->select('copybid'/*,'copymariage','mathmoun','	tasrih,','copysec','copyikama'*/)
  ->where('unique_id','=',$id)
  ->get();
  
    foreach($data as $row)
    {
      return response()->download(storage_path("app/".$row->copybid));
    }
            
   
}


public function downloadPDF2($id) {
    
     
  $data = DB::table('mouvement')
 
  ->select('copybid'/*,'copymariage','mathmoun','	tasrih,','copysec','copyikama'*/)
  ->where('unique_id2','=',$id)
  ->get();
  
    foreach($data as $row)
    {
      return response()->download(storage_path("app/".$row->copybid));
    }
            
   
}

public function downloadPDFm($id) {
    
     
  $data2 = DB::table('mouvement_mariage')
 
  ->select('copymariage')
  ->where('unique_id','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->copymariage));
    }

}


public function downloadPDFm2($id) {
    
     
  $data2 = DB::table('mouvement')
 
  ->select('copymariage')
  ->where('unique_id2','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->copymariage));
    }

}


public function downloadPDFmth($id) {
    
     
  $data2 = DB::table('mouvement_mariage')
 
  ->select('mathmoun')
  ->where('unique_id','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->mathmoun));
    }

}


public function downloadPDFmth2($id) {
    
     
  $data2 = DB::table('mouvement')
 
  ->select('mathmoun')
  ->where('unique_id2','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->mathmoun));
    }

}


public function downloadPDFtasrih($id) {
    
     
  $data2 = DB::table('mouvement_mariage')
 
  ->select('tasrih')
  ->where('unique_id','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->tasrih));
    }

}
//copyikama


public function downloadPDFtasrih2($id) {
    
     
  $data2 = DB::table('mouvement')
 
  ->select('tasrih')
  ->where('unique_id2','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->tasrih));
    }

}


public function downloadPDFcopyikama($id) {
    
     
  $data2 = DB::table('mouvement_mariage')
 
  ->select('copyikama')
  ->where('unique_id','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->copyikama));
    }

}



public function downloadPDFcopyikama2($id) {
    
     
  $data2 = DB::table('mouvement')
 
  ->select('copyikama')
  ->where('unique_id2','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->copyikama));
    }

}


public function downloadPDFcopysec($id) {
    
     
  $data2 = DB::table('mouvement_mariage')
 
  ->select('copysec')
  ->where('unique_id','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
      return response()->download(storage_path("app/".$row2->copysec));
    }

}

/////////

public function downloadPDFcopysec2($id) {
    
     
  $data2 = DB::table('mouvement')
 
  ->select('copysec')
  ->where('unique_id2','=',$id)
  ->get();
  
    foreach($data2 as $row2)
    {
       dd($data2);
      return response()->download(storage_path("app/".$row2->copysec));
    }

}




/////////////////////////////
   public function index(){


    $data = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
    ->leftJoin('matiere', 'matiere.codemat', '=', 'enseignant.matiere')
->select('enseignant.id','enseignant.unique_id', 'enseignant.sec_s', 'enseignant.nom', 'grade_ens.libgrade','enseignant.prenom', 'enseignant.email', 'enseignant.telephone', 'enseignant.sexe','matiere.libmat' /*'grade.designation'*/)
->distinct()   
->get();
   
   
    return view('enseignants.index', compact('data'));
  }

  public function create()
  {
    $data = DB::table('grade_ens')
    ->select ('libgrade','codegrade')
    ->get();


    $data2 = DB::table('matiere')
    ->select ('libmat','codemat')
    ->distinct()
    ->get();

      return view('enseignants.ajouter',compact('data','data2'));
  }
  

  protected function store(Request $request ,User $user)
  {
    $this->validate($request, [
        'unique_id'    =>  'required',
        //'email'=>  'required',
        //'sec_s' => 'required',
        
    ]);

  /*    $enseignant2 =$user->create([
   
         'name' => $request['nom'],
         'prenom' => $request['prenom'],
        
          'email' => $request['email'],
         
          'password' => bcrypt($request['password']),
      
      ]);
      $enseignant2->save();*/
      
      $enseignant =new Enseignant([
        'unique_id' => $request['unique_id'],
        'sec_s' => $request['sec_s'],
        'situation_f' => $request['situation_f'],
        'nbr_enf' => $request['nbr_enf'],
        'date_r' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_r']))),
        'statu' => $request['statu'],
         'date_s' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_s']))),
        'nom' => $request['nom'],
        'prenom' => $request['prenom'],
        'designation_grade' => $request->get('grade'),
         'nom_fr' => $request['nom_fr'],
         'prenom_fr' => $request['prenom_fr'],
        // 'email' => $request['email'],
         'telephone' => $request['telephone'],
         'adresse' => $request['adresse'],
         //'password' => bcrypt($request['password']),
         'sexe' => $request['sexe'],
         'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
         'lieu_n' => $request['lieu_n'],
         'matiere' => $request['matiere'],
     ]);
     $enseignant->save();
    // dd($enseignant);

      return redirect()->route('enseignants.index')
      ->with('success', 'تم الاضافة بنجاح');
      //return redirect::to('enseignants/'.$enseignant->id.'/modifier')->with('message', 'تم الاضافة بنجاح');
  }

  public function edit($id)
  {
      
    $data = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
    ->leftJoin('matiere', 'matiere.codemat', '=', 'enseignant.matiere')
    ->select('enseignant.id','enseignant.unique_id', 'enseignant.sec_s', 'enseignant.nom', 'enseignant.prenom','enseignant.nom_fr','enseignant.prenom_fr', 'enseignant.cin_f','enseignant.photo','enseignant.adresse','enseignant.email','enseignant.password', 'enseignant.telephone', 'enseignant.sexe', 
        'enseignant.date_n','enseignant.lieu_n','enseignant.situation_f','enseignant.nbr_enf','enseignant.date_r','enseignant.statu','enseignant.date_s','enseignant.fonction','enseignant.date_f','grade_ens.libgrade','grade_ens.codegrade','matiere.libmat','matiere.codemat')
  ->where('id','=',$id)
  ->distinct()    
  ->get();

  $data2 = DB::table('grade_ens')
  ->select ('libgrade','codegrade')
  ->get();

  $data3 = DB::table('matiere')
  ->select ('libmat','codemat')
  ->distinct()
  ->get();

     $enseignant = Enseignant::findOrFail($id);
     //dd($produit);
     return view('enseignants.modifier', compact('data','data2','data3'));

  }

  public function update(Request $request, $id)
  {
      //$userupdate = $user->find($request->id);
      $userupdate = Enseignant::findOrFail($id);
      $userupdate->fill([
        'unique_id' => $request['unique_id'],
          'sec_s' => $request['sec_s'],
          'situation_f' => $request['situation_f'],
          'nbr_enf' => $request['nbr_enf'],
          'date_r' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_r']))),
          'statu' => $request['statu'],
          'date_s' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_s']))),
          'nom' => $request['nom'],
          'prenom' => $request['prenom'],
          'nom_fr' => $request['nom_fr'],
          'prenom_fr' => $request['prenom_fr'],
         // 'email' => $request['email'],
          'telephone' => $request['telephone'],
          'adresse' => $request['adresse'],
         // 'password' => bcrypt($request['sec_s']),
          'sexe' => $request['sexe'],
          'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
          'lieu_n' => $request['lieu_n'],
          'designation_grade' => $request['designation_grade'],
          'matiere' => $request['matiere'],
      ])->save();
      return redirect()->route('enseignants.index')->with('success', 'Data Updated'); 
     // return Redirect::back()->with('message', 'تم التعديل بنجاح');
  }


  
  public function anyData(User $user)
  {

      $users = User:://leftJoin('grade', 'grade.id_ensg', '=', 'enseignant.id')
          /*->*/select(['enseignant.id', 'enseignant.sec_s', 'enseignant.nom', 'enseignant.prenom', 'enseignant.email', 'enseignant.telephone', 'enseignant.sexe', /*'grade.designation'*/]);


      return Datatables::of($users)
          ->addColumn('action', function ($user) {
              if ($user->designation)  {
                  return '<a href="/enseignants/'. $user->id . '/visioner" class="btn btn-xs btn-primary">شهادة عمل</a>
              <a href="enseignants/'. $user->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
              <a href="enseignants/'. $user->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>
                  ';} else {
                  return '<a href="enseignants/'. $user->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
              <a href="enseignants/'. $user->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';
              }
          })
          ->make(true);

  }
  
  public function modifier(User $user)
  {
      $diplom=Diplome::where('id_ensg',$user->id)->orderBy('id', 'desc')->get();
      $grade=Grade::where('id_ensg',$user->id)->orderBy('id', 'desc')->first();
      $echelon=Echelon::where('id_ensg',$user->id)->orderBy('id', 'desc')->first();


      return view('enseignants.modifier' , ['user'=>$user,'diplom'=>$diplom,'grade'=>$grade,'echelon'=>$echelon]);
  }

  public function destroy(Enseignant $enseignant)
  {
      $enseignant->delete();
      return redirect()->route('enseignants.index')->with('message', 'تم حذف الحساب بنجاح');
     // return redirect::back()->with('message', 'تم حذف الحساب بنجاح');
  }

public function listemouvement(){

    return view('enseignants.liste_mouvement');
}



//etatmv



public function etatmv(Request $request, $id)
{
    //$userupdate = $user->find($request->id);
    $userupdate = Mouvement::findOrFail($id);
   // $userupdate->fill([
    $userupdate->update(['etat' => true]);
    $userupdate->save();
        
  
    return redirect()->route('enseignants.liste_mouvement'); 
   // return Redirect::back()->with('message', 'تم التعديل بنجاح');
}

public function etatmv2(Request $request, $id)
{
    //$userupdate = $user->find($request->id);
    $userupdate = MouvementN::findOrFail($id);
   // $userupdate->fill([
    $userupdate->update(['etat' => true]);
    $userupdate->save();
        
  
    return redirect()->route('enseignants.liste_mouvement'); 
   // return Redirect::back()->with('message', 'تم التعديل بنجاح');
}

public function annulermv(Request $request, $id)
{
    //$userupdate = $user->find($request->id);
    $userupdate = Mouvement::findOrFail($id);
   // $userupdate->fill([
    $userupdate->update(['etat' => false]);
    $userupdate->save();
        
  
    return redirect()->route('enseignants.liste_mouvement'); 
   // return Redirect::back()->with('message', 'تم التعديل بنجاح');
}

public function annulermv2(Request $request, $id)
{
    //$userupdate = $user->find($request->id);
    $userupdate = MouvementN::findOrFail($id);
   // $userupdate->fill([
    $userupdate->update(['etat' => false]);
    $userupdate->save();
        
  
    return redirect()->route('enseignants.liste_mouvement'); 
   // return Redirect::back()->with('message', 'تم التعديل بنجاح');
}


public function deletemv($id)
    {


      $data2 = Mouvement::select('etat')->where('unique_id','=',$id)
     ->get();

foreach($data2 as $row){

  $etat=$row->etat ;
}

if($etat!="null")
{

  $etablissement = Mouvement::find($id);
  $etablissement->delete();
 /* return response()->json([
    'message' => 'Data deleted successfully!'
  ]);*/

    }

    if($etablissement){
      echo "Data deleted successfully!";
    }else{
      echo "Error";
    }
}


public function deletemv2($id)
    {


      $data2 = MouvementN::select('etat')->where('unique_id2','=',$id)
     ->get();

foreach($data2 as $row){

  $etat=$row->etat ;
}

if($etat!="null")
{

  $etablissement = MouvementN::find($id);
  $etablissement->delete();
 /* return response()->json([
    'message' => 'Data deleted successfully!'
  ]);*/

    }

    if($etablissement){
      echo "Data deleted successfully!";
    }else{
      echo "Error";
    }
}


}




