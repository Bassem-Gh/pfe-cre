<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enseignant;
use App\Diplome;
use App\Grade;
use App\Decision;
use App\User;
use Datatables;
use Redirect;
//use Auth;
class EnseignantController extends Controller
{
    
   public function index(){
/*
    $data = DB::table('enseignant')
   
    
    ->select('etab.codeetab as id','etab.libetab' )
    ->where('etab.typeetab','=','30')
    ->get();*/

    $data = Enseignant:://leftJoin('grade', 'grade.id_ensg', '=', 'enseignant.id')
    /*->*/select('enseignant.id', 'enseignant.sec_s', 'enseignant.nom', 'enseignant.prenom', 'enseignant.email', 'enseignant.telephone', 'enseignant.sexe', /*'grade.designation'*/)
   ->get();
   
   
    return view('enseignants.index', compact('data'));
  }
  public function create()
  {
      return view('enseignants.ajouter');
  }
  

  protected function store(Request $request ,User $user)
  {
      $enseignant2 =$user->create([
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
      $enseignant2->save();
      
      $enseignant =new Enseignant([
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

  public function update(UpdateEnseignantRequest $request ,User $user)
  {
      $userupdate = $user->find($request->id);
      $userupdate->fill([
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
      return Redirect::back()->with('message', 'تم التعديل بنجاح');
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
/*
  public function supprimer(User $user)
  {
      $user = $user->delete();
      return redirect::back()->with('message', 'تم حذف الحساب بنجاح');
   }*/

}
