<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\Flashsale;
use App\Models\Event;
use App\Models\product;

class DashboardController extends Controller
{
    public function index()
    {
        $current = Carbon::now();
        $fs = Flashsale::latest()->first();
        $product_count = product::where('product_merchant_id', Auth::guard('merchant')->user()->merchant_id)->count();
        $data = array(
            'current' => $current, 
            'fs' => $fs, 
            'product_count' => $product_count, 
        );
        return view('merchant.index', $data);
    }
}
