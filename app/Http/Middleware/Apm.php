<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Apm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not APM
        if (Auth::check() && Auth::user()->usertype !== 'apm') {
            // Redirect to a different route if not APM
            return redirect()->route('dashboard'); // Change as needed
        }

        return $next($request);
    }
}
