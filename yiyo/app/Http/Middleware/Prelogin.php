<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Prelogin
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
        if (Auth::check()) {
            return redirect(Auth::user()->type . 's/index');
        }
        return $next($request);
    }
}
