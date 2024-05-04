<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class permissionHelper {

    public static function getUserPermissions($roleId)
    {
        $rolePermissions = DB::table('pref_admin_role')
            ->where('pref_admin_role.id', $roleId)
            ->join('pref_adminmenu_permission', 'pref_admin_role.id', '=', 'pref_adminmenu_permission.role_id')
            ->join('pref_adminmenu', 'pref_adminmenu_permission.menu_code', '=', 'pref_adminmenu.menu_code')
            ->pluck('pref_adminmenu.name')
            ->toArray();

        return $rolePermissions;
    }
  

}