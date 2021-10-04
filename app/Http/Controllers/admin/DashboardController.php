<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Merchant;
use App\Models\customer;
use Carbon\Carbon;
use App\Models\Flashsale;

class DashboardController extends Controller
{
    public function index()
    {
        $current = Carbon::now();
        $merchant_count = Merchant::count();
        $customer_count = customer::count();
        $fs = Flashsale::where('fs_type', 'FS')->latest()->first();
        $data = array(
            'merchant_count' => $merchant_count, 
            'current' => $current, 
            'fs' => $fs, 
            'customer_count' => $customer_count, 
        );
        return view('backend.index', $data);
    }
}
