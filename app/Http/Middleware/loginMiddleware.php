<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('customer_id')){
            return $next($request);
        }else{
            return redirect('sign-in');
        }
    }
}
