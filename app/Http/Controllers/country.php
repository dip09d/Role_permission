<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class country extends Controller
{
    public function Index()
    {
        $countrydata = DB::table('pref_country')
            ->join('pref_country_names', 'pref_country.country_code', '=', 'pref_country_names.country_code')
            ->where('country_status', '!=', config('constants.STATUS_DELETED'))
            ->get();

        return view('management.country',compact('countrydata'));
    }
}
