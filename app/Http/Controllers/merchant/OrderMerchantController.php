<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Merchant;
use App\Models\product;
use Illuminate\Http\Request;
use DB;
use Auth;


class OrderMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = DB::Table('tb_order_details')->where('store_id',Auth::guard('merchant')->user()->merchant_id)->get();
        $pluck = $sql->pluck('order_id');
        $num = Orders::whereIn('id_order',$pluck)->where('status_order','!=',5)
                        ->leftJoin('tb_customers','tb_orders.customer_id','=','tb_customers.customer_id')
                        ->orderBy('tb_orders.created_at','DESC')->get();

        // dd($num );
        return view('merchant.order.order')->with(['num'=>$num]);
    }


    public function orderdetail($id)
    {
        $order = Orders::where('id_order',$id)->first();
        $num = Orders::where('customer_id',$order->customer_id)->get();
        return view('merchant.order.order-details')->with(['order'=>$order,'num'=>$num]);
    }


    public function cancelorder($id)
    {
        $order = DB::Table('tb_orders')->where('id_order',$id)->update(['status_order'=>4]);
        
        return back()->with('success','ยกเลิกออเดอร์เรียบร้อยแล้ว');
    }


    
    public function createbooking(Request $request){
        // dd($request->all());
        $sql = Orders::where('id_order',$request->oid)->first();
        $od = DB::Table('tb_order_details')->where('id_order_detail',$request->odid)
                ->orderby('shipping_cost','DESC')->where('store_id',Auth::guard('merchant')->user()->merchant_id)->first();
        // dd(Auth::guard('merchant')->user()->merchant_id);
        $pro = product::where('product_id',$od->product_id)->first();

        // dd($sql );
        $sqlsel = Merchant::where('merchant_id',Auth::guard('merchant')->user()->merchant_id)->first();
        $province = DB::Table('provinces')->where('id',$sqlsel->merchant_province)->first();
        $tumbon = DB::Table('districts')->where('id',$sqlsel->merchant_tumbon)->first();
        $amphure = DB::Table('amphures')->where('id',$sqlsel->merchant_district)->first();


        $url = 'https://mkpservice.shippop.dev/booking/'; 
        $from = array (
            "name"=> $sqlsel->merchant_name.$sqlsel->merchant_lname,
            "address"=> $sqlsel->merchant_address,
            "district"=> $tumbon->name_th,
            "state"=> $amphure->name_th,
            "province"=>$province->name_th,
            "postcode"=> $sqlsel->merchant_postcode,
            "tel"=> $sqlsel->merchant_phone
        );

        $to = array (
            "name"=> $sql->order_address_name,
            "address"=> $sql->order_address,
            "district"=> $sql->order_tumbon, //tumbon
            "state"=> $sql->order_district,
            "province"=> $sql->order_province,
            "postcode"=> $sql->order_postcode,
            "tel"=> $sql->order_phone
        );

        $parcel = array (
            "name"=> $pro->product_name,
            "weight"=> $pro->weight,
            "width"=> $pro->width,
            "length"=> $pro->length,
            "height"=> $pro->height
        );

        $arraysum = array(
            "from" => $from,
            "to" => $to,
            "parcel" => $parcel,
            "courier_code" => $request->ship,

        );
        // $url = array(
        //     "success"=> "https://testgit.sapapps.work/moldii/merchant/",
        //     "fail"=>"http:\/\/shippop.com\/?fail"

        // );
        
        $datasend = array(
            'api_key' => "pd66f6883421f7c83185b476ece358f3d7608bedf3c8859cba162937677e087480439a610c89e3280c1649670055",
            'email' => "moldiiship@gmail.com",
            // "url"=> array($url),
            "data" => array($arraysum),
        );

        // dd($datasend);
        
        try{
	        $datasend = http_build_query($datasend);

            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $datasend );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
            $content = curl_exec( $ch );
            curl_close($ch);
            $json = json_decode($content);
            $jsondata = (array)$json->data;
            // dd($jsondata);

            if($json->status === 'false'){
                // dd('whattttttt');
                DB::Table('tb_order_details')->where('order_id',$request->oid)
                        ->where('store_id',Auth::guard('merchant')->user()->merchant_id)->update(['status_order'=>'4']);
                return redirect('merchant/ordermerchant')->with('error','Unsuccessfully, please try again.');


            }else{
                // dd('ok');
                Orders::where('id_order',$request->oid)->update(['purchase_id'=>$json->purchase_id]);
                $res = self::confirm($json->purchase_id,$jsondata['0']->tracking_code,$request->oid);
                if($res == 1){
                    return redirect('merchant/ordermerchant')->with('error','Unsuccessfully, please try again.');

                }else{
                    DB::Table('tb_order_details')->where('order_id',$request->oid)->where('store_id',Auth::guard('merchant')->user()->merchant_id)
                            ->update(['tracking_code'=>$jsondata['0']->courier_tracking_code,'status_detail'=>'5']);

                    return redirect('merchant/ordermerchant')->with('success','successfully');

                }

            }
            
        }catch(Exception $ex){
        
            echo $ex;
        }

    }

    public function confirm( $purchase_id ,$tracking_code,$id) {
        $post_data = array(
            'api_key'=>'pd66f6883421f7c83185b476ece358f3d7608bedf3c8859cba162937677e087480439a610c89e3280c1649670055',
            'purchase_id' => $purchase_id
        );
        $post_data = http_build_query($post_data);
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL, 'https://mkpservice.shippop.dev/confirm/');
  
        curl_setopt($curl,CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($curl);
        curl_close($curl);
        $jsonres = json_decode($result);
        
        if($jsonres->status === 'false'){
            DB::Table('tb_order_details')->where('order_id',$id)
                ->where('store_id',Auth::guard('merchant')->user()->merchant_id)->update(['status_order'=>'4']);
            return 1;
        }else{

            // Orders::where('id_order',$id)->update(['tracking_code'=>$tracking_code,'status_order'=>'3']);
            DB::Table('tb_order_details')->where('order_id',$id)
                ->where('store_id',Auth::guard('merchant')->user()->merchant_id)->update(['tracking_code'=>$tracking_code,'status_detail'=>'1']);
            return 0;

        }
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
