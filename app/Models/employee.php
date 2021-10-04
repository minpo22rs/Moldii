<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_employee';
    protected $primaryKey = 'employee_id';


    protected $fillable = [
        'employee_email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

     /**
      * Get the AuthorgetNoti that owns the employee
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function AuthorgetNoti()
     {
         return $this->belongsTo(notification::class, 'noti_create_by');
     }
}

