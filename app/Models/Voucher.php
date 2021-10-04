<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VoucherUsed;

class Voucher extends Model
{
    protected $table = 'tb_vouchers';
    protected $primaryKey = 'voucher_id';

    public function Voucher_decode($canuse = null)
    {
        foreach (json_decode($canuse) as $key => $value) {
            return $canuse_name = $value;
        }
    }

    /**
     * Get all of the Voucher_hasM_VUsed for the Voucher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Voucher_hasM_VUsed()
    {
        return $this->hasMany(VoucherUsed::class, 'vused_code', 'voucher_code');
    }

    public function Count_Vused($code = null)
    {
        $vused = VoucherUsed::where('vused_code', $code)->count();
        return $this->voucher_amount - $vused;
    }
}
