<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enseignant;
use App\Matiere;
use App\Grade;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
    $user = auth()->user();

    $uid=$user->unique_id;

    $data = Enseignant::leftJoin('grade_ens', 'grade_ens.codegrade', '=', 'enseignant.designation_grade')
    ->leftJoin('matiere', 'matiere.codemat', '=', 'enseignant.matiere')
    ->select( 'enseignant.nom','enseignant.nom_fr','enseignant.telephone','enseignant.situation_f','enseignant.nbr_enf','enseignant.sexe','enseignant.sec_s','enseignant.lieu_n','enseignant.date_n','enseignant.adresse', 'grade_ens.libgrade','enseignant.prenom','enseignant.prenom_fr','enseignant.nbr_enf','matiere.libmat','matiere.codemat' )
    ->distinct()   
    ->where('enseignant.unique_id','=',$uid)
    ->get();

       
    return view('home', compact('data'));
    }
    


    public function authPages(Request $request) {
        if(view()->exists('role:user'.$request->path())){
            return view('role:user'.$request->path());
        }
        return view('pages-404');
    }



    public function checkStatus(){
        if(!Auth::check()) {
            return abort(404);
        }
        return false;
    }
    


    public function logout(){
        Auth::logout();
        return redirect('/');
    }



}
