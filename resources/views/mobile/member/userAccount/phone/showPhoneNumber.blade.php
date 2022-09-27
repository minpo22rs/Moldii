@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        โทรศัพท์
    </div>
</div>
@endsection
@section('content')
<br>
<div class="mt-3  col-12">
    <div  class="row py-1 border-top border-bottom pl-1" style="color:black; font-size:18px">
        <div class="col-6 mx-0 p-0 align-self-center row">

            <h5 class="m-0 ml-1 align-self-center font-weight-bold">เบอร์ติดต่อ</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <a href="{{url('user/newPhoneNumber')}}" class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                <h5 class="m-0  align-self-center font-weight-bold">********{{substr($sql->customer_phone,-2)}}</h5>
                <div class="col-2 p-0">
                    <h6 class="mt-1 pl-1" style="color:rgba(80, 202, 101, 1);">แก้ไข</h6>
                </div>

            </a>
        </div>
    </div>
    <h6 class="text-center my-3" style="color:rgba(181, 181, 181, 1);">หากคุณแก้ไขหมายเลขโทรศัพท์ที่นี่ หมายเลขโทรศัพท์ของบัญชีทั้งหมดที่ผูกกับบัญชีผู้ใช้นี้<br>จะถูกแก้ไขตามไปด้วย</h6>


</div>



@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection