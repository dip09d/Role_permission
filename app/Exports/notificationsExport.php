<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class notificationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $mails = DB::table('pref_notifications_template')
            ->select(
                'pref_notifications_template.notification_template_id',
                'pref_notifications_template.template_for',
                'pref_notifications_template.template_key',
                DB::raw('CASE WHEN pref_notifications_template.status = 1 THEN "Active" ELSE "Inactive" END AS status')
            )
            ->where('pref_notifications_template.status', '!=', config('constants.STATUS_DELETED'))
            ->orderByDesc('pref_notifications_template.notification_template_id')
            ->get();

        return  $mails;
    }
}
