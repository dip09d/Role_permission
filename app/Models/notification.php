<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $table = 'pref_notifications_template';

    public function getNotificationTemplateById($id)
    {
        try {
            $notification = DB::table('pref_notifications_template')
                ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
                ->where('pref_notifications_template_names.notification_template_id', $id)
                ->first();

            return $notification;
        } catch (\Exception $e) {
            // Handle exception or log error
            return null;
        }
    }

    public function getAllNotificationTemplates()
    {
        try {
            $notifications = DB::table('pref_notifications_template')
                ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
                ->orderByDesc('pref_notifications_template.notification_template_id')
                ->where('pref_notifications_template.status', '!=', config('constants.STATUS_DELETED'))
                ->get();

            return $notifications;
        } catch (\Exception $e) {
            // Handle exception or log error
            return null;
        }
    }


    public function editNotification($id, $validatedData, $displayOrder)
    {
        try {
            $notification= DB::table('pref_notifications_template')
                ->join('pref_notifications_template_names', 'pref_notifications_template.notification_template_id', '=', 'pref_notifications_template_names.notification_template_id')
                ->where('pref_notifications_template.notification_template_id', $id)
                ->update([
                    'pref_notifications_template.' => $validatedData['Template_name'],
                    'pref_notifications_template.template_type' => $validatedData['Template_Type'],
                    'pref_notifications_template.all_template_keys' => $validatedData['Template_Keys'],
                    'pref_notifications_template.template_key' => $validatedData['Template_Key'],
                    'pref_notifications_template.status' => $validatedData['status'],
                    'pref_notifications_template.display_order' => $displayOrder,
                    'pref_notifications_template_names.template_content' => $validatedData['Content'],
                    'pref_notifications_template_names.lang' => 'er',
                ]);

            return $notification;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return $e->getMessage();
        }
    }
}
