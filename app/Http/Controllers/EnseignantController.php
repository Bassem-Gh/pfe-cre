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
       
       ->select('mouvement_mariage.unique_id as id','mouvement_mariage.prenom','mouvement_mariage.copybid','mouvement_mariage.nom','mouvement_mariage.gradeact','mouvement_mariage.matiere','mouvement_mariage.etabact' )
       ->orderBy('scoremv.score','desc')
       ->get();
 

  return view('enseignants.liste_mouvement',compact('data'));
    }


    public function downloadPDF($id) {
    
     
  $data = DB::table('mouvement_mariage')
 
  ->select('copybid')
  ->where('unique_id','=',$id)
  ->get();
  
    foreach($data as $row)
    {
      return response()->download(storage_path("app/".$row->copybid));
    }
            
   // return Response::download($file, 'filename.pdf', $headers);
}



   public function index(){


    $data = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
->select('enseignant.id','enseignant.unique_id', 'enseignant.sec_s', 'enseignant.nom', 'grade_ens.libgrade','enseignant.prenom', 'enseignant.email', 'enseignant.telephone', 'enseignant.sexe', /*'grade.designation'*/)
//->where('')   
->get();
   
   
    return view('enseignants.index', compact('data'));
  }
  public function create()
  {
      return view('enseignants.ajouter');
  }
  

  protected function store(Request $request ,User $user)
  {
    $this->validate($request, [
        'unique_id'    =>  'required',
        'email'=>  'required',
        'sec_s' => 'required',
        
    ]);

      $enseignant2 =$user->create([
     /*   'unique_id' => $request['unique_id'],
         'sec_s' => $request['sec_s'],
         'situation_f' => $request['situation_f'],
         'nbr_enf' => $request['nbr_enf'],
         'date_r' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_r']))),
         'statu' => $request['statu'],
          'date_s' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_s']))),*/
         'name' => $request['nom'],
         'prenom' => $request['prenom'],
         // 'nom_fr' => $request['nom_fr'],
         // 'prenom_fr' => $request['prenom_fr'],
          'email' => $request['email'],
          //'telephone' => $request['telephone'],
          //'adresse' => $request['adresse'],
          'password' => bcrypt($request['password']),
         // 'sexe' => $request['sexe'],
          //'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
         // 'lieu_n' => $request['lieu_n'],
      ]);
      $enseignant2->save();
      
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
         'nom_fr' => $request['nom_fr'],
         'prenom_fr' => $request['prenom_fr'],
         'email' => $request['email'],
         'telephone' => $request['telephone'],
         'adresse' => $request['adresse'],
         'password' => bcrypt($request['password']),
         'sexe' => $request['sexe'],
         'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
         'lieu_n' => $request['lieu_n'],
     ]);
     $enseignant->save();
      return redirect()->route('enseignants.index')
      ->with('success', 'تم الاضافة بنجاح');
      //return redirect::to('enseignants/'.$enseignant->id.'/modifier')->with('message', 'تم الاضافة بنجاح');
  }

  public function edit($id)
  {
      
    $data = Enseignant:://leftJoin('grade', 'grade.id_ensg', '=', 'enseignant.id')
    /*->*/select('id','unique_id', 'sec_s', 'nom', 'prenom','nom_fr','prenom_fr', 'cin_f','photo','adresse','email','password', 'telephone', 'sexe', 
        'date_n','lieu_n','situation_f','nbr_enf','date_r','statu','date_s','fonction','date_f')
  ->where('id','=',$id)
        ->get();

     $enseignant = Enseignant::findOrFail($id);
     //dd($produit);
     return view('enseignants.modifier', compact('data'));

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
          'email' => $request['email'],
          'telephone' => $request['telephone'],
          'adresse' => $request['adresse'],
          'password' => bcrypt($request['sec_s']),
          'sexe' => $request['sexe'],
          'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
          'lieu_n' => $request['lieu_n'],
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



}




