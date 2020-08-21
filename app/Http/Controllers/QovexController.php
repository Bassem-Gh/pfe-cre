<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function indexbesoin(Request $request)
    {
        if(view()->exists($request->path())){
            return view('besoin');
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
