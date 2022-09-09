@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        การตั้งค่าความเป็นส่วนตัว
    </div>
</div>
@endsection
@section('content')
<a href="{{url('user/appAccess')}}" class="row  px-2 mt-3 border-top border-bottom " style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-2 font-weight-bold">การเข้าถึงของแอป</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right align-self-center" style="font-size:1.5625rem;"></i></div>
    </div>
</a>
<div class="col-12 mx-0 mt-3 py-2 px-3 border-top border-bottom align-self-center justify-content-between row ">
    <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">กิจกรรมส่วนตัว</h5>

    <div class="custom-control custom-switch  ">
        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
        <label class="custom-control-label" for="customSwitch1"></label>
    </div>
    
</div>
<h6 class="my-1 ml-2"><small style="color:rgba(181, 181, 181, 1);">*ซ่อนการถูกใจและการรีวิวสินค้า</small> </h6>





@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection