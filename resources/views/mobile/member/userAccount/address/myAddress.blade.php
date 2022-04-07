@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ที่อยู่ของฉัน
    </div>
</div>
@endsection
@section('content')
<div class=" p-2 col-12  border-bottom ">
    <div class="row col-12 m-0">
        <h5 class="font-weight-bold">ชื่อ-นามสกุล</h5>
        <h5 class="font-weight-bold ml-1" style="color:rgba(255, 92, 99, 1);">ค่าเริ่มต้น</h5>
    </div>
    <div class="row col-12 p-0 m-0">
        <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
        <div class="text-start col-10">
            <h5 class="m-0 ">รายละเอียดที่อยู่ Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum fugit ad dignissimos ipsam harum aut ea sunt aspernatur consequatur id tempore aliquam blanditiis enim, doloribus a porro libero, architecto, officia assumenda reiciendis! Tempore praesentium enim illo aut, repellendus rem quaerat? </h5>
        </div>

        <img src="{{asset('new_assets/img/icon/check.svg')}}" style="width:1.4rem; height:1.4rem;" class="col-1 p-0 align-self-center"><br>


    </div>
</div>
<div class=" p-2 col-12  border-bottom ">
    <div class="row col-12 m-0">
        <h5 class="font-weight-bold">ชื่อ-นามสกุล</h5>
        <h5 class="font-weight-bold ml-1" style="color:rgb(97, 92, 255);">ตั้งเป็นค่าเริ่มต้น</h5> 
    </div>
    <div class="row col-12 p-0 m-0">
        <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
        <div class="text-start col-10">
            <h5 class="m-0 ">รายละเอียดที่อยู่ Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum fugit ad dignissimos ipsam harum aut ea sunt aspernatur consequatur id tempore aliquam blanditiis enim, doloribus a porro libero, architecto, officia assumenda reiciendis! Tempore praesentium enim illo aut, repellendus rem quaerat? </h5>
        </div>

        <!-- <img src="{{asset('new_assets/img/icon/check.svg')}}" style="width:1.4rem; height:1.4rem;" class="col-1 p-0 align-self-center"><br> -->


    </div>
</div>
<div class=" p-2 col-12  border-bottom ">
    <div class="row col-12 m-0">
        <h5 class="font-weight-bold">ชื่อ-นามสกุล</h5>
        <!-- <h5 class="font-weight-bold ml-1" style="color:rgba(255, 92, 99, 1);">ค่าเริ่มต้น</h5> -->
    </div>
    <div class="row col-12 p-0 m-0">
        <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
        <div class="text-start col-10">
            <h5 class="m-0 ">รายละเอียดที่อยู่ Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum fugit ad dignissimos ipsam harum aut ea sunt aspernatur consequatur id tempore aliquam blanditiis enim, doloribus a porro libero, architecto, officia assumenda reiciendis! Tempore praesentium enim illo aut, repellendus rem quaerat? </h5>
        </div>

        <!-- <img src="{{asset('new_assets/img/icon/check.svg')}}" style="width:1.4rem; height:1.4rem;" class="col-1 p-0 align-self-center"><br> -->


    </div>
</div>


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
</script>
@endsection