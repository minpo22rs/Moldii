<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class product extends Model
{
    use SoftDeletes;

    protected $table = 'tb_products';
    protected $primaryKey = 'product_id';

    /**
     * Get all of the comments for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ProductgetTags()
    {
        return $this->hasMany(tag::class, 'tag_fkey', 'product_id');
    }

    static public function getProductImg($ref_id = null)
    {
        $img = DB::table('tb_products');
        if ($ref_id != null) {
            $img = $img->where('product_id', $ref_id);
        }
        $img = $img->first();
        $image = $img->product_img;
        return $image;
    }

    /**
     * Get the user that owns the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Products_belong_Merchant()
    {
        return $this->belongsTo(Merchant::class, 'product_merchant_id');
    }

    /**
     * Get the user that owns the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(VoucherUsed::class, 'product_id');
    }
}