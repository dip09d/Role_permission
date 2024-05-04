<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class NotificationHelper
{
    public static function getUnreadNotificationCount()
    {
        $rows = DB::table('pref_admin_notifications')
            ->where('read_status', config('constants.STATUS_INACTIVE'))
            ->get();

        return count($rows);
    }
}