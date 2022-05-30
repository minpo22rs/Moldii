<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Tb_order_detail;
use App\Models\Tb_order;
use App\Models\User;
use App\Models\Tb_credit;
use App\Models\Tb_payment_log;

class OrderController extends Controller
{
    //
    public function ordertoship(Request $request)
    {
        $sql = Tb_order_detail::where('customer_id',Session::get('cid'))
            ->leftJoin('tb_products','tb_order_details.product_id','=','tb_products.product_id')
            ->leftJoin('tb_merchants','tb_order_details.store_id','=','tb_merchants.merchant_id')
            ->get();
        Session::put('totalcart',0);
        Session::put('countcart',0);
        Session::put('cartid',null);

        // dd($sql);

        return view('mobile.member.userAccount.my_list.myList')->with(['sql'=>$sql]);
    }

    public function addorder(Request $request,$id,$rid)
    {
        Session::put('cid',$id);
        // dd($request->all());
     
        if($request->resultCode == '55'){
            return redirect('cartindex');
        }elseif($request->resultCode == '01'){ //customer cancel
            return redirect('cartindex');

        }else{

            Tb_order::where('id_order',$rid)->update(['status_order'=>3]);
            Tb_payment_log::insert(['payment_type'=>'OUT','customer_id'=>Session::get('cid'),
            'amount'=>$request->amount,'refno'=>$request->referenceNo,'gbpref'=>$request->gbpReferenceNo]);
            return redirect('ordertoship')->with('msg','สั่งซื้อสินค้าเรียบร้อยแล้ว');

        }

       

    }

    public function paymentgateway(Request $request){


        $address = DB::Table('tb_customer_addresss')->where('customer_id',Session::get('cid'))->where('address_status','=','on')
                ->leftJoin('districts', 'tb_customer_addresss.customer_tumbon', '=', 'districts.id')
                ->leftJoin('amphures', 'tb_customer_addresss.customer_district', '=', 'amphures.id')
                ->leftJoin('provinces', 'tb_customer_addresss.customer_province', '=', 'provinces.id')
                ->select('tb_customer_addresss.customer_address','tb_customer_addresss.customer_phone','tb_customer_addresss.customer_postcode'
                            ,'districts.name_th as tth','amphures.name_th as ath','provinces.name_th as pth')
                ->first();
        $order = new Tb_order();
        $order->customer_id = Session::get('cid');
        $order->order_total = number_format(Session::get('totalcart'),2,'.','');
        $order->status_order = 4;

        if(Session::get('coin')!=null){
        $order->order_coin = Session::get('coin');
        User::where('customer_id',Session::get('cid'))->update(['customer_point'=>0]);

        }
        $order->shipping_cost = Session::get('sumship');
        $order->order_code = substr(md5(mt_rand()), 0, 8);
        $order->order_address = $address->customer_address;
        $order->order_phone = $address->customer_phone;
        $order->order_tumbon = $address->tth;
        $order->order_district = $address->ath;
        $order->order_province = $address->pth;
        $order->order_postcode = $address->customer_postcode;
        $order->save();

        $sql = DB::Table('tb_carts')->whereIn('cart_id',Session::get('cartid'))->get();

        foreach($sql as $sqls){
            $p = DB::Table('tb_products')->where('product_id',$sqls->product_id)->first();
            $order_de = new Tb_order_detail();
            $order_de->order_id = $order->id;
            $order_de->product_id =  $sqls->product_id;
            if( $p->product_discount == null){
                $order_de->price = $p->product_price;
            }else{

             $order_de->price =  $p->product_discount;
            }


            $order_de->store_id =  $sqls->store_id;
            $order_de->customer_id = Session::get('cid');
            $order_de->amount =  $sqls->count;

            $order_de->save();
        }

        DB::Table('tb_carts')->whereIn('cart_id',Session::get('cartid'))->delete();






        // dd(Session::all());
        $url='';
        $secret_key = "7kHnSDgAH1LBTG1lfKy5tceYsYxhJwW1";
        $public = "yuyCcvpmILceiYhLsDUPDhvCyJOuyWem";
        $data = array();
        $d = date('Ymd');
        $r = rand(0000000,9999999);
        $ref = $d.$r;

        $responseUrl = "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."";
        $backgroundUrl = "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."";

        $amount = number_format(Session::get('totalcart'),2,'.','');
        $sql = Tb_credit::where('customer_id',Session::get('cid'))->where('num',Session::get('bankcode'))->first();
        Session::put('sumship',$request->sumship);




        if(Session::get('typepayment') == 'Moldii wallet'){
            Tb_order::where('id_order',$order->id)->update(['status_order'=>3]);
            
            $total =  Session::get('totalcart')+ Session::get('sumship');
            User::where('customer_id',Session::get('cid'))->decrement('customer_wallet',$total);
            return  redirect('ordertoship')->with('msg','สั่งซื้อสินค้าเรียบร้อยแล้ว');

        }elseif(Session::get('typepayment') == 'Credit card'){//
            $url='https://api.globalprimepay.com/v2/tokens/charge';
            $headers = array(
                'Content-Type: application/json',
            );

            $data = array(
                "amount"=> number_format( Session::get('totalcart'),2,'.',''),
                "referenceNo"=> $ref,
                "customerName"=> Session::get('cid'),
                "card"=> array(
                    "token"=> $sql->token
                ),
                "otp"=> "Y",
                "responseUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
                "backgroundUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id.""
            );

            $payload = json_encode($data);

        }elseif(Session::get('typepayment') == 'Mobile Banking'){//
            $url='https://api.globalprimepay.com/v2/mobileBanking';
            $mes = $amount.$ref.$responseUrl.$backgroundUrl.Session::get('bankcode');
            $checksum = hash_hmac('sha256', $mes,$secret_key);
            // $checksum =  base64_encode($s);


            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            // dd($checksum);
            $data = array(
                "amount"=> number_format( Session::get('totalcart'),2,'.',''),
                "referenceNo"=> $ref,
                "publicKey"=> $public,
               
                "bankCode" =>Session::get('bankcode'),
                "checksum"=> $checksum,
                "responseUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
                "backgroundUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
            );
            $payload = $data;


        }elseif(Session::get('typepayment') == 'Wechat Pay'){

            $url='https://api.globalprimepay.com/v2/wechat/text';

            $mes = $amount.$ref.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);
            // $checksum = base64_encode($s);

            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            // dd($s);
            $data = array(
                "amount"=> number_format( Session::get('totalcart'),2,'.',''),
                "referenceNo"=> $ref,
                "publicKey"=> $public,
               
                "detail" =>Session::get('cid'),
                "checksum"=> $checksum,
                "backgroundUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
            );
            $payload = $data;


        }elseif(Session::get('typepayment') == 'TrueMoney Wallet'){//
            $url='https://api.globalprimepay.com/v2/trueWallet';
            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            $mes = $amount.$ref.$responseUrl.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);

            // dd('ttttt');
            $data = array(
                "amount"=> number_format( Session::get('totalcart'),2,'.',''),
                "referenceNo"=> $ref,
                "publicKey"=> $public,
                "customerTelephone"=>'0830443596',
                "checksum"=> $checksum,
                "responseUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
                "backgroundUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
            );
            $payload = $data;


        }elseif(Session::get('typepayment') == 'ShopeePay'){//
            $url='https://api.globalprimepay.com/v1/shopeePay';
            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            $mes = $amount.$ref.$responseUrl.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);

            // dd('spppppp');
            $data = array(
                "amount"=> number_format( Session::get('totalcart'),2,'.',''),
                "referenceNo"=> $ref,
                "publicKey"=> $public,
                "responseUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
                "checksum"=> $checksum,
                "backgroundUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
            );
            $payload = $data;


        }elseif(Session::get('typepayment') == 'Rabbit Line Pay'){
            $url='https://api.globalprimepay.com/v2/linepay';
            $headers = array(
                'application/x-www-form-urlencoded',
            ); 
            $mes = $amount.$ref.$responseUrl.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);
            // $checksum =  base64_encode($s);
            // dd($checksum);
            $data = array(
                "amount"=> Session::get('totalcart'),
                "referenceNo"=> $ref,
                "publicKey"=> $public,
                "responseUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
                "backgroundUrl"=> "http://127.0.0.1:8000/gateway/response/".Session::get('cid')."/".$order->id."",
                "detail" =>Session::get('cid'),
                "checksum"=> $checksum,
            );
            $payload = $data;

        }
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ':');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);

        $result = curl_exec($ch);

        curl_close($ch);

        $chargeResp = json_decode($result, true);

        // dd($chargeResp);
        if(Session::get('typepayment') == 'Wechat Pay'){
            return view('mobile.member.userAccount.wechat')->with(['res'=>$chargeResp['wechat']]);

        }
        if($chargeResp == null){
            return view('mobile.member.userAccount.threedsecure')->with(['res'=>$result]);
        }else{
            if($chargeResp['resultCode']=='00'){
                $res = self::threed( $chargeResp['gbpReferenceNo']);
                return view('mobile.member.userAccount.threedsecure')->with(['res'=>$res]);
    
            }else{
                return back()->with(['msg'=>'error']);
            }

        }
        // dd('eeeee');
        



    }


    public function threed($x){
        // dd(/$x);
        $data1 = array(
            "publicKey"=> 'yuyCcvpmILceiYhLsDUPDhvCyJOuyWem',
            "gbpReferenceNo"=> $x,
            
        );

        $ch1 = curl_init('https://api.globalprimepay.com/v2/tokens/3d_secured');
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_POST, true);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, $data1);
       
        $result1 = curl_exec($ch1);

        curl_close($ch1);

        return $result1;
        
    }



    public function choosecode($ship)
    {
        $date = date('Y-m-d');
        // $date ="2022-05-02";
        // dd($date);
        // $sql = DB::Table('tb_vouchers')->where('voucher_start', '>=','2022-05-02 00:00:00')->where('voucher_expire', '<=', '2022-05-02 00:00:00')->get();

        // $sql = DB::Table('tb_vouchers')->where('voucher_start', '>=', $date)->where('voucher_expire', '<=', $date)->get();
        // $sql = DB::Table('tb_vouchers')
        // ->whereRaw("'?' BETWEEN voucher_start AND voucher_expire",[$date])->get();
        $sql = DB::Table('tb_vouchers')->where('voucher_use_for', 'like', '%discount%')->get();
        // dd($sql);
   

        return view('mobile.member.userAccount.my_list.chooseCode')->with(['sql'=>$sql,'ship'=>$ship]);
    }

    public function selectcode($id,$ship)
    {

       
        $sql = DB::Table('tb_vouchers')->where('voucher_id', $id)->first();
        if($sql->voucher_unit=='bath'){
            $sum =  Session::get('totalcart')-$sql->voucher_value;
            Session::put('totalcart',$sum);
        }else{
            $sum =  Session::get('totalcart')-(Session::get('totalcart')*$sql->voucher_value/100);
            Session::put('totalcart',$sum);
        }
        Session::put('idcode',$sql->voucher_id);
        Session::put('codename',$sql->voucher_name);
   

        return redirect('checkoutaddress');
    }


    public function selectpaymentmethod($type,$name)
    {

       
        // $sql = DB::Table('tb_vouchers')->where('voucher_id', $id)->first();
        if($type==1){
            Session::put('typepayment','Credit card');
            Session::put('bankcode',$name);
        }else if($type==2){
            Session::put('typepayment','Mobile Banking');
            Session::put('bankcode',$name);
        }else if($type==3){
            Session::put('typepayment','Wechat Pay');
            Session::put('bankcode',null);
        }else if($type==4){
            Session::put('typepayment','TrueMoney Wallet');
            Session::put('bankcode',null);
        }else if($type==5){
            Session::put('typepayment','ShopeePay');
            Session::put('bankcode',null);
        }else if($type==6){
            Session::put('typepayment','Rabbit Line Pay');
            Session::put('bankcode',null);
        }else if($type==7){
            Session::put('typepayment','Moldii wallet');
            Session::put('bankcode',null);
        }

        // dd(Session::all());
   

        return redirect('checkoutaddress');
    }


    


    
}
