<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role');
    }

    public function get_data(Request $req, $id = null)
    {
        if ($id !== null) {
            
            $role = DB::table('pref_admin_role')->where('id', $id)->first();
            return response()->json($role);
        } else {
            // Fetch all users
            $roles = DB::table('pref_admin_role')
                ->orderBy('id', 'desc')
                ->get();
            return response()->json($roles);
        }
    }
    public function edit_role(Request $req, $id)
    {
        $validatedData = $req->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        // Extract validated data
        $name = $validatedData['name'];
        $status = $validatedData['status'];

        // Update role record in the database
        DB::table('pref_admin_role')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'status' => $status,
            ]);

        // Return success response
        return response()->json(['message' => 'Successfully updated'], 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function toggle_role_status(Request $request)
    {

        $roleId = $request->input('roleId');

        // Check if the user exists
        $role = DB::table('pref_admin_role')->where('id', $roleId)->first();
        if (!$role) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Toggle user status
        $newStatus = $role->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_admin_role')->where('id', $roleId)->update(['status' => $newStatus]);

        return response()->json(['success' => true]);
    }

    public function delete_user(Request $req, $id)
    {
        DB::table('pref_admin_role')->where('id', $id)
            ->update([
                'status' => config('constants.STATUS_DELETED'),
            ]);
        return response()->json(['message' => 'successfully deleted']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function form_data(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $data = [
            'name' => $validatedData['name'],
            'status' => $request->status,
        ];
        DB::table('pref_admin_role')->insert($data);
        return response()->json(['message' => 'Successfully Added']);
    }

}
