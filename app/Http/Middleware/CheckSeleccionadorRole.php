<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckSeleccionadorRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->hasRole('seleccionador')) {
            // Usuario no autenticado o no tiene el rol correcto
            // return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta página');
            return redirect()->route('vue.principal_procesos');
        }

        return $next($request);
    }
}