<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    protected $table = 'pref_mailtemplate';

    public function getEmailTemplateById($id)
    {
        try {
            $mail = DB::table('pref_mailtemplate')
                ->join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
                ->where('pref_mailtemplate_names.template_id', $id)
                ->first();

            return $mail;
        } catch (\Exception $e) {
            // Handle exception or log error
            return null;
        }
    }

    public function getAllEmailTemplates()
    {
        try {
            $mails = DB::table('pref_mailtemplate')
                ->join('pref_mailtemplate_names', 'pref_mailtemplate.template_id', '=', 'pref_mailtemplate_names.template_id')
                ->orderByDesc('pref_mailtemplate.template_id')
                ->where('pref_mailtemplate.status', '!=', config('constants.STATUS_DELETED'))
                ->get();
            
            return $mails;
        } catch (\Exception $e) {
            // Handle exception or log error
            return null;
        }
    }
}
