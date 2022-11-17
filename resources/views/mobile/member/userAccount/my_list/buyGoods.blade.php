@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.location.replace('cartindex')"></ion-icon>
    </div>
    <div class="pageTitle">
        ทำการสั่งซื้อ
    </div>
</div>
@endsection
@section('content')
<br>
<div class="container m-0 p-0">
    
        @if($add!=null)
            <?php  
                    $p = DB::Table('provinces')->where('id',$add->customer_province)->first();
                    $a = DB::Table('amphures')->where('id',$add->customer_district)->first();
                    $t = DB::Table('districts')->where('id',$add->customer_tumbon)->first();
            
            
            ?>
            <div  class=" p-2 col-12 " style="height:144px;">
                <div class="row col-12 m-0">
                        <h5 class="font-weight-bold">{{$add->customer_name}}  {{$add->customer_phone}}</h5>

                </div>
            
                <a href="{{url('user/chooseAddress')}}" class="row col-12 p-0 m-0" style="color:rgba(14, 18, 66, 1);">
                    <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
                    <div class="text-start col-10">
                        <h5 class="m-0 " style="height:70px;">รายละเอียดที่อยู่ <br> <br> {{$add->customer_address}} {{$t->name_th}} {{$a->name_th}} {{$p->name_th}} {{$add->customer_postcode}}</h5>
                        
                    </div>

                    <i class="far fa-angle-right col-1 p-0 align-self-center text-right" style="font-size:1.7rem;"></i>



                </a>
            </div>
        @else
            <div  class=" p-2 col-12 " style="height:90px;">
                <br>
                <div class="row col-12 m-0">
                    <a href="{{url('user/chooseAddress')}}" class="row col-12 p-0 m-0" >
                        <h5 class="font-weight-bold" style="color:red"><u>กรุณาเลือกที่อยู่การจัดส่ง</u></h5>
                    </a>

                </div>
            </div>
        @endif
  


    <?php  $sumship = 0; $countt = 0;?>
    @foreach($mycart as $mycarts)
        <?php   $store = DB::Table('tb_merchants')->where('merchant_id',$mycarts->store_id)->first();
                $carttt = DB::Table('tb_carts')->where('store_id',$store->merchant_id)->whereIn('cart_id',Session::get('cartid'))->get(); 
                $sum = 0;
                $countt = 0;


                $cartt = DB::Table('tb_carts')->where('store_id',$store->merchant_id)->whereIn('cart_id',Session::get('cartid'))
                        ->orderBy('shipping_3per','DESC')->first(); 
                

                // $pluck = $cartt->pluck('product_id');
                // $ship = DB::Table('tb_product_shippings')->whereIn('id_product',$pluck)
                //             ->leftJoin('tb_shipping_companys','tb_product_shippings.id_company','=','tb_shipping_companys.id_shipping_company')
                //             ->orderBy('cost','DESC')->first();
                $sumship += $cartt->shipping_3per;

        ?>
        <div class="row p-1 border-top mt-2 " style="color:black; font-size:18px; height:43px;">
            <div class="col-8 mx-0 align-self-center row">

                <img src="{{ asset('new_assets/img/icon/shop.svg')}}" alt="alt" style="font-size:1rem;">
                <h5 class="m-0 ml-1 font-weight-bold align-self-center">{{$store->merchant_name}}</h5>
            </div>

        </div>

        @foreach($carttt as $cartts)
            <?php   $product = DB::Table('tb_products')->where('product_id',$cartts->product_id)->first();
                    if( $product->product_discount == null){
                        $sum += (float)$product->product_price*(int)$cartts->count;
                    }else{

                        $sum += (float)$product->product_discount*(int)$cartts->count;
                    } 

                    $countt += $cartts->count;
            ?>
            <div class="col-12 row p-2 pr-1 border-top m-0">
                <div class="col-3 p-0">
                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$product->product_img.'')}}" class="col-12 pl-0  align-self-start" style="width:90px;height:62px"><br>
                </div>
                <div class="col-5 pr-0 align-self-center">
                    <h5 class="mb-1 ">{{$product->product_name}}</h5>
                    <h5 class="mb-1" style="color:rgba(79, 77, 77, 1);">จำนวนสินค้า</h5>
                    <h5 class="m-0" style="color:rgba(79, 77, 77, 1);">ราคาต่อหน่วย</h5>
                </div>
                <div class="col-4 text-right pr-0 align-self-end">
                    <h5 class="mb-1 font-weight-bold" style="">x{{$cartts->count}}</h5>
                    <div class="row justify-content-end col-12 m-0 p-0">
                        <!-- <h5 class="m-0 font-weight-bold" style="color:rgba(116, 116, 116, 1);"><s>฿200.00</s> </h5> -->
                        <h5 class="m-0 font-weight-bold ml-1">฿ {{number_format($product->product_discount!=null?$product->product_discount:$product->product_price,2,'.','')}}</h5>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="col-12 p-2 pt-1 " style="background: #DFEDFC;">
            <h5 class="m-0  mt-1 mb-1 font-weight-bold " style="color:rgba(80, 202, 101, 1);">ตัวเลือกการจัดส่ง</h5>
            <div class="col-12 row m-0 p-0 pt-1 justify-content-between border-top">
                <?php $sh = DB::Table('tb_shipping_companys')->where('id_shipping_company',$cartt->shipping_id)->first();
                
                ?>
                <div class="col-8 p-0">
                    
                    <h5 class="m-0">{{$sh->name_company}} - ส่งธรรมดาในประเทศ </h5>
                    {{-- <h5 class="m-0">จะได้รับใน {{date('d-m-Y', strtotime('+2 days'))}} - {{date('d-m-Y', strtotime('+5 days'))}} </h5> --}}
                    <h5 class="m-0">จะได้รับ{{$cartt->shipping_day}}</h5>
                </div>
                <a href="{{url('user/chooseShipping/'.$mycarts->store_id.'/'.$cartt->shipping_id.'')}}" class="col-3 p-0 pr-1  row justify-content-end" style="color:black;">
                    <h5 class="m-0 align-self-center font-weight-bold mr-1">฿ {{$cartt->shipping_3per}}</h5>
                    <i class="far fa-angle-right col-1 p-0 align-self-center" style="font-size:1.5rem;"></i>

                </a>
            </div>
        </div>

        {{-- <div  class="row p-1 border-top pl-2" style="color:black; height:2.375rem;">
            <div class="col-7 mx-0 align-self-center row p-0">

                <h5 class="m-0 ml-2 font-weight-bold">หมายเหตุ:</h5>
            </div>
            <div class="col-5 p-0 pr-1 mx-0 text-right">
                <input style="border:none; width:100%; height:100%; margin-left: 30px;  " id="test" type="text" name="note" class="form-control input_2 p-0  " placeholder="ฝากข้อความถึงผู้ขาย">

                <!-- <h6 class="my-1"><small style="color:rgba(181, 181, 181, 1);"></small> </h6> -->

            </div>
        </div> --}}
        <br>
        <a href="javascript:;" class="row p-1 border-top border-bottom pl-2" style="color:black; height:2.375rem;">
            <div class="col-8 mx-0 align-self-center row p-0">

                <h5 class="m-0 ml-2 font-weight-bold">คำสั่งซื้อทั้งหมด({{$countt}}ชิ้น):</h5>
            </div>
            <div class="col-4 mx-0 text-right">
                <h5 class="m-0 font-weight-bold mr-1" style="color:rgba(80, 202, 101, 1);">฿ {{number_format($sum+$cartt->shipping_3per,2,'.',',')}}</h5>

            </div>
        </a>
    @endforeach
   

    <form action="{{url('paymentgateway')}}" method="POST" id="formsubmit">
        @csrf
        {{-- โค้ดส่วนลด --}}
        <a href="{{url('choosecode')}}/{{$sumship}}/{{$sum}}" class="row py-1 border-top pl-2 mt-1" style="color:black; font-size:18px">
            <div class="col-6 mx-0 pl-0 align-self-center row">
                <img src="{{ asset('new_assets/img/icon/ticket.svg')}}" alt="alt" style="">

                <h5 class="m-0 ml-1 font-weight-bold align-self-center">โค้ดส่วนลด</h5>
            </div>
            <div class="col-6 mx-0 text-right">

                <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                    <h5 class="m-0 mr-1 font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">{{Session::get('codename')}}</h5>

                    <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
                </div>
            </div>
        </a>
        <div class="col-12 mx-0  py-2 px-3 pl-1 border-top border-bottom align-self-center justify-content-between row ">
            <div class="row col-8 mx-0 pl-0 align-self-center">
                <img src="{{ asset('new_assets/img/icon/coin.svg')}}" style="color:black;">

                <h5 class="m-0 ml-2 font-weight-bold align-self-center">คอยน์ของคุณ {{number_format($my->customer_coin,2,'.',',')}} คอยน์</h5>
            </div>
            <div class="custom-control custom-switch  ">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="coinuser" value="{{$my->customer_coin}}" onchange="coinswitch();" {{Session::get('coin')!=0?'checked':''}}  {{$my->customer_coin==0 || $my->customer_coin>Session::get('totalcart')?'disabled':''}}>
                <label class="custom-control-label" for="customSwitch1"></label>
            </div>
        </div>
        
        {{-- วิธีการชำระเงิน --}}
        <a href="{{url('user/paymentMethod')}}" class="row py-1 border-top border-bottom pl-2 mt-2" style="color:black; font-size:18px">
            <div class="col-6 mx-0 pl-0 align-self-center row">
                <img src="{{ asset('new_assets/img/icon/wallet.svg')}}" alt="alt" style="">

                <h5 class="m-0 ml-1 font-weight-bold align-self-center">วิธีการชำระเงิน</h5>
            </div>
            <div class="col-6 mx-0 text-right">

                <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                    <h5 class="m-0 mr-1 font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">{{Session::get('typepayment')==null?'เลือกวิธีการชำระเงิน':Session::get('typepayment')}}</h5>

                    <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
                </div>
            </div>
        </a>
        <div class="col-12 row p-0  p-2">

            <div class="col-9 pr-0 align-self-center">
                <h5 class="mb-1  " style="color:rgba(79, 77, 77, 1);">รวมค่าสินค้า</h5>
                <h5 class="mb-1 " style="color:rgba(79, 77, 77, 1);">ค่าจัดส่ง</h5>
                <h5 class="m-0 " style="color:rgba(79, 77, 77, 1);">รวมทั้งหมด</h5>
            </div>
            <div class="col-3 text-right pr-0 align-self-end">
                <h5 class="mb-1 font-weight-bold" style="" id="subsum">฿ {{number_format(Session::get('totalcart'),2,'.',',')}}</h5>
                <h5 class="mb-1 font-weight-bold" style="">฿ {{number_format($sumship,2,'.',',')}}</h5>
                <h5 class="m-0 font-weight-bold" style="" id="subsumship">฿ {{number_format((Session::get('totalcart')+$sumship),2,'.',',')}}</h5>
            </div>
        </div>
        <input type="hidden" name="sumship" id="sumship" value="{{number_format($sumship,2,'.','')}}">
        <div class="col-12 row m-0 pr-0 border-top justify-content-end">

            <div class="col-12 row text-right p-0">
                <div class="col px-1 py-1 align-self-center">
                    <div class="row p-0 m-0 justify-content-end">
                        <h5 class="m-0 ">ยอดชำระเงินทั้งหมด</h5>
                        <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);" id="totalsum">฿ {{number_format((Session::get('totalcart')+$sumship),2,'.',',')}}</h5>
                    </div>
                    {{-- <h5 class="m-0 ">ได้รับ 0 คะแนน</h5> --}}
                </div>

                <button style="height:4.125rem;font-weight:800" type="button" class="btn btn-success square " onclick="submitform();">สั่งสินค้า</button>
            </div>
        </div>

    </form>

<br><br>




</div>
@endsection
@section('custom_script')
    <script>

        bottom_now(1);

        function coinswitch(){
            var  chk = 0;
            var  v = document.getElementById('sumship').value;
            if($('#customSwitch1').is(":checked")){
                chk = 0;
            }else{
                chk = 1; //uncheck
                // document.getElementById('customSwitch1').checked=false;
            }

            
            $.ajax({
                url: '{{ url("coinswitch2")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'chk':chk,'v':v},
                success: function(data) {
                    var t  = JSON.parse(data);
                    // console.log(t['colors']);
                    $('#subsum').html(t['subsum']);
                    $('#subsumship').html(t['subsumship']);
                    $('#totalsum').html(t['totalsum']);
                    // $('#chkcount').html(t['chkcount']);
                    // countchk =  t['chkcount'];
                }
            });
           
        
        }


        function submitform(){
            var chk = "{{Session::get('typepayment')}}";
            var check = "{{$chk}}";
            // console.log(chk);
            if(chk==''){
                Swal.fire({
                    text : "กรุณาเลือกวิธีการชำระเงิน",
                    confirmButtonColor: "#fc684b",
                })


            }else{
                if(parseInt(check) ==1){
                    Swal.fire({
                        text : "กรุณาเลือกที่อยู่การจัดส่ง",
                        confirmButtonColor: "#fc684b",
                    })


                }else{
                    $('#formsubmit').submit();

                }
            }
        }



    </script>

@endsection
