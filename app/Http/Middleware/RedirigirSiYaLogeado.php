<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirigirSiYaLogeado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard === 'empresa' && Auth::guard('empresa')->check()) {
            return redirect()->route('/');
        }

        if ($guard === 'web' && Auth::guard('web')->check()) {
            return redirect()->route('/');
        }

        return $next($request);
    }
}
