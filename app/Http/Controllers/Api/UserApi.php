<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\error;

class UserApi extends Controller
{
    public function get_data($id = null)
    {
        try {
            if ($id !== null) {
                // Fetch a specific user by ID
                $user = DB::table('pref_admin')->where('id', $id)->first();

                if ($user) {
                    return response()->json([
                        'status' => 1,
                        'message' => 'success',
                        'user' => $user, // Wrap user data in 'data' key

                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'User not found',
                        'error' => 'User with ID ' . $id . ' not found' // Error message for user not found
                    ], 404); // Return 404 status code for not found
                }
            } else {
                // Fetch all users
                $users = DB::table('pref_admin')
                    ->join('pref_admin_role', 'pref_admin.role_id', '=', 'pref_admin_role.id')
                    ->select('pref_admin.*', 'pref_admin_role.name as role_name')
                    ->where('pref_admin.status', '!=', -1)
                    ->get();
                if ($users->isEmpty()) {
                    return response()->json([
                        'status' => 0,
                        'message' => 'No users found',
                        'error' => 'No users found in the database' // Error message for no users found
                    ], 404); // Return 404 status code for not found
                } else {
                    return response()->json([
                        'status' => 1,
                        'message' => 'success',
                        'data' => $users // Wrap users data in 'data' key
                    ]);
                }
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return an error response
            return response()->json([
                'status' => 0,
                'message' => 'An error occurred',
                'error' => $e->getMessage() // Include the exception message in the response
            ], 500); // Return 500 status code for internal server error
        }
    }

    public function form_data(Request $req)
    {
        try {
            // Define validation rules
            $rules = [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'name' => 'required',
                'role' => 'required',
                'status' => 'required',
            ];

            // Validate the request data
            $validatedData = $req->validate($rules);

            // If validation passes, proceed with saving the data
            $data = [
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'full_name' => $validatedData['name'],
                'registered_on' => now(),
                'status' => $validatedData['status'],
                'role_id' => $validatedData['role'],
                'remember_token' => $req->_token,
                // Add more columns as needed
            ];

            // Insert the data into the database or perform any other actions
            // Example:
            $insert = DB::table('pref_admin')->insert($data);

            // Check if data was successfully inserted
            if ($insert) {
                // Return a response indicating success
                return response()->json(['status' => 1, 'message' => 'Successfully added']);
            } else {
                // Return a response indicating failure
                return response()->json(['status' => 0, 'message' => 'Failed to add data']);
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return an error response
            return response()->json([
                'status' => 0,
                'message' => 'An error occurred',
                'error' => $e->getMessage() // Include the exception message in the response
            ], 500); // Return 500 status code for internal server error
        }
    }


    public function edit_user(Request $req, $id)
    {
        try {

            $userName = $req->input('username');
            $userEmail = $req->input('email');
            $name = $req->input('name');
            $role = $req->input('role');
            $status = $req->input('status');

            DB::table('pref_admin')
                ->where('id', $id)
                ->update([
                    'username' => $userName,
                    'email' => $userEmail,
                    'full_name' => $name,
                    'role_id' => $role,
                    'status' => $status,
                ]);

            return response()->json(['message' => 'Successfully updated'], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function get_role()
    {

        $roles = DB::table('pref_admin_role')->get();
        if ($roles->isEmpty()) {
            return response()->json([
                'status' => 0,
                'message' => 'No users found',
                'error' => 'No users found in the database' // Error message for no users found
            ], 404); // Return 404 status code for not found
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'success',
                'data' => $roles // Wrap users data in 'data' key
            ]);
        }
    }
    public function toggle_user_status(Request $request)
    {

        $userId = $request->input('userId');


        $user = DB::table('pref_admin')->where('id', $userId)->first();
        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'User not found', 'error' => 404]);
        }

        // Toggle user status
        $newStatus = $user->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_admin')->where('id', $userId)->update(['status' => $newStatus]);

        return response()->json(['status' => 1, 'message' => 'Success']);
    }

    public function delete_user(Request $req, $id)
    {
        DB::table('pref_admin')->where('id', $id)
            ->update([
                'status' => config('constants.STATUS_DELETED'),
            ]);
        return response()->json(['message' => 'successfully deleted']);
    }
}
