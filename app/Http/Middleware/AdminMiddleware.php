<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
   
    public function handle($request, Closure $next)
    {

     if(Auth::user()->role == 'admin'){

        return $next($request);
     }
     else
     {
        return redirect('/home');
     }   

     return $next($request);
    }
}
