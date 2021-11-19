<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventSelect extends Model
{
    protected $table = 'tb_eventselect';
    protected $primaryKey = 'event_sp_id';

    /**
     * Get the EventSP_hasO_Product associated with the EventSelect
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function EventSP_hasO_Product()
    {
        return $this->hasOne(product::class, 'product_id', 'event_sp_product_id');
    }
}
