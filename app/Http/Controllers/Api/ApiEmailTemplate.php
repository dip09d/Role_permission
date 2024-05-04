<?php

namespace App\Http\Controllers\Api;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class ApiEmailTemplate extends Controller
{

    public function get_data(Request $req, $id = null)
    {

$name=$req->term;
   if($name!=null){
        $results = DB::table('pref_mailtemplate')
        ->Join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
        ->where(function($query) use ($name) {
            $query->where('template_for', 'REGEXP', $name)
                  ->orWhere('template_type','REGEXP', $name);    
        })
        ->get();
    
        return response()->json([
            'status' => 1,
            'message' => 'Success',
            'data' => $results
        ]);
    }
       else if ($id !== null) {
            try {
                $mails = DB::table('pref_mailtemplate')
                    ->join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
                    ->where('pref_mailtemplate_names.template_id', $id)
                    ->first();

                if ($mails) {
                    return response()->json([
                        'status' => 1,
                        'message' => 'mail retrieved successfully',
                        'data' => $mails
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'mails not found for the given ID'
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
                $mails = DB::table('pref_mailtemplate')
                    ->join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
                    ->orderByDesc('pref_mailtemplate.template_id')
                    ->where('pref_mailtemplate.status', '!=', config('constants.STATUS_DELETED'))
                    ->get();
                return response()->json([
                    'status' => 1,
                    'message' => 'mails retrieved successfully',
                    'data' => $mails
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Error: ' . $e->getMessage()
                ]);
            }
        }
    }

    public function edit_mail(Request $req, $id)
    {
        try {

            $validatedData = $req->validate([
                'Template_name' => 'required',
                'Template_Type' => 'required',
                'Subject' => 'required',
                'Content' => 'required',
                'Template_Keys' => 'required',
                'status' => 'required',
            ]);


            DB::table('pref_mailtemplate')
                ->Join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
                ->where('pref_mailtemplate.template_id', $id)
                ->update([
                    'pref_mailtemplate.template_for' => $validatedData['Template_name'],
                    'pref_mailtemplate.template_type' => $validatedData['Template_Type'],
                    'pref_mailtemplate.template_keys' => $validatedData['Template_Keys'],
                    'pref_mailtemplate.status' => $validatedData['status'],
                    'pref_mailtemplate.display_order' => $req->display_order,
                    'pref_mailtemplate_names.template_subject' => $validatedData['Subject'],
                    'pref_mailtemplate_names.template_content' => $validatedData['Content'],
                ]);



            return response()->json([
                'status' => 1,
                'message' => 'Mail template updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function delete_mail($id)
    {
        try {
            DB::table('pref_mailtemplate')
                ->where('pref_mailtemplate.template_id', $id)
                ->update([
                    'status' => config('constants.STATUS_DELETED'),
                ]);

            return response()->json(['status' => 1, 'message' => 'mail successfully deleted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function toggle_mail_status(Request $request)
    {
        $template_id = $request->input('id');

        try {

            $mail_status = DB::table('pref_mailtemplate')->where('template_id', $template_id)->first();
            if (!$mail_status) {
                return response()->json(['status' => 0, 'message' => 'mail not found'], 404);
            }


            $newStatus = $mail_status->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');
            DB::table('pref_mailtemplate')->where('template_id', $template_id)->update(['status' => $newStatus]);

            return response()->json(['status' => 1, 'message' => 'mail status toggled successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }


    public function insert_mail(Request $req)
    {


        try {
            $validatedData = $req->validate([
                'Template_name' => 'required',
                'Template_Type' => 'required',
                'Subject' => 'required',
                'Content' => 'required',
                'Template_Keys' => 'required',
                'status' => 'required',
            ]);
            DB::table('pref_mailtemplate')->insert([
                'template_for' => $validatedData['Template_name'],
                'template_type' => $validatedData['Template_Type'],
                'template_keys' => $validatedData['Template_Keys'],
                'status' => $validatedData['status'],
                'display_order' => $req->display_order,
            ]);


            $mailId = DB::getPdo()->lastInsertId();


            DB::table('pref_mailtemplate_names')->insert([
                'template_id' => $mailId,
                'template_subject' => $validatedData['Subject'],
                'template_content' => $validatedData['Content'],
                'lang' => 'en'
            ]);


            return response()->json(['status' => 1, 'message' => 'mail successfully inserted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function export() 
    {

        $filename = 'email_template_list_' . now()->format('d_M_Y') . '.csv';
    
    $file = Excel::download(new UsersExport, $filename, \Maatwebsite\Excel\Excel::CSV);

    
    if (!is_null($file)) {
        return Response::make($file->getFile()->getContent(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    } else {
        
        return response()->json(['error' => 'Error generating CSV file'], 500);
    }
    }


    public function mails_search(Request $req){
      
        $name=$req->term;
   
        $results = DB::table('pref_mailtemplate')
        ->Join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
        ->where(function($query) use ($name) {
            $query->where('template_for', 'REGEXP', $name)
                  ->orWhere('template_type','REGEXP', $name);    
        })
        ->get();
    
        return response()->json([
            'status' => 1,
            'message' => 'Success',
            'data' => $results
        ]);
      }





}
