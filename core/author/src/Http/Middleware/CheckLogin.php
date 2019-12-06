<?php

namespace Unicorn\Author\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use DB;
class CheckLogin
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
            return $next($request);
        }else{
            return redirect('login');
        }
    }
}