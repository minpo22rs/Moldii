<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'otp_customer_id',
        'otp_code',
        'otp_ref',
        'otp_verified',
        'tel',
        
        
    ];
}
