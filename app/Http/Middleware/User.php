<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            // if user is admin take him to his dashboard
            if ( Auth::user()->role_id!=2 ) 
            {
                 return redirect(route('admin'));
            }

            // allow admin to proceed with request
            else if ( Auth::user()->role_id==2 ) 
            {
                 return $next($request);
            }
        }else{
            abort(404);
        }
        
          // for other user throw 404 error
    }
}
