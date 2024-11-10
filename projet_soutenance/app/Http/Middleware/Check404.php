<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Check404
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        
        // Vérifiez si la route existe
        if (!$request->route()) {
            // Si la route n'existe pas, renvoyer une erreur 404
            abort(404);
        }

        return $next($request);
    }
}