<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    
public function handle($request, Closure $next, ...$roles)
{
    if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
        return redirect('/'); // Redirigir si no tiene acceso
    }

    return $next($request);
}

}
