<?php

namespace App\Http\Controllers\Api;
use App\Exports\notificationsExport;
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

class ApiNotificationTemplate extends Controller
{
    public function get_data(Request $req, $id = null)
    {

        $name = $req->term;
        if ($name != null) {
            $results = DB::table('pref_notifications_template')
                ->Join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
                ->where(function ($query) use ($name) {
                    $query->where('template_for', 'REGEXP', $name)
                        ->orWhere('template_key', 'REGEXP', $name);
                })
                ->get();

            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $results
            ]);
        } else if ($id !== null) {
            try {
                $mails = DB::table('pref_notifications_template')
                    ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
                    ->where('pref_notifications_template.notification_template_id', $id)
                    ->first();

                if ($mails) {
                    return response()->json([
                        'status' => 1,
                        'message' => 'notification retrieved successfully',
                        'data' => $mails
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'notification not found for the given ID'
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
                $mails = DB::table('pref_notifications_template')
                    ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
                    ->orderByDesc('pref_notifications_template.notification_template_id')
                    ->where('pref_notifications_template.status', '!=', config('constants.STATUS_DELETED'))
                    ->get();
                return response()->json([
                    'status' => 1,
                    'message' => 'notification retrieved successfully',
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

    public function edit_notification(Request $req, $id)
    {
        try {
            $validatedData = $req->validate([
                'Template_name' => 'required',
                'Content' => 'required',
                'Template_Keys' => 'required',
                'Template_Key' => 'required',
                'status' => 'required',
            ]);

            DB::table('pref_notifications_template')
                ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
                ->where('pref_notifications_template.notification_template_id', $id)
                ->update([
                    'pref_notifications_template.template_for' => $validatedData['Template_name'],
                    'pref_notifications_template.all_template_keys' => $validatedData['Template_Keys'],
                    'pref_notifications_template.template_key' => $validatedData['Template_Key'],
                    'pref_notifications_template.status' => $validatedData['status'],
                    'pref_notifications_template.display_order' => $req->display_order,
                    'pref_notifications_template_names.template_content' => $validatedData['Content'],
                    'pref_notifications_template_names.lang' => 'er',
                ]);

            return response()->json([
                'status' => 1,
                'message' => 'Notification template updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function delete_Notification($id)
    {
        try {
            DB::table('pref_notifications_template')
                ->where('pref_notifications_template.notification_template_id', $id)
                ->update([
                    'status' => config('constants.STATUS_DELETED'),
                ]);

            return response()->json(['status' => 1, 'message' => 'notifications successfully deleted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }


    public function toggle_notifications_status(Request $request)
    {
        $template_id = $request->input('id');

        try {
            $notifications_status = DB::table('pref_notifications_template')->where('notification_template_id', $template_id)->first();

            if (!$notifications_status) {
                return response()->json(['status' => 0, 'message' => 'Notification template not found'], 404);
            }

            $newStatus = $notifications_status->status == config('constants.STATUS_ACTIVE') ? config('constants.STATUS_INACTIVE') : config('constants.STATUS_ACTIVE');

            DB::table('pref_notifications_template')->where('notification_template_id', $template_id)->update(['status' => $newStatus]);

            return response()->json(['status' => 1, 'message' => 'Notification template status toggled successfully', $notifications_status]);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
    public function insert_notifications(Request $req)
    {
        try {
            $validatedData = $req->validate([
                'Template_name' => 'required',
                'Content' => 'required',
                'Template_Keys' => 'required',
                'Template_Key' => 'required',
                'status' => 'required',
            ]);

            DB::table('pref_notifications_template')->insert([
                'pref_notifications_template.template_for' => $validatedData['Template_name'],
                'pref_notifications_template.all_template_keys' => $validatedData['Template_Keys'],
                'pref_notifications_template.template_key' => $validatedData['Template_Key'],
                'pref_notifications_template.status' => $validatedData['status'],
                'pref_notifications_template.display_order' => $req->display_order,


            ]);
            $notification_template_id = DB::getPdo()->lastInsertId();

            DB::table('pref_notifications_template_names')->insert([
                'notification_template_id' => $notification_template_id,

                'pref_notifications_template_names.template_content' => $validatedData['Content'],
                'lang' => 'en'
            ]);

            return response()->json(['status' => 1, 'message' => 'Notification template successfully inserted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
    public function export() 
    {

        $filename = 'notifications_template_list_' . now()->format('d_M_Y') . '.csv';
    
    $file = Excel::download(new notificationsExport, $filename, \Maatwebsite\Excel\Excel::CSV);

    
    if (!is_null($file)) {
        return Response::make($file->getFile()->getContent(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    } else {
        
        return response()->json(['error' => 'Error generating CSV file'], 500);
    }
    }
}
