<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class testimonial extends Controller
{


    public function upload_file(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $fileUrl = asset('storage/' . $fileName);

            return response()->json(['success' => 'File uploaded successfully', 'file_name' => $fileName, 'file_url' => $fileUrl]);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }
    public function insert_data(Request $req)
    {

        $validatedData = $req->validate([
            'Name' => 'required',
            'company_name' => 'required',
            'description' => 'required',
            'display_order' => 'required',
            'logo' => 'required',
            'status' => 'required',
        ]);
        DB::table('pref_testimonial')->insert([
            'logo' => $validatedData['logo'],
            'testimonial_status' => $validatedData['status'],
            'display_order' => $validatedData['display_order']
        ]);
        $testimonial_id = DB::getPdo()->lastInsertId();


        DB::table('pref_testimonial_names')->insert([
            'testimonial_id' => $testimonial_id,
            'name' => $validatedData['Name'],
            'company_name' => $validatedData['company_name'],
            'description' => $validatedData['description'],
            'lang' => 'en'
        ]);
        return response()->json(['status' => 1, 'message' => 'successfully inserted']);
    }


    public function Index()
    {
        $testimonialdata = DB::table('pref_testimonial')
            ->join('pref_testimonial_names', 'pref_testimonial.testimonial_id', '=', 'pref_testimonial_names.testimonial_id')
            ->where('testimonial_status', '!=', config('constants.STATUS_DELETED'))
            ->get();
        $image_path = asset('storage/');

        return view('management.testimonal', compact('testimonialdata', 'image_path'));
    }
    public function toggle_testimonial_status(Request $request)
    {
        $id = $request->id;
        $newStatus = $request->status;

        DB::table('pref_testimonial')
            ->where('testimonial_id', $id)
            ->update(['testimonial_status' => $newStatus]);
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
                $data = [
                    'id' => $testimonial->testimonial_id,
                    'name' => $testimonial->name,
                    'status' => $testimonial->testimonial_status,
                    'display_order' => $testimonial->display_order,
                    'company_name' => $testimonial->company_name,
                    'description' => $testimonial->description,
                    'imageName' =>  $imageName,
                    'imagepath' => $imagePath,
                ];
                return response()->json($data);
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
    public function edit_testimonial(Request $req, $id)
    {
     

            $validatedData = $req->validate([
                'Name' => 'required',
                'company_name' => 'required',
                'description' => 'required',
                'display_order' => 'required',
                'logo' => 'required',
                'status' => 'required',
            ]);

            DB::table('pref_testimonial')
                ->join('pref_testimonial_names', 'pref_testimonial.testimonial_id', '=', 'pref_testimonial_names.testimonial_id')
                ->where('pref_testimonial.testimonial_id', $id)
                ->update([
                    'pref_testimonial.logo' => $validatedData['logo'],
                    'pref_testimonial.testimonial_status' => $validatedData['status'],
                    'pref_testimonial.display_order' => $validatedData['display_order'],
                    'pref_testimonial_names.name' => $validatedData['Name'],
                    'pref_testimonial_names.company_name' => $validatedData['company_name'],
                    'pref_testimonial_names.description' => $validatedData['description'],
                ]);
                return response()->json(['status' => 1, 'message' => 'successfully updated']);


    }

    public function delete_testimonial($id)
    {

            DB::table('pref_testimonial')
                ->where('pref_testimonial.testimonial_id', $id)
                ->update([
                    'testimonial_status' => config('constants.STATUS_DELETED'),
                ]);

            return response()->json(['status' => 1, 'message' => 'successfully deleted']);
        
    }
}
