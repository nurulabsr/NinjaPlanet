<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NinjaMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{

     $country = ['bd', 'ru', 'uk', 'us'];
     if(!in_array($request->country, $country) && !request()->is('404')){
          return redirect()->route('404');
     }


     return $next($request);
     }
}
