<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserEditHimselfMiddleware
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
<<<<<<< HEAD
        if ( !Auth::guest() && !Auth::user()->hasRole('admin') && Auth::user()->id != (int)$request->users) {
=======
        
        if ( !Auth::guest() && /*!Auth::user()->hasRole('admin') &&*/ Auth::user()->id != (int)$request->id) {
>>>>>>> newGorilla
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
