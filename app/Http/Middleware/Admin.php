<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Providers\RouteServiceProvider;


use Illuminate\Support\Facades\Auth;

class Admin
{
  

    //use AuthenticatesUsers;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
     
        if (Auth::guard($guard)->check()) {      
      
            /*if (Auth::user()->role =='admin') 
          {  return redirect()->guest('/index');  } 
        
      
        

        else*/if (Auth::user()->role !== "admin") 
           { abort(403, 'Unauthorized action.'); } 
        }

        return $next($request);
    }
}
