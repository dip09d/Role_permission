<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkPermmision
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
     
            $rolePermissions = DB::table('pref_admin_role')
                ->where('pref_admin_role.id', $user->role_id)
                ->join('pref_adminmenu_permission', 'pref_admin_role.id', '=', 'pref_adminmenu_permission.role_id')
                ->join('pref_adminmenu', 'pref_adminmenu_permission.menu_code', '=', 'pref_adminmenu.menu_code')
                ->pluck('pref_adminmenu.name')
                ->toArray();
                if ($this->hasAllPermissions($permissions, $rolePermissions)) {
                    return $next($request);
                }
    
            abort(403, 'You do not have permission to access this page.');
        }
    }
    private function hasAllPermissions($requiredPermissions, $userPermissions)
    {
        foreach ($requiredPermissions as $permission) {
            if (!in_array($permission, $userPermissions)) {
                return false; 
            }
        }
        return true; 
    }
    }
            
    


