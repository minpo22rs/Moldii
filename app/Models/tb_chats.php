<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_chats extends Model
{
    use HasFactory;

    protected $fillable = [
      'text',
      'store_id',
      'customer_id'

    ];

}
