<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function get_data()
    {
        $countrydata = DB::table('pref_country')
            ->join('pref_country_names', 'pref_country.country_code', '=', 'pref_country_names.country_code')
            ->where('country_status', '!=', config('constants.STATUS_DELETED'))
            ->get();

        return response()->json([
         'status'=>1,
         'data'=>$countrydata,
         'message'=>'retrive data successfully'         
        ]);
    }
}
