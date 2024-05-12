<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect('/login'); // Redirect unauthenticated users to the login page
        }

        // Check if the user's role is not included in the allowed roles
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403); // Forbidden: Return a 403 response
        }

        return $next($request);
    }
}
