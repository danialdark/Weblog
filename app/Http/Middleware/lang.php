<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(strpos($request->url(),"fa")){
            URL::defaults(['locale' => "fa"]);
            return $next($request);

        }
        else{
            URL::defaults(['locale' => "en"]);
            return $next($request);
        }
        

        
    }
}
