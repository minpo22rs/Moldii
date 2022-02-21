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

    <form action="">
        @csrf
        <div class="row justify-content-between col-12 m-0 p-0">
            <h6 class="my-1"><small style="color:rgba(181, 181, 181, 1);">กรุณาใส่หมายเลข OTP</small> </h6>
            <a href="">
                <h6 class="my-1"><small style="color:rgba(80, 202, 101, 1);">ส่ง OTP อีกครั้ง</small> </h6>
            </a>

        </div>

        <input type="text" class="form-control form-control-lg  my-3 mt-1 input" style="border-radius: 10px; " name="otp" id="otp" value="" placeholder="OTP">



        <button type="submit" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;">ยืนยัน</button>
    </form>
</div>



@endsection

@section('numpad')
<div class="" id="numpad_container">

    <div class="numpad-box " id="numpad_box">
        <div class="wrapper">


            <section class="calc-btn_row">

                <div class="calc_btn_row">
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '1';">1</button>
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '2';">2</button>
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '3';">3</button>


                </div>
                <div class="calc_btn_row">
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '4';">4</button>
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '5';">5</button>
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '6';">6</button>

                </div>
                <div class="calc_btn_row">
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '7';">7</button>
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '8';">8</button>
                    <button class="calc_btn" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '9';">9</button>

                </div>
                <div class="calc_btn_row justify-content-end">

                    <button class="calc_btn_2 none-bg" onclick=""></button>
                    <button class="calc_btn " onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value + '0';">0</button>
                    <button class="calc_btn_2 none-bg" onclick="document.getElementById('newPassword').value=document.getElementById('newPassword').value.slice(0, -1);"><i class="far fa-backspace"></i></button>

                </div>



            </section>
        </div>
    </div>


</div>
<script>
    //_______________[Buy_goods]__________________//
    const showNum = document.getElementById("newPassword");
    const boxNum = document.getElementById("numpad_box");
    const conNum = document.getElementById("numpad_container");

    showNum.addEventListener("click", () => {
        boxNum.classList.add("numpad-show");

    });






    //_______________[Buy_goods]__________________//
</script>

@endsection