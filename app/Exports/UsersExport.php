<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        $mails = DB::table('pref_mailtemplate')
            ->select(
                'pref_mailtemplate.template_id',
                'pref_mailtemplate.template_for',
                'pref_mailtemplate.template_type',
                DB::raw('CASE WHEN pref_mailtemplate.status = 1 THEN "Active" ELSE "Inactive" END AS status')
            )
            ->where('pref_mailtemplate.status', '!=', config('constants.STATUS_DELETED'))
            ->orderByDesc('pref_mailtemplate.template_id')
            ->get();

        return  $mails;
    }
}
