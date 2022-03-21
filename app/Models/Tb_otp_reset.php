<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_otp_reset extends Model
{
    use HasFactory;

    protected $fillable = [
        'otp_code',
        'otp_ref',
        'otp_verified',
        'tel',
        
        
    ];
}
