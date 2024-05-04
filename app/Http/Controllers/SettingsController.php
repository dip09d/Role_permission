<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\error;

class SettingsController extends Controller
{
    public function Index($group_key = null)
    {

        $Settings = DB::table('pref_setting_group')
            ->where('status', '!=', -1)
            ->get();

        if ($group_key === null) {

            $allSettings = DB::table('pref_settings')
                ->where('setting_group', '')
                ->get();
        } else {

            $allSettings = DB::table('pref_settings')
                ->where('setting_group', $group_key)
                ->get();
        }
        $rows = $allSettings->count();

        return view('settings.all_settings', compact('Settings', 'allSettings', 'group_key', 'rows'));
    }
    public function allSettings_get($id)
    {
        if ($id !== null) {
            // Fetch a specific user by ID
            $Settings = DB::table('pref_settings')->where('id', $id)->first();

            return response()->json($Settings);
        }
    }
    public function get_Settings(Request $req, $id = null)
    {
        if ($id !== null) {
            // Fetch a specific user by ID
            $Settings = DB::table('pref_setting_group')->where('setting_group_id', $id)->first();
            return response()->json($Settings);
        } else {
            // Fetch all users
            $Settings = DB::table('pref_setting_group')
                ->orderBy('setting_group_id', 'desc')
                ->get();
            return response()->json($Settings);
        }
    }

    public function show($group_key)
    {

        $allSettings = DB::table('pref_settings')
            ->where('setting_group', '=', $group_key)
            ->get();
        return view('settings.all_settings', compact('allSettings'));
    }


    public function Settings_group()
    {
        return view('settings.settings_group');
    }

    public function toggle_settings_status(Request $request)
    {

        $SettingsId = $request->SettingsId;

        // Check if the user exists
        $Settings = DB::table('pref_setting_group')->where('setting_group_id', $SettingsId)->first();
        if (!$Settings) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Toggle user status
        $newStatus = $Settings->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_setting_group')->where('setting_group_id', $SettingsId)->update(['status' => $newStatus]);

        return response()->json(['success' => true]);
    }

    public function form_data(Request $request)
    {
        try {
            $rules = [
                'group_name' => 'required',
                'group_Key'  => 'required'
            ];
            $validatedData = $request->validate($rules);
            $data = [
                'group_name' => $validatedData['group_name'],
                'group_key' => $validatedData['group_Key'],
                'status' => $request->status,
            ];
            DB::table('pref_setting_group')->insert($data);

            return response()->json(['message' => 'Successfully Added']);
        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function edit_Settings_data(Request $req, $id)
    {
        try {
            $validatedData = $req->validate([
                'group_name' => 'required',
                'group_Key'  => 'required'
            ]);

            // Extract validated data
            $group_name = $validatedData['group_name'];
            $group_Key = $validatedData['group_Key'];
            $status = $req->status;

            // Update role record in the database
            DB::table('pref_setting_group')
                ->where('setting_group_id', $id)
                ->update([
                    'group_name' => $group_name,
                    'group_key'  => $group_Key,
                    'status'     => $status,
                ]);

            // Return success response
            return response()->json(['message' => 'Successfully updated'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function delete_setting_group(Request $req, $id)
    {
        DB::table('pref_setting_group')->where('setting_group_id', $id)
            ->update([
                'status' => config('constants.STATUS_DELETED'),
            ]);
        return response()->json(['message' => 'successfully deleted']);
    }


    //----------------------------------All Settings---------------------------------//

    public function add_allSettings(Request $req)
    {

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
        return response()->json(['message' => 'successfully Added']);
    }

    public function update_allSettings(Request $req, $id)
    {
        $id = $req->settingsId;

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
        $group_Key = $req->groupKey;
        $name = $req->name;

        if ($group_Key != 'defualt') {
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

        return response()->json($results);
    }
}
