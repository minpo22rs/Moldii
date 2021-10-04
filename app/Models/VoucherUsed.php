<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherUsed extends Model
{
    protected $table = 'tb_voucher_used';
    protected $primaryKey = 'vused_id';

    /**
     * Get the VUsed_belong_Voucher that owns the VoucherUsed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VUsed_belong_Voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_code');
    }

    /**
     * Get the user associated with the VoucherUsed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Vused_hasO_customer()
    {
        return $this->hasOne(customer::class, 'customer_id', 'vused_customer_id');
    }

    /**
     * Get the user associated with the VoucherUsed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function VUsed_hasO_Product()
    {
        return $this->hasOne(product::class, 'product_id', 'vused_at');
    }
}
