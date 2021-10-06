<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Merchant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_merchants';
    protected $primaryKey = 'merchant_id';


    protected $fillable = [
        'name', 'merchant_email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the comments for the Merchant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Merchant_hasM_Products()
    {
        return $this->hasMany(product::class, 'product_merchant_id', 'merchant_id');
    }

    /**
     * Get the Merchant_belong_EventA that owns the Merchant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Merchant_belong_EventA()
    {
        return $this->belongsTo(EventApplicant::class, 'merchant_id');
    }
}
