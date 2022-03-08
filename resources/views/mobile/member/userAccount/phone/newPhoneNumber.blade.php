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

        <input type="number" class="form-control form-control-lg mt-1 mb-1 input" style="border-radius: 10px; " name="newPhone" id="phone" placeholder="หมายเลขโทรศัพท์" data-operand-current>

        <h6 class="text-center my-3"><small style="color:rgba(181, 181, 181, 1);">หากคุณแก้ไขหมายเลขโทรศัพท์ที่นี่ หมายเลขโทรศัพท์ของบัญชีทั้งหมดที่ผูกกับบัญชีผู้ใช้นี้จะถูกแก้ไขตามไปด้วย</small> </h6>



        <button type="submit" class="btn btn-success col-12" style="font-size:1.3rem;">ดำเนินการต่อ</button>
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