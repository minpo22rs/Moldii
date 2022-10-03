<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Merchant;
use App\Models\customer;
use Carbon\Carbon;

class Comment extends Model
{
    protected $table = 'tb_comments';
    protected $primaryKey = 'comment_id';

    public function author_name($id = null)
    {
        $user = customer::findOrFail($id);
        return $user->customer_username; 
    }

    public function diffForHumans($datetime = null)
    {
        Carbon::setLocale('en');
        return Carbon::parse($datetime)->diffForHumans();
    }
}
