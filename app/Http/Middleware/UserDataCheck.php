<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserDataCheck
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
        
        if( is_null(Auth::user()->d_birth) || is_null(Auth::user()) ){
            return redirect()->route('update-step');
        }

        if (Auth::user()->status == 0) {
            return redirect()->route('blocked-step');
        }

        return $next($request);
    }
}
