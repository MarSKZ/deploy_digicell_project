<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*') //Método header a cada petición que se hace en todo tipo de URL, va a aceptar peticiones de cualquier origen. Proyecto A o proyecto B de diferente dominio
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS') // También le vamos a decir que acepte cualquier tipo de petición HTTP
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application'); //hacerle entender los parámetros que vamos a mandar para acceder a la base de datos
    }
}
