<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class userDeleteHimself
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

        
        
        if ( !Auth::guest() && Auth::user()->id == (int)$request->id) {
            
            
            return redirect('/users/')->withErrors(['You Cannot Delete Yourself !!']);
            
            //return redirect('/users/')->with;
            
        }
        
        return $next($request);
    }
}
