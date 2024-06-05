<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $rol)
    {
        if (auth()->guard('web')->user()->rol === $rol) {
            return $next($request);
        }elseif (auth()->guard('empresa')->user()->rol === $rol){
            return $next($request);
        }else {
            return redirect('/');
        }
            
    }
}
