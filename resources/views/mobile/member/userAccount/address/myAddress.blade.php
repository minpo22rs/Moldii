@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.location.replace('profile/setting')"></ion-icon>
    </div>
    <div class="pageTitle">
        ที่อยู่ของฉัน
    </div>
</div>
@endsection
@section('content')
        
        @if($addon != null)
            <?php 
                $onp = DB::Table('provinces')->where('id',$addon->customer_province)->first();
                $ona = DB::Table('amphures')->where('id',$addon->customer_district)->first();
                $ont = DB::Table('districts')->where('id',$addon->customer_tumbon)->first();
            
            ?>
            <div class=" p-2 col-12  border-bottom ">
                <div class="row col-12 m-0">
                    <h5 class="font-weight-bold">{{$addon->customer_name}}  {{$addon->customer_phone}}</h5>
                    <h5 class="font-weight-bold ml-1" style="color:rgba(255, 92, 99, 1);">ค่าเริ่มต้น</h5>
                </div>
                <div class="row col-12 p-0 m-0">
                    <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
                    <div class="text-start col-10">
                    <h5 class="m-0 ">รายละเอียดที่อยู่ <br><br> {{$addon->customer_address}} {{$ont->name_th}} {{$ona->name_th}} {{$onp->name_th}} {{$addon->customer_postcode}} </h5>
                </div>

                    <img src="{{asset('new_assets/img/icon/check.svg')}}" style="width:1.4rem; height:1.4rem;" class="col-1 p-0 align-self-center"><br>


                </div>
            </div>
        @endif

        @foreach($addoff as $adds)
            <?php 
                $p = DB::Table('provinces')->where('id',$adds->customer_province)->first();
                $a = DB::Table('amphures')->where('id',$adds->customer_district)->first();
                $t = DB::Table('districts')->where('id',$adds->customer_tumbon)->first();
            
            ?>
            <div class=" p-2 col-12  border-bottom ">
                <div class="row col-12 m-0">
                    <h5 class="font-weight-bold">{{$adds->customer_name}}  {{$adds->customer_phone}}</h5>
                    <a href="{{url('user/changevalueaddress/'.$adds->id_customer_address.'')}}"><h5 class="font-weight-bold ml-1" style="color:rgb(97, 92, 255);">ตั้งเป็นค่าเริ่มต้น</h5> </a>
                </div>
                <div class="row col-12 p-0 m-0">
                    <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
                    <div class="text-start col-10">
                        <h5 class="m-0 ">รายละเอียดที่อยู่ <br><br> {{$adds->customer_address}} {{$t->name_th}} {{$a->name_th}} {{$p->name_th}} {{$adds->customer_postcode}}</h5>
                    </div>
                    <i class="fa fa-trash" style="margin-top: 5px" onclick="da({{$adds->id_customer_address}});"></i> 



                </div>
            </div>
       
        @endforeach


<a href="{{url('user/newAddress')}}" class="row p-2 col-12 m-0 mt-2 border-top border-bottom " style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-1 font-weight-bold" style="color:rgba(84, 84, 84, 1);">เพิ่มที่อยู่ใหม่</h5>
    </div>
    <div class="col-4 mx-0 p-0 text-right">
        <div class=" ">
            <img src="{{asset('new_assets/img/icon/plus.svg')}}" style="width:1.48rem; height:1.48rem;" class="align-self-center"><br>
        </div>
    </div>
</a>





@endsection

@section('custom_script')
<script>
    bottom_now(7);

    var msg = "{{Session::get('msg')}}"; 
    if(msg){
        alert(msg);
    }



    function da(v){
        // alert('ยืนยันการลบบัตรเครดิตนี้ใช่หรือไม่');
        if (confirm("ยืนยันการลบที่อยู่นี้ใช่หรือไม่") == true) {
            window.location.replace ('deleteAddress/'+v)
        } else {
            
        }
    }


</script>
@endsection