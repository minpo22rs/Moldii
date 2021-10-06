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

    /**
     * Get the EventA_hasO_merchant associated with the EventApplicant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function EventA_hasO_merchant()
    {
        return $this->hasOne(Merchant::class, 'merchant_id', 'event_merchant_id');
    }
}
