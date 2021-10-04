<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = 'tb_tags';
    protected $primaryKey = 'tag_id';

    /**
     * Get the user that owns the tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function TagsgetProduct()
    {
        return $this->belongsTo(product::class, 'tag_fkey');
    }
}
