<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class EmailController extends Controller
{
    public function Index()
    {
        $mails = DB::table('pref_mailtemplate')
            ->join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
            ->orderByDesc('pref_mailtemplate.template_id')
            ->where('pref_mailtemplate.status', '!=', config('constants.STATUS_DELETED'))
            ->get();

        return view('management.email_templete', compact('mails'));
    }


    public function toggle_mail_status(Request $request)
    {
        $id = $request->id;
        $newStatus = $request->status;

        DB::table('pref_mailtemplate')
            ->where('template_id', $id)
            ->update(['status' => $newStatus]);
    }

    public function get_data(Request $req, $id = null)
    {

        // Fetch a specific user by ID
        $mails = DB::table('pref_mailtemplate')
            ->join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
            ->where('pref_mailtemplate_names.template_id', $id)
            ->first();

        return response()->json($mails);
    }


    public function insert_mail(Request $req)
    {



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
    }

    public function edit_mail(Request $req, $id)
    {



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
    }


    public function delete_mail($id)
    {

        DB::table('pref_mailtemplate')
            ->where('pref_mailtemplate.template_id', $id)
            ->update([
                'status' => config('constants.STATUS_DELETED'),
            ]);

        return response()->json(['status' => 1, 'message' => 'mail successfully deleted']);
    }



    public function export()
    {

        $filename = 'email_template_list_' . now()->format('d_M_Y') . '.csv';

        return Excel::download(new UsersExport, $filename, \Maatwebsite\Excel\Excel::CSV);
    }

    public function mails_search(Request $req)
    {

        $name = $req->term;

        $results = DB::table('pref_mailtemplate')
            ->Join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
            ->where(function ($query) use ($name) {
                $query->where('template_for', 'REGEXP', $name)
                    ->orWhere('template_type', 'REGEXP', $name);
            })
            ->get();

        return view('management.email_templete', ['mails' => $results]);
    }
}
