<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            // If the user is authenticated via the admin guard, redirect them away from the root route
            return redirect('/dashboard'); // Change the destination route as per your application
        }

        return $next($request);
    }
}
