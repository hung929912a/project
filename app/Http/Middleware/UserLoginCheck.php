<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class UserLoginCheck
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
        if(Auth::guard("users_tb")->check()){
            return redirect()->intended('home');
        }
        return $next($request);
    }
}
