<?php

namespace App\Http\Middleware;

use Closure;

class CheckRolUser
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
        //Agregamos mas roles para el middleware
        $type = array_slice(func_get_args(), 2);
        if (in_array(auth()->user()->type->key, $type)) {
            return $next($request);
        }
        return redirect('/layout');
    }
}
