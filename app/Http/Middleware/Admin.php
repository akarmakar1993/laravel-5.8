<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
//use App\User;

class Admin
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
            // if user is not admin take him to his dashboard
            if ( Auth::user()->role_id!=1 ) 
            {
                 return redirect(route('user'));

            }

            // allow admin to proceed with request
            else if ( Auth::user()->role_id ==1 ) 
            {
                 return $next($request);
            }
        }else{
            abort(404);
        }

          // for other user throw 404 error
    }
}
