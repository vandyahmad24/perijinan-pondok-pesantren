<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CekPengurus
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
        if (Auth::user()->level != 'pengurus') {
            return redirect('/');
        }
        return $next($request);
    }
}
