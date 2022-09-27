@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        การตั้งค่า
    </div>
</div>
@endsection
@section('content')
<br>
<div class="mt-3 p-2 col-12">

    <form action="{{url('user/birthdaySave')}}" method="POST">
        @csrf
        <h3 class="ml-1">เปลี่ยนวันเกิด</h3>
        <input type="date" class="form-control form-control-lg mt-2 mb-1" style="border-radius: 10px;" name="bd" id="birthdayChange" required>
   
        <button type="submit" class="btn btn-success col-12 mt-4" style="font-size:1.3rem;">บันทึก</button>
    </form>
</div>



@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection