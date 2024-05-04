<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class CatagoryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo 'sss';
        return view('admin.catagory');
    }

    public function get_data(Request $req, $id = null)
    {
        // echo 'sudip';exit;
        if ($id !== null) {
            // Fetch a specific user by ID
            $catagory = DB::table('pref_category')->where('id', $id)->first();
            return response()->json($catagory);
        } else {
            // Fetch all users
            $catagorys = DB::table('pref_category')
                ->orderBy('id', 'desc')
                ->get();
            return response()->json($catagorys);
        }
    }
    public function edit_catagory(Request $req, $id)
    {

        $rules = [
            'name' => 'required',
            // 'status' => 'required|in:0,1', // Validate status
            'category_icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
        ];

        $validatedData = $req->validate($rules);

        if ($req->hasFile('category_icon')) {
            $file = $req->file('category_icon');
            $path = 'category_icons'; // Specify your storage path
            $imagePath = $this->uploadImage($file, $path);
        }
        // else {
        //     $imagePath = null;
        // }


        $data = [
            'name' => $req->name,
            'status' => $req->status
        ];
        if (!empty($imagePath)) {
            $data = [
                'category_icon' => $imagePath
            ];
        }
        DB::table('pref_category')
            ->where('id', $id)
            ->update($data);

        return response()->json(['message' => 'successfull updated']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function toggle_catagory_status(Request $request)
    {

        $catagoryId = $request->input('catagoryId');

        // Check if the user exists
        $catagory = DB::table('pref_category')->where('id', $catagoryId)->first();
        if (!$catagory) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Toggle user status
        $newStatus = $catagory->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
        DB::table('pref_category')->where('id', $catagoryId)->update(['status' => $newStatus]);

        return response()->json(['success' => true]);
    }
    public function delete_user(Request $req, $id)
    {
        DB::table('pref_category')->where('id', $id)->delete();
        return response()->json(['message' => 'successfully deleted']);
    }
    /**
     * Store a newly created resource in storage.
     */
 
    public function form_data(Request $request)
    {
        $rules = [
            'name' => 'required',
            // 'status' => 'required|in:0,1', // Validate status
            'category_icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
        ];

        $validatedData = $request->validate($rules);

        // Handle image upload
        if ($request->hasFile('category_icon')) {
            $file = $request->file('category_icon');
            $path = 'category_icons'; // Specify your storage path
            $imagePath = $this->uploadImage($file, $path);
        } else {
            $imagePath = null;
        }

        $data = [
            'name' => $validatedData['name'],
            'status' => $request->status,
            'category_icon' => $imagePath,
        ];

        DB::table('pref_category')->insert($data);

       
    }

   

}
