@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ตั้งค่าบัญชี
    </div>
</div>
@endsection
@section('content')


<div class="row py-1  pl-1" style="color:black; font-size:18px">
    <div class="col-8 mx-0 mt-2 align-self-center row p-0">
        <h4 class="mb-1 ml-2 font-weight-bold " style="color:rgba(131, 131, 131, 0.5);">บัญชีของฉัน</h4>
    </div>
</div>


<a href="{{url('user/profilePage')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-2 font-weight-bold">หน้าโปรไฟล์</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<a href="{{url('user/myAddress')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-2 font-weight-bold">ที่อยู่ของฉัน</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<a href="{{url('user/creditCard')}}" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row  p-0">


        <h5 class="m-0 ml-2 font-weight-bold">รายการบัญชีธนาคาร/บัตรที่บันทึก</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<div class="row py-1  pl-1" style="color:black; font-size:18px">
    <div class="col-8 mx-0 mt-2 align-self-center row p-0">
        <h4 class="mb-1 ml-2 font-weight-bold " style="color:rgba(131, 131, 131, 0.5);">ตั้งค่า</h4>
    </div>
</div>
<a href="{{url('user/settingNotification')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-2 font-weight-bold">ตั้งค่าการแจ้งเตือน</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>
<a href="{{url('user/privacySettings')}}" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row  p-0">


        <h5 class="m-0 ml-2 font-weight-bold">การตั้งค่าความเป็นส่วนตัว</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<div class="row py-1  pl-1" style="color:black; font-size:18px">
    <div class="col-8 mx-0 mt-2 align-self-center row p-0">
        <h4 class="mb-1 ml-2 font-weight-bold " style="color:rgba(131, 131, 131, 0.5);">ช่วยเหลือ</h4>
    </div>
</div>
<a href="{{url('user/profileHelpCenter')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-2 font-weight-bold">ศูนย์ช่วยเหลือ</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>
<a href="" class="row py-1  border-top pl-2 " style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row  p-0">


        <h5 class="m-0 ml-2 font-weight-bold">เคล็ดลับและเทคนิค</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>
<a href="" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-2 font-weight-bold">กฏระเบียบในการใช้</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>
<a href="" class="row py-1  border-top pl-2 " style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row  p-0">


        <h5 class="m-0 ml-2 font-weight-bold">นโยบายของ MOLDII</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>
<a href="" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">

        <h5 class="m-0 ml-2 font-weight-bold">ให้คะแนนชื่อแอป</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>
<a href="" class="row py-1  border-top pl-2 " style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row  p-0">


        <h5 class="m-0 ml-2 font-weight-bold">เกี่ยวกับ</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>
<a href="" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row  p-0">


        <h5 class="m-0 ml-2 font-weight-bold">คำขอลบบัญชีผู้ใช้</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>


{{-- 
<div class="row col-12 m-0 mt-4 p-0 justify-content-center">
    <button type="button" id="off_share_btn" class="btn  btn-block font-weight-bold col-11 mt-2 " style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">
    <img class="mr-1" src="{{ asset('new_assets/img/icon/logout.svg')}}" >
    ออกจากระบบ
</button>
    

</div> --}}




@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection