<?php

namespace App\Http\Middleware;

use Closure;

class EnseignantAuth
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
        if(!session()->has('login_enseignant'))
        {
            return redirect('connexion');
        }
        return $next($request);
    }
}
