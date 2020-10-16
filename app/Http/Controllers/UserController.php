<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\CanResetPassword;
class UserController extends Controller
{


    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }




}

