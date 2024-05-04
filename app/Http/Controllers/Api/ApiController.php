<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
            }
            $credentials = $request->only('username', 'password');
            // Attempt authentication for super admins
            if (Auth::guard('admin')->attempt($credentials)) {
                $adminUser = Auth::guard('admin')->user();
                $token = Str::random(60);

                $data = ([
                    'id' => $adminUser->id,
                    'name' => $adminUser->full_name,
                    'username' => $adminUser->username,
                    'token' => $token, // Use the generated token
                ]);

                return response()->json(['status' => 1, 'message' => 'login successfully', 'data' => $data]);
            } else {
                // If authentication fails
                return response()->json(['status' => 0, 'message' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database connection error, etc.)
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function index()
    {
        $adminsWithRoles = DB::table('pref_admin')
            ->join('pref_admin_role', 'pref_admin.role_id', '=', 'pref_admin_role.id')
            ->select('pref_admin.*', 'pref_admin_role.name as role_name')
            ->get();
        return response()->json([
            'data' => $adminsWithRoles,
        ]);
    }


    public function notification(Request $request)
    {
        $page = $request->query('page', 1);
        $perPage = 10;
        $notifications = DB::table('pref_admin_notifications')
        ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'status' => 1,
            'message' => 'success',
            'data' => $notifications->items(),
            'info' => [
                'current_page' => $notifications->currentPage(),
                'last_page' => $notifications->lastPage(),
                'per_page' => $notifications->perPage(),
                'total' => $notifications->total(),
            ],
        ]);
    }
    public function toggle_notify_status(Request $request)
    {

        $userId = $request->input('userId');


        $user = DB::table('pref_admin_notifications')->where('id', $userId)->first();
        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'User not found', 'error' => 404]);
        }
        $newStatus = $user->read_status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_admin_notifications')->where('id', $userId)->update(['read_status' => $newStatus]);

        return response()->json(['status' => 1, 'message' => 'Success']);
    }

    public function delete_notify(Request $req, $id)
    {
        DB::table('pref_admin_notifications')->where('id', $id)
            ->update([
                'read_status' => config('constants.STATUS_DELETED'),
            ]);
        return response()->json(['message' => 'successfully deleted']);
    }

    public function Status(Request $request)
    {
        try {
            $userId = $request->input('user_id');
            $newStatus = $request->input('new_status');

            // Update the status in the database
            $affected = DB::table('pref_admin')
                ->where('id', $userId)
                ->update(['status' => $newStatus]);

            if ($affected) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'No records were updated.']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }



    public function form_data(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');


        $data = [
            'name' => $name,
            'status' => $status,
        ];


        try {
            $insertedId = DB::table('pref_admin_role')->insertGetId($data);

            return response()->json(['status' => 1, 'message' => 'Successfully inserted', 'id' => $insertedId]);
        } catch (\Exception $e) {

            return response()->json(['status' => 0, 'message' => 'Failed to insert data.'], 500);
        }
    }

    public function get_data(Request $req, $id = null)
    {
        if ($id !== null) {
            // Fetch a specific user by ID
            $role = DB::table('pref_admin_role')->where('id', $id)->first();
            return response()->json([
                'status' => 1,
                'data' => $role,
                'message' => 'success',
            ]);
        } else {
            // Fetch all users
            $roles = DB::table('pref_admin_role')->get();
            return response()->json([
                'status' => 1,
                'data' => $roles,
                'message' => 'success',
            ]);
        }
    }


    public function toggle_role_status(Request $request)
    {
        $roleId = $request->input('roleId');

        // Check if the role exists
        $role = DB::table('pref_admin_role')->where('id', $roleId)->first();
        if (!$role) {
            return response()->json(
                [
                    'status' => 1,
                    'message' => 'Role not found'
                ],
                404
            );
        }

        try {
            // Toggle role status
            $newStatus = $role->status == 1 ? 0 : 1;
            DB::table('pref_admin_role')->where('id', $roleId)->update(['status' => $newStatus]);
            $id = DB::table('pref_admin_role')->find($roleId);
            return response()->json(['status' => 1, 'message' => 'updated', 'id' => $id]);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error toggling role status: ' . $e->getMessage());

            // Return error response
            return response()->json(['status' => 0, 'message' => false, 'message' => 'An error occurred while toggling role status'], 500);
        }
    }

    public function edit_role(Request $req, $id)
    {
        try {
            $data = [
                'name' => $req->name,
                'status' => $req->status,
            ];

            $affectedRows = DB::table('pref_admin_role')
                ->where('id', $id)
                ->update($data);

            return response()->json(['status' => 1, 'message' => 'Role updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete_user(Request $request, $id)
    {
        try {
            DB::table('pref_admin_role')
                ->where('id', $id)
                ->delete();

            return response()->json(['message' => 'Successfully deleted']);
        } catch (QueryException $e) {
            // Handle the exception
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout(); // Logout the user from the 'superadmin' guard
        return response()->json(['status' => 1, 'message' => 'successfully logout']);
    }


    public function notification_count(){

        $rows = DB::table('pref_admin_notifications')
        ->where('read_status', '==', config('constants.STATUS_INACTIVE'))
        ->get();
        $total=count($rows);

        return response()->json(['status' => 1, 'total'=>$total]);

    }
}
