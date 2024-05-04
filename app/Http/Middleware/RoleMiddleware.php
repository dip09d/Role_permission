<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::guard('admin')->check() || !$this->hasRole(Auth::guard('admin')->user(), $role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }

    private function hasRole($user, $role)
    {
        return isset($user['role']) && $user['role'] == $role;
    }
}