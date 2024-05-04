<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }



    public function check(Request $request)
    {
        try {
            $credentials = $request->only('Username', 'password');


            if (Auth::guard('admin')->attempt($credentials)) {

                $user = Auth::guard('admin')->user();
                if ($user->status == 1) {
                    return response()->json(['status' => 'success', 'redirect' => '/dashboard']);
                } else {

                    Auth::guard('admin')->logout();
                    return response()->json(['status' => 'error', 'message' => 'Your account is inactive. Please contact the administrator.']);
                }
            } else {

                return response()->json(['status' => 'error', 'message' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function index()
    {

    
          
           return view('dashboard');
          
      
    }

    public function notification()
    {
        $notifications = DB::table('pref_admin_notifications')->get();
        return view('notification', compact('notifications'));
    }

    public function user()
    {
        $Roles = DB::table('pref_admin_role')->get();
        return view('admin.user', compact('Roles'));
    }

    public function get_data(Request $req, $id = null)
    {
        if ($id !== null) {
            // Fetch a specific user by ID
            $user = DB::table('pref_admin')->where('id', $id)->first();
            return response()->json($user);
        } else {
            // Fetch all users
            $users = DB::table('pref_admin')
                ->join('pref_admin_role', 'pref_admin.role_id', '=', 'pref_admin_role.id')
                ->select('pref_admin.*', 'pref_admin_role.name as role_name')
                ->orderBy('id', 'desc')
                ->get();
            return response()->json($users);
        }
    }

    public function form_data(Request $req)
    {
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
        // Return a response indicating success
        return response()->json(['success' => true, 'message' => 'successfully added']);
    }




    public function permission()
    {
        return view('admin.permission');
    }


    public function toggle_user_status(Request $request)
    {

        $userId = $request->input('userId');


        $user = DB::table('pref_admin')->where('id', $userId)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Toggle user status
        $newStatus = $user->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_admin')->where('id', $userId)->update(['status' => $newStatus]);

        return response()->json(['success' => true]);
    }



    public function edit_user(Request $req, $id)
    {

        $validatedData = $req->validate([
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'role' => 'required', // Assuming 'roles' is your roles table
            'status' => 'required',
        ]);

        // Extract validated data
        $userName = $validatedData['username'];
        $userEmail = $validatedData['email'];
        $name = $validatedData['name'];
        $role = $validatedData['role'];
        $status = $validatedData['status'];

        // Update user record in the database
        DB::table('pref_admin')
            ->where('id', $id)
            ->update([
                'username' => $userName,
                'email' => $userEmail,
                'full_name' => $name,
                'role_id' => $role,
                'status' => $status,
            ]);

        // Return success response
        return response()->json(['message' => 'Successfully updated'], 200);
    }


    public function delete_user(Request $req, $id)
    {
        DB::table('pref_admin')->where('id', $id)
            ->update([
                'status' => config('constants.STATUS_DELETED'),
            ]);
        return response()->json(['message' => 'successfully deleted']);
    }




    public function logout()
    {
        Auth::guard('admin')->logout(); // Logout the user from the 'superadmin' guard
        return redirect('/');
    }
}
