<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('home');
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
