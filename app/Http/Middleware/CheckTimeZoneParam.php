<?php

namespace App\Http\Middleware;

use Closure;

class CheckTimeZoneParam
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
        if($request->has('timezone')){
            $request->request->add(['time'=> Date('Y/M/d H:i:s')]); //now()
            return $next($request);
        }else{
            return response()->view('welcome');
        }
        
    }
}
