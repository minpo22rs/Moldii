<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;
use App\Models\Tb_credit;
use App\Models\Tb_payment_log;
use App\Models\Tb_donate_log;


class WalletController extends Controller
{
    //
    public function index ()
    { 
        Session::put('wallettypepayment',null);
        Session::put('walletbankcode',null);
        $sql = User::where('customer_id',Session::get('cid'))->first();
        $p = Tb_payment_log::where('customer_id',Session::get('cid'))->orderBy('created_at','DESC')->get();
        return view('mobile.member.wallet.wallet')->with(['sql'=>$sql,'p'=>$p]);
    }
    public function addMoney ()//เติมเงิน
    {
        // dd(Session::all());
        $on = DB::Table('tb_customer_credits')->where('customer_id',Session::get('cid'))->where('status_credit','=','on')->first();
        $off = DB::Table('tb_customer_credits')->where('customer_id',Session::get('cid'))->where('status_credit','=','off')->get();
        $user = User::where('customer_id',Session::get('cid'))->first();
        return view('mobile.member.wallet.add_money')->with(['on'=>$on,'off'=>$off,'user'=>$user]);
    }


    public function paymentWallet(Request $request){

        // dd($request->all());
        // dd(Session::all());
        $payload = '';
        $headers = array();
        $url='';
        $secret_key = "7kHnSDgAH1LBTG1lfKy5tceYsYxhJwW1";
        $public = "yuyCcvpmILceiYhLsDUPDhvCyJOuyWem";
        $data = array();
        $d = date('Ymd');
        $r = rand(0000000,9999999);
        $ref = $d.$r;

        $responseUrl = "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."";
        $backgroundUrl = "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."";

        $amount = number_format($request->number,2,'.','');

        // dd( $amount);
        $sql = Tb_credit::where('customer_id',Session::get('cid'))->first();

       if(Session::get('wallettypepayment') == 'Credit card')
       {
            $url='https://api.globalprimepay.com/v2/tokens/charge';
            $headers = array(
                'Content-Type: application/json',
            );

            $data = array(
                "amount"=> $amount,
                "referenceNo"=> $ref,
                "customerName"=> Session::get('cid'),
                "card"=> array(
                    "token"=> $sql->token
                ),
                "otp"=> "Y",
                "responseUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."",
                "backgroundUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid').""
            );

            $payload = json_encode($data);

        }elseif(Session::get('wallettypepayment') == 'Mobile Banking'){//
            $url='https://api.globalprimepay.com/v2/mobileBanking';
            $mes = $amount.$ref.$responseUrl.$backgroundUrl.$request->num;
            $checksum = hash_hmac('sha256', $mes,$secret_key);
            // $checksum =  base64_encode($s);


            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            // dd($checksum);
            $data = array(
                "amount"=> $amount,
                "referenceNo"=> $ref,
                "publicKey"=> $public,
               
                "bankCode" =>$request->num,
                "checksum"=> $checksum,
                "responseUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."",
                "backgroundUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid').""
            );
            $payload = $data;


        }elseif(Session::get('wallettypepayment') == 'Wechat Pay'){

            $url='https://api.globalprimepay.com/v2/wechat/text';

            $mes = $amount.$ref.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);
            // $checksum = base64_encode($s);

            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            // dd($s);
            $data = array(
                "amount"=> $amount,
                "referenceNo"=> $ref,
                "publicKey"=> $public,
               
                "detail" =>Session::get('cid'),
                "checksum"=> $checksum,
                "backgroundUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid').""
            );
            $payload = $data;


        }elseif(Session::get('wallettypepayment') == 'TrueMoney Wallet'){//
            $url='https://api.globalprimepay.com/v2/trueWallet';
            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            $mes = $amount.$ref.$responseUrl.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);

            // dd('ttttt');
            $data = array(
                "amount"=> $amount,
                "referenceNo"=> $ref,
                "publicKey"=> $public,
                "customerTelephone"=>'0830443596',
                "checksum"=> $checksum,
                "responseUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."",
                "backgroundUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid').""
            );
            $payload = $data;


        }elseif(Session::get('wallettypepayment') == 'ShopeePay'){//
            $url='https://api.globalprimepay.com/v1/shopeePay';
            $headers = array(
                'application/x-www-form-urlencoded',
            ); 

            $mes = $amount.$ref.$responseUrl.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);

            // dd('spppppp');
            $data = array(
                "amount"=> $amount,
                "referenceNo"=> $ref,
                "publicKey"=> $public,
                "responseUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."",
                "checksum"=> $checksum,
                "backgroundUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid').""
            );
            $payload = $data;


        }elseif(Session::get('wallettypepayment') == 'Rabbit Line Pay'){
            $url='https://api.globalprimepay.com/v2/linepay';
            $headers = array(
                'application/x-www-form-urlencoded',
            ); 
            $mes = $amount.$ref.$responseUrl.$backgroundUrl;
            $checksum = hash_hmac('sha256',$mes,$secret_key);
            // $checksum =  base64_encode($s);
            // dd($checksum);
            $data = array(
                "amount"=> $amount,
                "referenceNo"=> $ref,
                "publicKey"=> $public,
                "responseUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."",
                "backgroundUrl"=> "https://modii.sapapps.work/walletgateway/response/".Session::get('cid')."",
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
        // dd('sfdsdf');
        // dd($result);
        if(Session::get('wallettypepayment') == 'Wechat Pay'){
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

    }



    public function selectpaymentWallet ($type,$num)// บัญชีธนาคาร
    {
        // dd($type,$num);
        if($type==1){
            Session::put('wallettypepayment','Credit card');
            // Session::put('walletbankcode',$num);
        }else if($type==2){
            Session::put('wallettypepayment','Mobile Banking');
            // Session::put('walletbankcode',$num);
        }else if($type==3){
            Session::put('wallettypepayment','Wechat Pay');
            // Session::put('walletbankcode',null);
        }else if($type==4){
            Session::put('wallettypepayment','TrueMoney Wallet');
            // Session::put('walletbankcode',null);
        }else if($type==5){
            Session::put('wallettypepayment','ShopeePay');
            // Session::put('walletbankcode',null);
        }else if($type==6){
            Session::put('wallettypepayment','Rabbit Line Pay');
            // Session::put('walletbankcode',null);
        }

        return view('mobile.member.wallet.specifyNumber')->with(['type'=>$type,'num'=>$num]);
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




    public function specifyNumber ()// ระบุจำนวน
    {
        return view('mobile.member.wallet.specifyNumber');
    }
    public function Top_upWallet (Request $request,$id)// Top-up wallet
    {
        // dd(Session::all());
        // dd($id);
        Session::put('cid',$id);
        $sql  =  new Tb_payment_log();
        $sql->customer_id  = $id;
        $sql->payment_type  = 'IN';
        $sql->refno  = $request->referenceNo;
        $sql->gbpref  = $request->gbpReferenceNo;
        $sql->amount  = $request->amount;
        $sql->save();
        User::where('customer_id',$id)->increment('customer_wallet',$request->amount);
        return redirect('user/wallet')->with('msg','เติมเงินเรียบร้อยแล้ว');
    }


    public function convert ()
    { 
        $sql = User::where('customer_id',Session::get('cid'))->first();
        return view('mobile.member.wallet.convert')->with(['sql'=>$sql]);
    }


    public function submitconvert (Request $request)
    { 
        $sqls = User::where('customer_id',Session::get('cid'))->first();
        $del = $sqls->customer_wallet -  $request->money;
        $add = $sqls->customer_coin + $request->coin;

        User::where('customer_id',Session::get('cid'))->update(['customer_wallet'=>$del,'customer_coin'=>$add]);


        $sql  =  new Tb_payment_log();
        $sql->customer_id  = Session::get('cid');
        $sql->payment_type  = 'CONVERT';
        $sql->amount  = $request->money;
        $sql->save();

        return redirect('user/myAccount')->with('msg','เติมคอยน์เรียบร้อยแล้ว');
    }


    public function submitdonate (Request $request)
    { 
        // dd($request->all());


        $g = User::where('customer_id',Session::get('cid'))->first();

        $del = $g->customer_coin - $request->coin;
        // dd($del );
        User::where('customer_id',Session::get('cid'))->update(['customer_coin'=>$del]);

        if($request->recive != 0 ){
            $r = User::where('customer_id',$request->recive)->first();
            $add = $r->customer_coin + $request->coin;
            User::where('customer_id',$request->recive)->update(['customer_donate'=> $add]);
            
        }


     
        $sql  =  new Tb_donate_log();
        $sql->g_customer_id  = Session::get('cid');
        $sql->r_customer_id  =  $request->recive;
        $sql->donate  = $request->name;
        $sql->coin  = $request->coin;
  
        $sql->save();

        return 1;
    }


    public function donate ()
    { 
        $sql = User::where('customer_id',Session::get('cid'))->first();
        return view('mobile.member.userAccount.donate')->with(['sql'=>$sql]);
    }


    public function submitdonateexchange (Request $request)
    { 
        $sql = User::where('customer_id',Session::get('cid'))->first();
        $del = $sql->customer_donate - $request->money;
        $add = $sql->customer_coin + $request->coin;

        User::where('customer_id',Session::get('cid'))->update(['customer_donate'=>$del,'customer_coin'=>$add]);


        return redirect('user/myAccount')->with('msg','แลกคอยน์เรียบร้อยแล้ว');
    }




}
