<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class product_img extends Model
{
    use SoftDeletes;

    protected $table = 'tb_product_imgs';
    protected $primaryKey = 'product_img_id';

    /**
     * Get all of the comments for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ProductgetTags($type = null)
    {
        return $this->hasMany(tag::class, 'tag_fkey', 'product_id')->where('tag_type', $type)->get();
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
        $merchant = $this->belongsTo(Merchant::class, 'product_merchant_id');
        if ($merchant != null) {
            return $merchant;
        } else {
            return '';
        }
    }

    /**
     * Get the Product_belong_voucher that owns the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Product_belong_voucher()
    {
        return $this->belongsTo(VoucherUsed::class, 'product_id');
    }

    /**
     * Get all of the Product_hasM_Options for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Product_hasM_Options()
    {
        return $this->hasMany(Option::class, 'option_fkey', 'product_id');
    }

    /**
     * Get the Product_belong_Event that owns the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Product_belong_EventSP()
    {
        return $this->belongsTo(EventSelect::class, 'product_id');
    }
}