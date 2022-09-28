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
<br>

<div class="bg_image" style="background-image: url('https://testgit.sapapps.work/moldii/storage/app/banner/{{$banner->banner_name}}');">
    <div class="col-12 text-center">

        @if($sql->provider ==null && $sql->customer_img == null)
            <img src="{{asset('original_assets/img/material_icons/woman.png')}}" class="rounded-circle mt-5" width="130px" height="130px"><br>
        @elseif($sql->provider ==null)
            <img src="{{asset('storage/profile_cover/'.$sql->customer_img.'')}}" class="rounded-circle mt-5" width="130px" height="130px"><br>
        @else
            <img src="{{$sql->customer_img}}" class="rounded-circle mt-5" width="130px" height="130px"><br>
        @endif



        <a href="{{'imgProfileChange'}}"><h5 class="m-0 text-center" style="color:white;">แตะเพื่อแก้ไข</h5></a>

    </div>
    
    {{-- <div  class="btn  btn-sm btn-block square mt-2" style="height:1.4rem; background-color:rgba(196, 196, 196, 0.4); color:white;"  >แตะเพื่อเปลี่ยน</div> --}}

</div>


<a href="{{url('user/nameChange')}}" class="row py-1 border-top mt-3 pl-2" style="color:black; font-size:18px">
    <div class="col-6 mx-0 align-self-center row">

        <h5 class="m-0 ml-1 font-weight-bold">ชื่อผู้ใช้</h5>
    </div>
    <div class="col-6 mx-0 text-right">

        <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
            <h5 class="m-0 mr-2 font-weight-bold ">{{$sql->customer_username}}</h5>

            <i class="far fa-angle-right"></i>
        </div>
    </div>
</a>
{{-- <a href="" class="row py-1 border-top border-bottom pl-2" style="color:black; font-size:18px">
    <div class="col-6 mx-0 align-self-center row">

        <h5 class="m-0 ml-1 font-weight-bold">Bio</h5>
    </div>
    <div class="col-6 mx-0 text-right">

        <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
            <h6 class="m-0 mr-2 font-weight-bold align-self-center"><small>ตั้งค่าตอนนี้</small></h6>

            <i class="far fa-angle-right"></i>
        </div>
    </div>
</a> --}}
<a href="{{url('user/sexChange')}}" class="row py-1 border-top pl-2 mt-3" style="color:black; font-size:18px">
    <div class="col-6 mx-0 align-self-center row">

        <h5 class="m-0 ml-1 font-weight-bold">เพศ</h5>
    </div>
    <div class="col-6 mx-0 text-right">

        <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
            <h5 class="m-0 mr-2 font-weight-bold">{{$sql->customer_gender}}</h5>

            <i class="far fa-angle-right"></i>
        </div>
    </div>
</a>
<a href="{{url('user/birthdayChange')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-6 mx-0 align-self-center row">

        <h5 class="m-0 ml-1 font-weight-bold">วันเกิด</h5>
    </div>
    <div class="col-6 mx-0 text-right">

        <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
            <h5 class="m-0 mr-2 font-weight-bold">{{$sql->customer_birthday}}</h5>

            <i class="far fa-angle-right"></i>
        </div>
    </div>
</a>
<a href="{{url('user/phoneNumber')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-6 mx-0 align-self-center row">

        <h5 class="m-0 ml-1 font-weight-bold">เบอร์ติดต่อ</h5>
    </div>
    <div class="col-6 mx-0 text-right">

        <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
            <h5 class="m-0 mr-2 font-weight-bold">********{{substr($sql->customer_phone,-2)}}</h5>

            <i class="far fa-angle-right"></i>
        </div>
    </div>
</a>
@if($sql->provider_id ==null)
    <a href="{{url('user/changeEmail')}}" class="row py-1 border-top border-bottom pl-2" style="color:black; font-size:18px">
        <div class="col-6 mx-0 align-self-center row">

            <h5 class="m-0 ml-1 font-weight-bold">E-mail</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                <h5 class="m-0 mr-2 font-weight-bold">{{substr($sql->customer_email,0,5)}}******</h5>

                <i class="far fa-angle-right"></i>
            </div>
        </div>
    </a>
@endif
<a href="{{url('user/changePassword')}}" class="row py-1 border-top border-bottom  mt-4 pl-2" style="color:black; font-size:18px">
    <div class="col-6 mx-0 align-self-center row">

        <h5 class="m-0 ml-1 font-weight-bold">เปลี่ยนรหัสผ่าน</h5>
    </div>
    <div class="col-6 mx-0 text-right">

        <div class="mx-2 my-1 ml-2 mr-2 ">


            <i class="far fa-angle-right"></i>
        </div>
    </div>
</a>
<a href="{{url('logout')}}" class="row py-1 border-top border-bottom  mt-4 pl-2" style="color:black; font-size:18px">
    <div class="col-6 mx-0 align-self-center row">

        <h5 class="m-0 ml-1 font-weight-bold">ลงชื่อออก</h5>
    </div>
    <div class="col-6 mx-0 text-right">

        <div class="mx-2 my-1 ml-2 mr-2 ">


            <i class="far fa-angle-right"></i>
        </div>
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
    bottom_now(7);


    var a = "{{Session::get('success')}}";
      if(a){
        
        Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
      }


      
</script>
@endsection