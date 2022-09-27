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
<br>
<div class="mt-3 p-2 col-12">

    <form action="{{url('user/nameSave')}}" method="POST">
        @csrf
        <h3 class="ml-1">ชื่อผู้ใช้</h3>
        <input type="text" class="form-control form-control-lg mt-2 mb-1" style="border-radius: 10px;" name="nname" maxlength="20" value="{{$sql->customer_username}}" placeholder="xxxxx" required>
        <h6 class="ml-1"><small>ห้ามเกิน 20 ตัวอักษร</small></h6>
        
        <h3 class="ml-1">ชื่อ</h3>
        <input type="text" class="form-control form-control-lg mt-2 mb-1" style="border-radius: 10px;" name="fname" value="{{$sql->customer_name}}" placeholder="xxxxx" required>

        <h3 class="ml-1">นามสกุล</h3>
        <input type="text" class="form-control form-control-lg mt-2 mb-1" style="border-radius: 10px;" name="lname" value="{{$sql->customer_lname}}" placeholder="xxxxx" required> 

        <button type="submit" class="btn btn-success col-12" style="font-size:1.3rem;">บันทึก</button>
    </form>
</div>



@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection