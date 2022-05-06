@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        รายการบัญชีธนาคาร/บัตรที่บันทึก
    </div>
</div>
@endsection
@section('content')

<div class=" p-2 col-12 m-0" style="color:black; font-size:18px">
    <div class="col-12 mx-0 align-self-center row p-0">
        <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">บัตรของคุณ</h4>
    </div>
    <div class="a-shadow">
        <div class="row col-12 p-1 pl-2 my-4 mx-0  brd-10" style="height:2.8125rem;">
            <img src="{{asset('new_assets/img/icon/logo_visa.svg')}}" style="width:1.875rem; height:0.625rem;" class="col-1 p-0 align-self-center">
            <div class="text-start col-10 align-self-center">
                <h5 class="m-0 font-weight-bold">1234</h5>
            </div>

            <img src="{{asset('new_assets/img/icon/check.svg')}}" style="width:1.4rem; height:1.4rem;" class="col-1 p-0 align-self-center"><br>


        </div>
    </div>


    <div class="a-shadow">
        <div class="row col-12 p-1 pl-2 my-4 mx-0  brd-10" style="height:2.8125rem;">
            <img src="{{asset('new_assets/img/icon/logo_visa.svg')}}" style="width:1.875rem; height:0.625rem;" class="col-1 p-0 align-self-center">
            <div class="text-start col-10 align-self-center">
                <h5 class="m-0 font-weight-bold">1234</h5>
            </div>

            <!-- <img src="{{asset('new_assets/img/icon/check.svg')}}" style="width:1.4rem; height:1.4rem;" class="col-1 p-0 align-self-center"><br> -->


        </div>
    </div>


</div>
<div class=" p-2 col-12 m-0  border-top border-bottom   " style="color:black; font-size:18px">
    <div class="col-12 mx-0 align-self-center row p-0">
        <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">เพิ่มบัตรใหม่</h4>
    </div>
    <div class="a-shadow">
        <a href="{{url('user/addCreditCard')}}" class="row  col-12 pl-2 p-1 my-4 mx-0  brd-10" style="height:2.8125rem;">
            <div class="text-start col-11  mr-1 row  align-self-center">
                <h5 class="m-0 font-weight-bold">บัตรเครดิต/บัครเดบิต</h5>
                <img src="{{asset('new_assets/img/icon/logo_visa.svg')}}" style="width:1.875rem; height:0.625rem;" class=" p-0 mx-2 align-self-center">
                <img src="{{asset('new_assets/img/icon/logo_mastercard.svg')}}" style="width:1.25rem; height:0.75rem;" class=" p-0 mx-1 align-self-center">

            </div>

            <img src="{{asset('new_assets/img/icon/plus.svg')}}" style="width:1.48rem; height:1.48rem;" class="col-1 p-0 align-self-center"><br>



        </a>
    </div>



</div>


@endsection

@section('custom_script')
<script>
    bottom_now(3);

    var msg = "{{Session::get('msg')}}"; 
    if(msg){
        alert(msg);
    }
</script>
@endsection