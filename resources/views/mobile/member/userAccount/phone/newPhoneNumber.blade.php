@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        เบอร์โทรศัพท์ใหม่
    </div>
</div>
@endsection
@section('content')
<div class="mt-3 p-2 col-12">

    <form action="{{url('user/OTP_PhoneNumber')}}">
    @csrf
        <h6 class="my-1"><small style="color:rgba(181, 181, 181, 1);">กรุณาใส่หมายเลขโทรศัพท์เพื่อรับ OTP</small> </h6>

        <input type="text" class="form-control form-control-lg mt-1 mb-1 input" style="border-radius: 10px; " name="newPhone" id="newPhone" value="" placeholder="หมายเลขโทรศัพท์">

        <h6 class="text-center my-3"><small style="color:rgba(181, 181, 181, 1);">หากคุณแก้ไขหมายเลขโทรศัพท์ที่นี่ หมายเลขโทรศัพท์ของบัญชีทั้งหมดที่ผูกกับบัญชีผู้ใช้นี้จะถูกแก้ไขตามไปด้วย</small> </h6>


        <button type="submit" class="btn btn-success col-12" style="font-size:1.3rem;">ดำเนินการต่อ</button>
    </form>
</div>



@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection