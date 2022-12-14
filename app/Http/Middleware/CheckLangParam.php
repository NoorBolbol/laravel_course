<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Exception;

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
            App::setLocale($request->lang);
            return $next($request);
        }else{
            return response()->view('welcome');
        }
        

        // try{
        //     return $next($request);
        // } catch (Exception $e){
        //     return response()->view('errors.error');
        // }
    }
}
