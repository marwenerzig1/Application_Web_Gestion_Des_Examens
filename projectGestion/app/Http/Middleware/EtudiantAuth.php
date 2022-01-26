<?php

namespace App\Http\Middleware;

use Closure;

class EtudiantAuth
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
        if(!session()->has('login'))
        {
            return redirect('connexion');
        }
        return $next($request);
    }
}
