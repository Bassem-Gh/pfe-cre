<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{


    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

   /* public function update(Request $request)
    {
       //Validate input
       $this->validate($request, [
 
        'password' => 'required',
        'userconfirmpassword' => 'required',
        ]);

        $id=Auth::user()->password ; 
      
        $user = User::whereEmail($request->email)->first();
        if (count($user==0)){
            return redirect()->back()->with(['error'=>'Email not exist']);
 
        }
       // $user = User::where('email', $tokenData->email)->first();
        $user =User::findOrFail($id);
        $password=$request->get('password'); 

        if($user) {
            $user->password = \Hash::make($password);
            $user->update();

    //login the user immediately they change password successfully
    Auth::login($user);
        return view('/index',compact('data'));
   /*  } else {
        return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
    } */


}

