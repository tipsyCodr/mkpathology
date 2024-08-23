<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPatient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {

            return redirect()->route('login');
        }
        if (!auth()->user()->hasRole('patient')) {
            // return "Is not patient";
            return redirect()->route('login');
            // return redirect()->route('login');
        }
        return $next($request);
    }
}
