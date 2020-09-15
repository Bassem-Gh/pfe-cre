<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\User;
Use App\Enseignant;
Use DB;
class QovexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function indexhome(Request $request)
    {
        if(view()->exists($request->path())){
            return view('home');
        }
        return view('pages-404');
    }*/

    public function getens(Request $request)
    {
       $data = Enseignant::where('sexe','=','ذكر')
    ->count(); 
    /* $data = DB::table('Enseignant')
    ->where('id', '=','17')
    ->select('sexe' )
    ->get(); */
    $data2 = Enseignant::where('sexe','=','أنثى')
    ->count(); 
  
    $response= [
        'data2' => $data2,
        'data' => $data
    ];
      
            return response()->json($response);
        //return($data);
       
    }

    public function indexbesoin(Request $request)
    {
        $data = User::where('role','=','user')
    ->count();

    
    $data2 = Enseignant::count();

        if(view()->exists($request->path())){
            return view('besoin', compact('data','data2'));
        }
        return view('pages-404');
    }
    
    public function index(Request $request)
    {
        if(view()->exists($request->path())){
            return view($request->path());
        }
        return view('pages-404');
    }

    public function authPages(Request $request) {
        if(view()->exists('auth.'.$request->path())){
            return view('auth.'.$request->path());
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
