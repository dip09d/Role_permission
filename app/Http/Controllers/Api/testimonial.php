<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Message;
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

class testimonial extends Controller
{

    public function uploadpic(Request $request)
    {

        $uploadedFile = $request->file('file_name');
        $isImage = Str::startsWith($uploadedFile->getMimeType(), 'image/');
        if ($isImage) {
            $uploadedFile->storeAs('public', $uploadedFile->getClientOriginalName());
            $imageUrl = asset('storage/' . $uploadedFile->getClientOriginalName());
            return response()->json([
                'status' => 1,
                'file_info' => [
                    'original_name' => $uploadedFile->getClientOriginalName(),
                    'type' => $uploadedFile->getMimeType(),
                    'filename' => $uploadedFile->getFilename(),
                    'extension' => $uploadedFile->getClientOriginalExtension(),
                    'size' => $uploadedFile->getSize(),
                    'imageurl' => $imageUrl,
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'error' => "It's not an image"
            ], 200);
        }
    }
    public function insert_testimonial(Request $req)
    {


        try {
            $validatedData = $req->validate([
                'name' => 'required',
                'company_name' => 'required',
                'description' => 'required',
                'file_name' => 'required',
                'status' => 'required',
                'display_order' => 'required',
            ]);
            DB::table('pref_testimonial')->insert([
                'logo' => $validatedData['file_name'],
                'testimonial_status' => $validatedData['status'],
                'display_order' => $validatedData['display_order']
            ]);


            $testimonial_id = DB::getPdo()->lastInsertId();


            DB::table('pref_testimonial_names')->insert([
                'testimonial_id' => $testimonial_id,
                'name' => $validatedData['name'],
                'company_name' => $validatedData['company_name'],
                'description' => $validatedData['description'],
                'lang' => 'en'
            ]);


            return response()->json(['status' => 1, 'message' => 'testimonial successfully inserted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function get_data()
    {
        try {
            $testimonialdata = DB::table('pref_testimonial')
                ->join('pref_testimonial_names', 'pref_testimonial.testimonial_id', '=', 'pref_testimonial_names.testimonial_id')
                ->where('testimonial_status', '!=', config('constants.STATUS_DELETED'))
                ->get();
            $image_path = asset('storage/');
            return response()->json(['status' => 1, 'message' => ' Data retrieved successfully', 'data' => $testimonialdata, 'path' => $image_path]);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function get_details(Request $req, $id)
    {
        try {
            $testimonial = DB::table('pref_testimonial')
                ->join('pref_testimonial_names', 'pref_testimonial.testimonial_id', '=', 'pref_testimonial_names.testimonial_id')
                ->where('pref_testimonial.testimonial_id', $id)
                ->first();

            if ($testimonial) {
                $imageName = $testimonial->logo;
                $imagePath = asset('storage/');

                return response()->json([
                    'status' => 1,
                    'message' => 'data retrieved successfully',
                    'data' => [
                        'id' => $testimonial->testimonial_id,
                        'name' => $testimonial->name,
                        'status' => $testimonial->testimonial_status,
                        'display_order' => $testimonial->display_order,
                        'company_name' => $testimonial->company_name,
                        'description' => $testimonial->description,
                        'imageName' =>  $imageName,
                        'imagepath' => $imagePath,
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'data not found for the given ID'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function toggle_testimonial_status(Request $request)
    {
        $testimonialId = $request->input('id');

        try {

            $testimonial = DB::table('pref_testimonial')->where('testimonial_id', $testimonialId)->first();
            if (!$testimonial) {
                return response()->json(['status' => 0, 'message' => 'testimonial not found'], 404);
            }


            $newStatus = $testimonial->testimonial_status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
            DB::table('pref_testimonial')->where('testimonial_id', $testimonialId)->update(['testimonial_status' => $newStatus]);
            return response()->json(['status' => 1, 'message' => 'status updated']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function edit_testimonial(Request $req, $id)
    {
        try {

            $validatedData = $req->validate([
                'name' => 'required',
                'company_name' => 'required',
                'description' => 'required',
                'file_name' => 'required',
                'status' => 'required',
                'display_order' => 'required',
            ]);



            DB::table('pref_testimonial')
                ->join('pref_testimonial_names', 'pref_testimonial.testimonial_id', '=', 'pref_testimonial_names.testimonial_id')
                ->where('pref_testimonial.testimonial_id', $id)
                ->update([
                    'pref_testimonial.logo' => $validatedData['file_name'],
                    'pref_testimonial.testimonial_status' => $validatedData['status'],
                    'pref_testimonial.display_order' => $validatedData['display_order'],
                    'pref_testimonial_names.name' => $validatedData['name'],
                    'pref_testimonial_names.company_name' => $validatedData['company_name'],
                    'pref_testimonial_names.description' => $validatedData['description'],
                ]);



            return response()->json([
                'status' => 1,
                'message' => 'successfully updated',
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function delete_testimonial($id)
    {     
        try {
            DB::table('pref_testimonial')
                ->where('pref_testimonial.testimonial_id', $id)
                ->update([
                    'testimonial_status' => config('constants.STATUS_DELETED'),
                ]);

            return response()->json(['status' => 1, 'message' => 'successfully deleted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }

    }
}
