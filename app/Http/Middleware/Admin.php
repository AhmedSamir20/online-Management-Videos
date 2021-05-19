<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{

    public function handle($request, Closure $next)
    {

       if(auth()->guest()){
           return redirect('/login');
       }

       if(auth()->user()->group != 'admin'){
           return redirect('/');
       }
        return $next($request);
    }
}
