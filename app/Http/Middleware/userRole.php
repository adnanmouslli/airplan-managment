<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class userRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role): Response
    {
         
        // isAdmin = 0 => user else admin
        if (!Auth::check() || Auth::user()->isAdmin != 0 || $role != Auth::user()->role) 
              abort( 403);
     



        return $next($request);
    }
}
