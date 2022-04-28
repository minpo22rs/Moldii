<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'tb_orders';
    protected $primaryKey = 'id_order';
}
