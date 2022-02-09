@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        เปลี่ยนชื่อผู้ใช้
    </div>
</div>
@endsection
@section('content')
<div class="mt-3 p-2 col-12">

    <form action="">
        <h3 class="ml-1">ชื่อใหม่</h3>
        <input type="text" class="form-control form-control-lg mt-2 mb-1" style="border-radius: 10px;" name="nameChange" id="nameChange" value="" placeholder="•••• •••• •••• ••••">
        <h6 class="ml-1"><small>ห้ามเกิน 100 ตัวอักษร</small></h6>
        <button type="submit" class="btn btn-success col-12" style="font-size:1.3rem;">บันทึก</button>
    </form>
</div>



@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection