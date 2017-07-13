<?php

namespace App\Http\Middleware;

use Closure;

class CustomTrim 
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
        
        $request->name = custom_trim($request->name);
        
        return $next($request);
    }
}
