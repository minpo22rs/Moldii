@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        เลือกบริษัทขนส่ง
    </div>
</div>
@endsection
@section('content')
<br>
<br>
        {{-- <div class=" p-2 col-12  border-bottom ">
            <div class="row col-12 m-0">
                <h5 class="font-weight-bold">{{$addon->customer_name}}  {{$addon->customer_phone}}</h5>
                <h5 class="font-weight-bold ml-1" style="color:rgba(0, 84, 118, 1);">ค่าเริ่มต้น</h5>
            </div>
            <div class="row col-12 p-0 m-0">
                <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
                <div class="text-start col-10">
                    <h5 class="m-0 ">รายละเอียดที่อยู่ <br><br> {{$addon->customer_address}} {{$ont->name_th}} {{$ona->name_th}} {{$onp->name_th}} {{$addon->customer_postcode}} </h5>
                </div>

                <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.4rem; height:1.4rem;" class="col-1 p-0 align-self-center"><br>



            </div>
        </div> --}}
        <?php $sh= DB::Table('tb_shipping_companys')->where('id_shipping_company',$cart->shipping_id)->first();?>
        <a href="{{url('checkoutaddress')}}">
            <div class=" p-2 col-12  border-bottom ">
                <div class="row">

                    <div class=" col-6 m-0 text-left">
                        <h5 class="font-weight-bold">{{$sh->name_company}}</h5>
                    </div>
                    <div class=" col-6 m-0 text-right">
                        <h5 class="font-weight-bold " style="color:rgba(255, 92, 99, 1);">฿ {{number_format($cart->shipping_3per,2,'.',',')}}</h5> 
                    </div>

                </div>
                
                <div class="row col-12 p-0 m-0">
                    <div class="text-start col-10">
                        <h5 class="m-0 ">จะได้รับ  {{$cart->shipping_day}}</h5>
                    </div>

                    <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.1rem; height:1.1rem;" class="col-1 p-0 align-self-center ml-3"><br>


                </div>
            </div>
        </a>
        @foreach($ship as $ships)
            <form action="{{url('user/changevalueshippingoncart')}}" method="POST" id="formship{{$ships->id_product_shipping}}"> 
                @csrf
                <input type="hidden" name="sid" value="{{$sid}}">
                <input type="hidden" name="ship" value="{{$ships->id_shipping_company}}">
                <input type="hidden" name="day" value="{{$ships->shipping_day}}">
                <input type="hidden" name="cost3_per" value="{{$ships->cost_3per}}">
                <input type="hidden" name="cost" value="{{$ships->cost}}">
                
            </form>
            <a href="javascript:;" onclick="selectship({{$ships->id_product_shipping}});">
                <div class=" p-2 col-12  border-bottom ">
                    <div class="row">

                        <div class=" col-6 m-0 text-left">
                            <h5 class="font-weight-bold">{{$ships->name_company}}</h5>
                        </div>
                        <div class=" col-6 m-0 text-right">
                            <h5 class="font-weight-bold " style="color:rgba(255, 92, 99, 1);">฿ {{number_format($ships->cost_3per,2,'.',',')}}</h5> 
                        </div>

                    </div>
                    
                    <div class="row col-12 p-0 m-0">
                        <div class="text-start col-10">
                            <h5 class="m-0 ">จะได้รับ  {{$ships->shipping_day}}</h5>
                        </div>
                    
                    @if($ships->id_shipping_company == $cart->shipping_id)
                        <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.1rem; height:1.1rem;" class="col-1 p-0 align-self-center ml-3"><br>

                    @endif

                    </div>
                </div>
            </a>
        @endforeach




@endsection

@section('custom_script')
<script>
    bottom_now(1);

    function selectship(v){
        $('#formship'+v).submit();
    }
</script>
@endsection