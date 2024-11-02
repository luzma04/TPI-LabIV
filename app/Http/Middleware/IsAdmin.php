<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {

        if (auth()->user()->rango !== 'admin') {
            return redirect('/'); // Redirigir si no es admin
        }
        return $next($request);
        /* Verifica si el usuario autenticado es administrador
        if (auth()->check() && auth()->user()->rango === 'admin') {
            return $next($request);
        }

        return redirect('/'); // Redirigir si no es admin*/
    }
}
