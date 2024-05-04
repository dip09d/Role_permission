<?php

namespace App\Http\Controllers;

use App\Exports\notificationsExport;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class NotificationTemplateController extends Controller
{

  public function index()
  {
    $notifications = DB::table('pref_notifications_template')
      ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
      ->orderByDesc('pref_notifications_template.notification_template_id')
      ->where('pref_notifications_template.status', '!=', config('constants.STATUS_DELETED'))
      ->get();
    return view('management.notification_templete', compact('notifications'));
  }

  public function insert_notifications(Request $req)
  {
   
      $validatedData = $req->validate([
        'notify_template_name' => 'required',
        'Content' => 'required',
        'Template_Keys' => 'required',
        'Template_Key' => 'required',
        'status' => 'required',
      ]);

      DB::table('pref_notifications_template')->insert([
        'pref_notifications_template.template_for' => $validatedData['notify_template_name'],
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
    
  }
  public function get_data(Request $req, $id = null)
  {

    $notifications = DB::table('pref_notifications_template')
      ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
      ->orderByDesc('pref_notifications_template.notification_template_id')
      ->where('pref_notifications_template.notification_template_id', $id)
      ->get();


    return response()->json($notifications);
  }

  public function notify_template_status(Request $request)
  {
    $id = $request->id;
    $newStatus = $request->status;

    DB::table('pref_notifications_template')
      ->where('notification_template_id', $id)
      ->update(['status' => $newStatus]);
  }

  public function edit_notification(Request $req, $id)
  {
    
          $validatedData = $req->validate([
              'notify_template_name' => 'required',
              'Content' => 'required',
              'Template_Keys' => 'required',
              'Template_Key' => 'required',
              'status' => 'required',
          ]);

          DB::table('pref_notifications_template')
              ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
              ->where('pref_notifications_template.notification_template_id', $id)
              ->update([
                  'pref_notifications_template.template_for' => $validatedData['notify_template_name'],
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

  public function  notification_search(Request $req){

    $name = $req->term;

    $results = DB::table('pref_notifications_template')
        ->where(function ($query) use ($name) {
            $query->where('template_for', 'REGEXP', $name)
                ->orWhere('template_key', 'REGEXP', $name);
        })
        ->get();

    return view('management.notification_templete', ['notifications' => $results]);


    

  }
  public function export() 
  {

      $filename = 'notifications_template_list_' . now()->format('d_M_Y') . '.csv';
  
  return Excel::download(new notificationsExport, $filename, \Maatwebsite\Excel\Excel::CSV);
  }
}
