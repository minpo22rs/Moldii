@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ศูนย์ความช่วยเหลือ
    </div>
</div>
@endsection
@section('content')
<div>
    <div class="col-12 m-0 p-0">
        <div class="col-12 mt-2 row text-center align-self-center p-0 m-0">
            <img src="{{asset('new_assets/img/icon/logo_Facebook.svg')}}" class=" align-self-center col-6 " width="133px" height="133px"><br>
            <img src="{{asset('new_assets/img/icon/logo_Line.svg')}}" class=" align-self-center  col-6" width="92px" height="92px"><br>
        </div>
        <div class="col-12 row text-center align-self-center p-0 m-0">
            <h4 class="fw-normal col-6 mb-0">Facebook</h4>
            <h4 class="fw-normal col-6 mb-0">Line</h4>
        </div>
        <div class="col-12 row text-center align-self-center p-0 m-0">
            <h4 class="fw-normal col-6 mb-0">ชื่อ Facebook</h4>
            <h4 class="fw-normal col-6 mb-0">ID Line</h4>
        </div>
    </div>
</div>

<div class="row my-3 mt-4  pl-2">
    <div class="col-3 ">
        <h4 class="font-weight-bold">เบอร์ติดต่อ </h4>
        <h4 class="font-weight-bold">อีเมล </h4>
    </div>
    <div class=" p-0 ">
        <h4 class="font-weight-bold">: </h4>
        <h4 class="font-weight-bold">: </h4>
    </div>
    <div class=" p-0 ">
        <h4 class="pl-1 font-weight-bold">XXX-XXX-XXXX </h4>
        <h4 class="pl-1 font-weight-bold">moldiiapp@gmail.com </h4>
    </div>

</div>







<a href="" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">
        <div class="row col-1 m-0 p-0 justify-content-center">
            <i class="fal fa-question-circle"></i>

        </div>
        <h5 class="m-0 ml-2 font-weight-bold">คำถามที่พบบ่อย</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

{{-- <a href="" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row p-0">
        <div class="row col-1 m-0 p-0 justify-content-center">
            <i class="fas fa-star"></i>

        </div>
        <h5 class="m-0 ml-2 font-weight-bold">ให้คะแนนแอพ</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a> --}}

<a href="" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row  p-0">
        <div class="row col-1 m-0 p-0 justify-content-center">
            <i class="far fa-ballot"></i>
        </div>

        <h5 class="m-0 ml-2 font-weight-bold">ข้อตกลงและเงื่อนไข</h5>
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