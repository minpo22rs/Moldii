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
<div class="mt-3 p-2 col-12">
<br>
    <form action="{{url('checkotpchangephone')}}" method="POST">
        @csrf
        <div class="row justify-content-between col-12 m-0 p-0">
            <h6 class="my-1" style="color:rgba(181, 181, 181, 1);">กรุณากรอกหมายเลข OTP</h6>
            {{-- <a href="">
                <h6 class="my-1"><small style="color:rgba(80, 202, 101, 1);">ส่ง OTP อีกครั้ง</small> </h6>
            </a> --}}

        </div>

        <input type="text" class="form-control form-control-lg  my-3 mt-1 input" style="border-radius: 10px; " name="otp" id="otp" value="" minlength="4" maxlength="4" placeholder="OTP" required>

        <input type="hidden" name="phone" value="{{$number}}">
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;">ยืนยัน</button>

            </div>
            <div class="col-6">
                <a href="{{url('user/profilePage')}}" type="button" class="btn btn-danger mt-3 col-12" style="font-size:1.3rem;">ยกเลิก</a>

            </div>
        </div>
    </form>
</div>



@endsection

@section('custom_script')

<script>
       bottom_now(7);

    var a = "{{Session::get('success')}}";
    if (a) {
        Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
    }


</script>

@endsection