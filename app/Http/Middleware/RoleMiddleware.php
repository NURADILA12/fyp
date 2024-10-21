<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if user role is in the allowed roles
            if (in_array($user->usertype, $roles)) {
                return $next($request); // User has the role, proceed to the next request
            }
        }

        // If not authorized, redirect to a specified route or back with error
        return redirect()->route('login')->withErrors(['access' => 'Unauthorized access.']);
    }
}
