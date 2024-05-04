<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function notification()
    {
        $perPage = 10;
        $notifications = DB::table('pref_admin_notifications')
        ->orderByDesc('id')
        ->paginate($perPage, ['*']);
        return view('notification', compact('notifications'));
    }

    public function toggleReadStatus(Request $request)
    {
        $notificationId = $request->input('user_id');
        $readStatus = $request->input('status');
        try {
            DB::table('pref_admin_notifications')
                ->where('id', $notificationId)
                ->update(['read_status' => $readStatus]);

            return response()->json([
                'success' => true,
                'message' => 'Notification read status updated successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update notification read status.'
            ], 500);
        }
    }



    public function delete_notification($id)
    {

        DB::table('pref_admin_notifications')->where('id', $id)
            ->update([
                'read_status' => config('constants.STATUS_DELETED'),
            ]);
        return response()->json(['message' => 'successfully deleted']);
    }
}
