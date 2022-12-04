<?php

namespace App\Http\Middleware;

use Closure;

class CheckLangParam
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
        if($request->has('lang')){
            return $next($request);
        }else{
            return response()->view('welcome');
        }
        
    }
}
