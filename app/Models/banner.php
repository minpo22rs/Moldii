<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table = 'tb_banners';
    protected $primaryKey = 'banner_id';

    public function BannerStatus()
    {
        if ($this->banner_status == 1) {
            return '<span style="color: #2ed8b6;"><i class="fa fa-2x fa-check"></i></span>';
        } else {
            return '<span style="color: #FF5370;"><i class="fa fa-2x fa-times"></i></span>'; 
        }
    }
}
