<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Merchant;
use Carbon\Carbon;

class Comment extends Model
{
    protected $table = 'tb_comments';
    protected $primaryKey = 'comment_id';

    public function author_name($id = null)
    {
        $merchant = Merchant::findOrFail($id);
        return $merchant->merchant_name.' '.$merchant->merchant_lname; 
    }

    public function diffForHumans($datetime = null)
    {
        Carbon::setLocale('en');
        return Carbon::parse($datetime)->diffForHumans();
    }
}
