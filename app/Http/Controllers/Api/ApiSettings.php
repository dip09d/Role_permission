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

class ApiSettings extends Controller
{
    public function Settings_group(Request $req, $id = null)
    {
        try {
            if ($id !== null) {
                // Fetch a specific user by ID
                $Settings = DB::table('pref_setting_group')->where('setting_group_id', $id)->first();
                if ($Settings) {
                    return response()->json($Settings);
                } else {
                    return response()->json(['status' => 0, 'message' => 'Setting not found for the provided ID.']);
                }
            } else {
                // Fetch all users
                $Settings = DB::table('pref_setting_group')
                    ->where('status', '!=', '-1')
                    ->orderBy('setting_group_id', 'desc')
                    ->get();
                if ($Settings->isEmpty()) {
                    return response()->json(['status' => 0, 'message' => 'No settings found.']);
                } else {
                    return response()->json(['status' => 1, 'data' => $Settings, 'message' => 'success']);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }
    public function toggle_status(Request $request)
    {

        $setting_group_id = $request->input('Id');


        $setting = DB::table('pref_setting_group')->where('setting_group_id', $setting_group_id)->first();
        if (!$setting) {
            return response()->json(['status' => 0, 'message' => 'User not found', 'error' => 404]);
        }

        // Toggle user status
        $newStatus = $setting->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_setting_group')->where('setting_group_id', $setting_group_id)->update(['status' => $newStatus]);

        return response()->json(['status' => 1, 'message' => 'Success']);
    }



    public function form_data(Request $req)
    {
        try {
            // Define validation rules
            $rules = [
                'group_name' => 'required',
                'group_key' => 'required',
                'status' => 'required',
            ];

            // Validate the request data
            $validatedData = $req->validate($rules);

            // If validation passes, proceed with saving the data
            $data = [
                'group_name' => $validatedData['group_name'],
                'group_key' => $validatedData['group_key'],
                'status' => $validatedData['status'],

            ];


            $insert = DB::table('pref_setting_group')->insert($data);


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
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit_Settings_data(Request $req, $id)
    {
        try {

            $group_name = $req->input('group_name');
            $group_key = $req->input('group_key');
            $status = $req->input('status');


            DB::table('pref_setting_group')
                ->where('setting_group_id', $id)
                ->update([
                    'group_name' => $group_name,
                    'group_key' => $group_key,
                    'status' => $status,
                ]);

            return response()->json(['message' => 'Successfully updated'], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function delete_Settings_group(Request $req, $id)
    {
        DB::table('pref_setting_group')->where('setting_group_id', $id)
            ->update([
                'status' => config('constants.STATUS_DELETED'),
            ]);
        return response()->json(['message' => 'successfully deleted']);
    }


    //------------------------------------ all settings -----------------------------------\\
    public function getAllSettings(Request $req)
    {
        $group_key = $req->input('group_key');
        $name= $req->input('name');
        if($name===null){

        if ($group_key === null) {
            $allSettings = DB::table('pref_settings')->where('setting_group', '')->get();
            $total = count($allSettings);
        } else {
            $allSettings = DB::table('pref_settings')->where('setting_group', $group_key)->get();
            $total = count($allSettings);
        }
        return response()->json([
            'status' => 1,
            'allSettings' => [
                'data' => $allSettings,
                'total' => $total
            ],
            'message' => 'success'
        ]);
    }else{
        try {
            $group_Key = $req->group_key;
            $name = $req->name;
    
            if ($group_Key == '') {
                $results = DB::table('pref_settings')
                ->where('setting_group', '')
                ->where(function ($query) use ($name) {
                    $query->where('title', 'REGEXP', $name)
                        ->orWhere('setting_key', 'REGEXP', $name);
                })
                ->get();

               
            } else {
                $results = DB::table('pref_settings')
                    ->where('setting_group', $group_Key)
                    ->where(function ($query) use ($name) {
                        $query->where('title', 'REGEXP', $name)
                            ->orWhere('setting_key', 'REGEXP', $name);
                    })
                    ->get();
            }
    
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $results
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage(),
            ]);
        }
    }
    


    }

    public function add_allSettings(Request $req)
    {
        try {
            $rules = [
                'setting_Key' => 'required',
                'setting_Value' => 'required',
                'setting_name' => 'required',
                'Display_Order' => 'required'
            ];
            $validatedData = $req->validate($rules);
            $data = [
                'setting_key' => $validatedData['setting_Key'],
                'setting_value' => $validatedData['setting_Value'],
                'title' => $validatedData['setting_name'],
                'setting_group' => $req->group_key ?: '',
                'editable' => $req->Editable,
                'deletable' => $req->Deletable,
                'display_order' => $validatedData['Display_Order']
            ];
            DB::table('pref_settings')->insert($data);
            return response()->json(['status' => 1, 'message' => 'successfully Added']);
        } catch (\Exception $e) {
            Log::error('Error occurred while adding setting: ' . $e->getMessage(), [
                'request_data' => $req->all(),
                'exception' => $e
            ]);

            // Return a generic error response
            return response()->json(['error' => 'An error occurred while processing your request.'], 500);
        }
    }


    public function allSettings_get($id)
    {
        if ($id !== null) {
            // Fetch a specific user by ID
            $Settings = DB::table('pref_settings')->where('id', $id)->first();

            return response()->json($Settings);
        }
    }
    public function update_allSettings(Request $req, $id)
    {
        $validatedData = $req->validate([
            'setting_name' => 'required',
            'setting_Value'  => 'required',
            'setting_Key'  => 'required',
        ]);

        // Extract validated data
        $setting_name = $validatedData['setting_name'];
        $setting_Key = $validatedData['setting_Key'];
        $setting_Value = $validatedData['setting_Value'];


        // Update role record in the database
        DB::table('pref_settings')
            ->where('id', $id)
            ->update([
                'title' => $setting_name,
                'setting_key'  => $setting_Key,
                'setting_value' => $setting_Value,
                'setting_group' => $req->Groups ?: ''
            ]);

        return response()->json(['message' => 'Successfully updated'], 200);
    }

    public function settings_search(Request $req)
    {
        try {
            $group_Key = $req->groupKey;
            $name = $req->name;
    
            if ($group_Key != 'default') {
                $results = DB::table('pref_settings')
                    ->where('setting_group', $group_Key)
                    ->where(function ($query) use ($name) {
                        $query->where('title', 'REGEXP', $name)
                            ->orWhere('setting_key', 'REGEXP', $name);
                    })
                    ->get();
            } else {
                $results = DB::table('pref_settings')
                    ->where('setting_group', '')
                    ->where(function ($query) use ($name) {
                        $query->where('title', 'REGEXP', $name)
                            ->orWhere('setting_key', 'REGEXP', $name);
                    })
                    ->get();
            }
    
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $results
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage(),
            ]);
        }
    }
    
}
