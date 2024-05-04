<?php

namespace App\Http\Controllers\Api;

use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\error;

class ApiCategory extends Controller
{
    use ImageUploadTrait;

    public function get_data(Request $req, $id = null)
    {
        try {
            $categories = DB::table('pref_category')->orderBy('id', 'desc')->get();
            return response()->json([
                'status' => 1,
                'message' => 'Categories retrieved successfully',
                'data' => $categories
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' =>$e->getMessage()
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
                'message' =>$e->getMessage()
            ]);
        }
    }
    public function edit_catagory(Request $req, $id)
    {
        try {
            $rules = [
                'name' => 'required',
                'category_icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            ];

            $validatedData = $req->validate($rules);

            $imagePath = null;
            if ($req->hasFile('category_icon')) {
                $file = $req->file('category_icon');
                $path = 'category_icons'; 
                $imagePath = $this->uploadImage($file, $path);
            }

            $data = [
                'name' => $req->name,
                'status' => $req->status
            ];

            if ($imagePath !== null) {
                $data['category_icon'] = $imagePath;
            }

            DB::table('pref_category')
                ->where('id', $id)
                ->update($data);

            return response()->json(['status' => 1, 'message' => 'Category successfully updated']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function toggle_catagory_status(Request $request)
    {
        $catagoryId = $request->input('catagoryId');

        try {
           
            $catagory = DB::table('pref_category')->where('id', $catagoryId)->first();
            if (!$catagory) {
                return response()->json(['status' => 0, 'message' => 'Category not found'], 404);
            }

            
            $newStatus = $catagory->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
            DB::table('pref_category')->where('id', $catagoryId)->update(['status' => $newStatus]);

            return response()->json(['status' => 1, 'message' => 'Category status toggled successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function delete_user(Request $req, $id)
    {
        try {
            DB::table('pref_category')->where('id', $id)->delete();
            return response()->json(['status' => 1, 'message' => 'Category successfully deleted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function form_data_bkup(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $data = [
            'name' => $validatedData['name'],
            'status' => $request->status,
        ];
        DB::table('pref_category')->insert($data);
        return response()->json(['message' => 'Successfully Added']);
    }

    public function form_data(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category_icon' => 'required|image', 
        ];

       
        $validator = Validator::make($request->all(), $rules);

        
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ]);
        }

        try {
           
            if ($request->hasFile('category_icon')) {
                $file = $request->file('category_icon');
                $fileName = $file->getClientOriginalName();
             
            }

            $data = [
                'name' => $request->name,
                'status' => $request->status ?? 1, 
                'category_icon' => $fileName ?? null, 
            ];

            DB::table('pref_category')->insert($data);

            return response()->json([
                'status' => 1,
                'message' => 'Category added successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }



    public function uploadpic(Request $request)
    {
        if ($request->hasFile('file_name')) {
            $uploadedFile = $request->file('file_name');

            $isImage = Str::startsWith($uploadedFile->getMimeType(), 'image/');
            $filePath = $uploadedFile->storeAs('public', $uploadedFile->getClientOriginalName());
            $imageUrl = asset('storage/' . $uploadedFile->getClientOriginalName());
            if ($isImage) {
                return response()->json([
                    'status' => 1,
                    'file_info' => [
                        'original_name' => $uploadedFile->getClientOriginalName(),
                        'type' => $uploadedFile->getMimeType(),
                        'filename' => $uploadedFile->getFilename(),
                        'extension' => $uploadedFile->getClientOriginalExtension(),
                        'size' => $uploadedFile->getSize(),
                        'real_path' => $uploadedFile->getRealPath(),
                        'saved_path' => $filePath,
                        'imageurl' => $imageUrl,
                    ]
                ], 200);
            } else {
                return response()->json([
                    'status' => 0,
                    'error' => "It's not an image"
                ], 200);
            }
        } else {
            return response()->json(['status' => 0, 'error' => 'No file uploaded'], 400);
        }
    }
}
