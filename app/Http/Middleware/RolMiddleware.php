<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rol): Response
    {
        if (!$request->user() || $request->user()->rol !== $rol) {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta página');
        }
        return $next($request);
    }
}
