<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Auction extends Model
{
    protected $table = 'tb_auctions';
    protected $primaryKey = 'id_auction';

    
}
