<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $table = 'tb_notifications';
    protected $primaryKey = 'noti_id';
    
    /**
     * Get the user associated with the notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function NotigetAuthor()
    {
        return $this->hasOne(employee::class, 'employee_id', 'noti_create_by');
    }
}
