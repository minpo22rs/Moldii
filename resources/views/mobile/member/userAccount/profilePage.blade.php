@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        หน้าโปรไฟล์
    </div>
</div>
@endsection
@section('content')
<div>
    <div class="col-12 text-center">
        <img src="{{asset('original_assets/img/material_icons/woman.png')}}" class="rounded-circle mt-5" width="25%" height="auto"><br>
        <span class="font-weight-bold">
            <h3 class="mb-0"><?php //$my_name 
                                ?></h3>
        </span>
    </div>
</div>


<a href="" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row">
        <i class="far fa-list-alt"></i>
        <h5 class="m-0 ml-2 font-weight-bold">รายการของฉัน</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<div class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row">
        <i class="fas fa-heart "></i>
        <h5 class="m-0 ml-2 font-weight-bold">สิ่งที่ถูกใจ</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</div>

<div class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row">
        <i class="fal fa-credit-card"></i>
        <h5 class="m-0 ml-2 font-weight-bold">รายการบัญชีธนาคาร/บัตรที่บันทึก</้>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</div>



<a href="{{url('user/profile/setting')}}" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row ">
        <i class="far fa-cog"></i>
        <h5 class="m-0 ml-2 font-weight-bold">การตั้งค่า</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<!-- <div class="row py-1  border-top border-bottom text-danger">
    <div class="col-12 mx-0">
        <div class="mx-2 my-2 ml-2" onclick="window.location.replace('../logout.php');">ออกจากระบบ</div>
    </div>
</div> -->
@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection