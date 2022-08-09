<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class banUser
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
        if(Auth::user()->isBanned != 0){
            Auth::logout();
            return redirect()->route('login')->with('alert',['icon'=>'error','title'=>'Access Denied','message'=>'Your have ban list, please contact to Admin']);
        }
        return $next($request);
    }
}
