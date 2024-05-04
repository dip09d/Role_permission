<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class CmsController extends Controller
{

    public function get_data(Request $req, $id = null)
    {
        try {
            $cmsdata = DB::table('pref_cms_help_article')
                          ->join('pref_cms_help_article_names','pref_cms_help_article.cms_help_article_id','=','pref_cms_help_article_names.cms_help_article_id')
                          ->get() ;
            return response()->json([
                'status' => 1,
                'message' => 'data retrieved successfully',
                'data' => $cmsdata
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ]);
        }
    }


    public function get_details(Request $req, $id)
    {
        try {
            $category = DB::table('pref_category')->where('id', $id)->first();
            if ($category) {
                $imageName = $category->category_icon;
                $imagePath = asset('storage/');

                return response()->json([
                    'status' => 1,
                    'message' => 'Category retrieved successfully',
                    'data' => [
                        'id' => $category->id,
                        'name' => $category->name,
                        'status' => $category->status,
                        'imageName' =>  $imageName,
                        'imagepath' => $imagePath,
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Category not found for the given ID'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ]);
        }
    }
}
