<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Http\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        if(($request->user()->email == 'admin@edu.com') || (($request->user() && $request->user()->user_role_id == 1))){

            return $next($request);
        }
        return redirect()->route('home.airbus');
        // return new Response('', 302, ['Location' => route('home.airbus')]); with """use Illuminate\Http\Response;"""

    }
}
