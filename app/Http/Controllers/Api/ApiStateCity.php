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

class ApiStateCity extends Controller
{

    public function get_data(Request $req, $id = null)
    {
        if ($id !== null) {
            try {
                $cities = DB::table('pref_city_names')
                    ->join('pref_city', 'pref_city_names.city_id', '=', 'pref_city.city_id')
                    ->where('pref_city.city_id', $id)
                    ->first();

                if ($cities) {
                    return response()->json([
                        'status' => 1,
                        'message' => 'cities retrieved successfully',
                        'data' => $cities
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'cities not found for the given ID'
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Error: ' . $e->getMessage()
                ]);
            }
        } else {
            try {
                $cities = DB::table('pref_city_names')
                    ->join('pref_city', 'pref_city_names.city_id', '=', 'pref_city.city_id')
                    ->orderByDesc('pref_city_names.city_id')
                    ->where('pref_city.city_status','!=',config('constants.STATUS_DELETED'))
                    ->get();
                return response()->json([
                    'status' => 1,
                    'message' => 'cities retrieved successfully',
                    'data' => $cities
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Error: ' . $e->getMessage()
                ]);
            }
        }
    }

    public function edit_city(Request $req, $id)
    {
        try {
          
            $validatedData = $req->validate([
                'name' => 'required',
                'status' => 'required|in:0,1'
            ]);

   
            $cities = DB::table('pref_city_names')
                ->join('pref_city', 'pref_city_names.city_id', '=', 'pref_city.city_id')
                ->orderByDesc('pref_city_names.city_id')
                ->get();

           
            foreach ($cities as $city) {
                DB::table('pref_city_names')
                    ->where('city_id', $city->city_id)
                    ->update(['city_name' => $validatedData['name']]); // Update the name field

                DB::table('pref_city')
                    ->where('city_id', $city->city_id)
                    ->update(['city_status' => $validatedData['status']]); // Update the status field
            }
            return response()->json(['status' => 1, 'message' => 'cities successfully updated']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function delete_city($id)
{
    try {
        DB::table('pref_city')
            ->where('city_id', $id)
            ->update([
                'city_status' => config('constants.STATUS_DELETED'),
            ]);

        return response()->json(['status' => 1, 'message' => 'cities successfully deleted']);
    } catch (\Exception $e) {
        return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
    }
}

public function toggle_city_status(Request $request)
{
    $city_id = $request->input('id');

    try {
        
        $city_status = DB::table('pref_city')->where('city_id', $city_id)->first();
        if (!$city_status) {
            return response()->json(['status' => 0, 'message' => 'city not found'], 404);
        }

        
        $newStatus = $city_status->city_status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_city')->where('city_id', $city_id)->update(['city_status' => $newStatus]);

        return response()->json(['status' => 1, 'message' => 'city status toggled successfully']);
    } catch (\Exception $e) {
        return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
    }
}


public function insert_city(Request $req)
{
    try {
        $validatedData = $req->validate([
            'name' => 'required',
            'status' => 'required|in:0,1',
            'city_display_order'=>'required',
        ]);

       
        DB::table('pref_city_names')->insert([
            'city_name' => $validatedData['name'],
        ]);

     
        $cityId = DB::getPdo()->lastInsertId();

        
        DB::table('pref_city')->insert([
            'city_id' => $cityId,
            'city_display_order'=>$validatedData['city_display_order'],
            'city_status' => $validatedData['status']
        ]);

        return response()->json(['status' => 1, 'message' => 'city successfully inserted']);
    } catch (\Exception $e) {
        return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
    }
}






}