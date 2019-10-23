<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerRegisterMIddleware
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
        if(Auth::user()->roll_id==3){
        return redirect('/');
        }
        else{
        return $next($request);

            
        }
    }
}
