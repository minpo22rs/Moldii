<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventApplicant extends Model
{
    protected $table = 'tb_event_applicants';
    protected $primaryKey = 'event_id';

    public function Event_belong_fs()
    {
        return $this->belongsTo(Flashsale::class, 'event_fs_id', 'fs_id');
    }
}
