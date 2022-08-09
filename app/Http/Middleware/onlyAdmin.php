<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class onlyAdmin
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
        if(Auth::user()->role != 0){
            return redirect()->route('home')->with('alert',['icon'=>'error','title'=>'Access Denied','message'=>'This role is Only Admin.']);
        }
        return $next($request);
    }
}
