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
        $user_interface=false;
//dd(Auth::guard($guard)->check());
        if (Auth::guard($guard)->check()) {
            $user=Auth::guard('admin')->user();
            $array=[4,5];
            if($guard=='admin' && $user->hasRole('Simple_user|Company_administrator|Manager')){
                return redirect('/dashboard');
            }
            else{
                return redirect('/');
            }

        }

        return $next($request);
    }
}
