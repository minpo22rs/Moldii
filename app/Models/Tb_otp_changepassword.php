<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_otp_changepassword extends Model
{
    use HasFactory;
    protected $table = "tb_otp_changepasswords";

    protected $fillable = [
        'otp_customer_id',
        'otp_code',
        'otp_ref',
        'otp_verified',
        'tel',
        
        
    ];
}
