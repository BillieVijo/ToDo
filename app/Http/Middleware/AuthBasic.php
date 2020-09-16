<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthBasic
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
        if (Auth::onceBasic()) {
            return response()->json(['message'=>'Authentication Fail'],401);
        }else{
            return $next($request);
        }
    }
}
