@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        E-mail ใหม่
    </div>
</div>
@endsection
@section('content')
<div class="mt-1 p-2 col-12">

    <form action="">

        <h6 class="my-1"><small style="color:rgba(181, 181, 181, 1);">กรุณาใส่ E-mail เพื่อรับจดหมายยืนยันตัวตน</small> </h6>


        <input type="text" class="form-control form-control-lg  my-3 mb-1 input" style="border-radius: 10px; " name="otp" id="otp" value="" placeholder="E-mail">
       



        <button type="submit" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;">ดำเนินการต่อ</button>



    </form>
</div>



@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection