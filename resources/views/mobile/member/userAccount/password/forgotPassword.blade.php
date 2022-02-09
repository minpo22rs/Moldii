@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ลืมรหัสผ่าน
    </div>
</div>
@endsection
@section('content')

<div class="mt-1  col-12">

    <h6 class="my-3 pl-1"><small style="color:rgba(181, 181, 181, 1);">กรุณาเลือกช่องทางในการรับรหัสยืนยันสำหรับเปลี่ยนรหัสผ่าน</small> </h6>

    <a href="{{url('user/phoneNumber')}}" class="row py-1 border-top border-bottom pl-2" style="color:black; font-size:18px">
        <div class="col-6 mx-0 align-self-center row">

            <h5 class="m-0 ml-1 font-weight-bold">เบอร์ติดต่อ</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                <h5 class="m-0 mr-2 font-weight-bold">********39</h5>


            </div>
        </div>
    </a>
    <a href="" class="row py-1 border-top border-bottom  mt-2 pl-2" style="color:black; font-size:18px">
        <div class="col-6 mx-0 align-self-center row">

            <h5 class="m-0 ml-1 font-weight-bold">E-mail</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                <h5 class="m-0 mr-2 font-weight-bold">*********@gmail.com</h5>


            </div>
        </div>
    </a>

</div>







@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection