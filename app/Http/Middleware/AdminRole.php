<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response as HttpException;

class AdminRole
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
        if(Auth::user() && Auth::user()->role_id === 1){
            return $next($request);
        }
        Abort(403, 'No tiene autorzación para entrar a esta sección.');
    }
}
