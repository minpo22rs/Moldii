<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EventApplicant;

class Flashsale extends Model
{
    protected $table = 'tb_flashsales';
    protected $primaryKey = 'fs_id';

    public function Fs_hasO_event()
    {
        $con = $this->hasOne(EventApplicant::class, 'event_fs_id', 'fs_id');
        if ($con != null) {
            return $con;
        } else {
            return '';
        }
    }

    public function Fs_event_status($status = null)
    {
        if ($status == 1) {
            return '<label class="label label-success label-lg">Accept</label>';
        } else {
            return '<label class="label label-danger label-lg">Decline</label>';
        }
    }

    public function fs_event_applicant($id = null)
    {
        $event_count = EventApplicant::where('event_fs_id', $id)->where('event_accept', 1)->count();
        return $event_count;
    }
}
