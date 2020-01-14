<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        //dump('guard=>',$guard);
//dd(Auth::guard($guard)->check());
        if (Auth::guard($guard)->check()) {
            if($guard=='partner'){
                //dd($guard);
                return redirect('/dashboard');
            }
            else{
                return redirect('/admin');
            }

        }

        return $next($request);
    }
}
