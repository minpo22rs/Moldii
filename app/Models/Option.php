<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'tb_options';
    protected $primaryKey = 'option_id';

    /**
     * Get the Option_belong_Product that owns the Option
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Option_belong_Product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
