@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        บัญชีธนาคาร
    </div>
</div>
@endsection
@section('content')
<div class="container m-0 p-0">
    <div class="col-12 p-3 ">
        <h5 class="m-0  font-weight-bold " style="">โปรดเลือกธนาคารที่คุณใช้</h5>
        <h6 class="m-0  font-weight-bold " style="color:rgba(103, 103, 103, 1);"> เราจะเชื่อมต่อไปยังหน้าแอปฯ ธนาคารของคุณ เพื่อยืนยันการเติมเงิน</h6>

    </div>

    <a href="{{url('user/specifyNumber')}}" class="row py-2  pl-2 border-top border-bottom" style="color:black; font-size:18px">
        <div class="col-6 mx-0 pl-0 align-self-center row">
            <img class="mx-2" style="width:2.5rem;" src="{{ asset('new_assets/img/icon/logo_bank/logo_K_PLUS-sm.svg')}}" alt="alt">

            <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">Bank Account</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">


                <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
            </div>
        </div>
    </a>
    
    <a href="{{url('user/specifyNumber')}}" class="row py-2  pl-2 border-bottom" style="color:black; font-size:18px">
        <div class="col-6 mx-0 pl-0 align-self-center row">
            <img class="mx-2" style="width:2.5rem;" src="{{ asset('new_assets/img/icon/logo_bank/logo_SCB.svg')}}" alt="alt">

            <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">Bank Account</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">


                <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
            </div>
        </div>
    </a>
    <a href="{{url('user/specifyNumber')}}" class="row py-2  pl-2 border-bottom" style="color:black; font-size:18px">
        <div class="col-6 mx-0 pl-0 align-self-center row">
            <img class="mx-2" style="width:2.5rem;" src="{{ asset('new_assets/img/icon/logo_bank/logo_KMA.svg')}}" alt="alt">

            <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">Bank Account</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">


                <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
            </div>
        </div>
    </a>


</div>
@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection