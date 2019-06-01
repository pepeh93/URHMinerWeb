<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class OnlyAdmin
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
        if(auth()->user()->role_id != User::ROL_ADMINISTRADOR)
        {
            return redirect('home');
        }

        return $next($request);
    }
}
