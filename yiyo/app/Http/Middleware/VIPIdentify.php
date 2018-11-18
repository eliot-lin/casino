<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VIPIdentify
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
        if ('vip' != Auth::user()->type) {
            return redirect(Auth::user()->type . 's/index');
        }
        return $next($request);
    }
}
