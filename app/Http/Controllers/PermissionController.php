<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

  public function index()
  {
    $data = DB::table('pref_admin_role')
      ->where('status', '!=', config('constants.STATUS_DELETED'))
      ->get();
    return view('admin.permission', compact('data'));
  }

  public function get_permission(Request $req)
  {
    $data = DB::table('pref_admin_role')
        ->where('status', '!=', config('constants.STATUS_DELETED'))
        ->get();

    $id = $req->user_role;

    if ($id) {
        // Fetch all permissions
        $all_permissions = DB::table('pref_adminmenu')
            ->select('name', 'menu_code', 'title', 'id')
            ->get();


        $role_permissions = DB::table('pref_admin_role')
            ->where('pref_admin_role.id', $id)
            ->Join('pref_adminmenu_permission', 'pref_admin_role.id', '=', 'pref_adminmenu_permission.role_id')
            ->Join('pref_adminmenu', 'pref_adminmenu_permission.menu_code', '=', 'pref_adminmenu.menu_code')
            ->select('pref_adminmenu.id')
            ->distinct()
            ->pluck('id')
            ->toArray();

        return view('admin.permission', compact('all_permissions', 'data', 'id', 'role_permissions'));
    } else {
        return redirect()->route('index');
    }
  }
}
