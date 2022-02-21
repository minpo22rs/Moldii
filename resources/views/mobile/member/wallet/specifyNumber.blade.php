@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ระบุจำนวน
    </div>
</div>
@endsection
@section('content')
<div class="container m-0 p-0">
    <div id="show_check_confirm" class="row py-2  pl-2  border-bottom" style="color:black; font-size:18px">
        <div class="col-6 mx-0 pl-0 align-self-center row">
            <img class="mx-2" style="width:2.5rem;" src="{{ asset('new_assets/img/icon/logo_bank/logo_K_PLUS-sm.svg')}}" alt="alt">

            <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">Bank Account</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">


                <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
            </div>
        </div>
    </div>






</div>
<div class="container p-0 m-0" id="numpad_container">
    <form action="" method="post" class="p-2 mt-3 align-self-center text-center">
        <div class="row justify-content-center col-12 p-0 m-0">
            <label for="number">
                <h2 class="m-0  font-weight-bold align-self-start mt-2" style="color:rgba(115, 115, 115, 1);">฿</h2>

            </label>
            <input type="number" style="" class="col-6 input-xl p-0 text-center " name="number" id="input_Top_Up" value="" placeholder="0">
        </div>

        <div class="row justify-content-center">
            <h3 class="m-0" style="color:rgba(115, 115, 115, 1);">ยอดปัจจุบัน:</h3>
            <h3 class="m-0" style="color:rgba(115, 115, 115, 1);">฿0</h3>
        </div>
        <button type="submit" id="btn_Top_Up" class="btn  mt-3 col-12" style="font-size:1.3rem; background: #E4E4E4; color:rgba(255, 255, 255, 1);">ถัดไป</button>

    </form>
    <div class="num-bar col-12 m-0  row justify-content-around">
        <div class="p-2" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '100';">
            <h3 class="m-0  font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">100</h3>
        </div>
        <div class="p-2" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '200';">
            <h3 class="m-0  font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">200</h3>
        </div>
        <div class="p-2" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '300';">
            <h3 class="m-0  font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">300</h3>
        </div>
        <div class="p-2" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '400';">
            <h3 class="m-0  font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">400</h3>
        </div>



    </div>
    <div class="numpad-box-2  " id="numpad_box">
        <div class="wrapper">
            <section class="calc-btn_row">
                <div class="calc_btn_row">
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '1';">1</button>
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '2';">2</button>
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '3';">3</button>
                </div>
                <div class="calc_btn_row">
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '4';">4</button>
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '5';">5</button>
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '6';">6</button>
                </div>
                <div class="calc_btn_row">
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '7';">7</button>
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '8';">8</button>
                    <button class="calc_btn" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '9';">9</button>
                </div>
                <div class="calc_btn_row justify-content-end">
                    <button class="calc_btn_2 none-bg" onclick=""></button>
                    <button class="calc_btn " onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value + '0';">0</button>
                    <button class="calc_btn_2 none-bg" onclick="document.getElementById('input_Top_Up').value=document.getElementById('input_Top_Up').value.slice(0, -1);"><i class="far fa-backspace"></i></button>
                </div>
            </section>
        </div>
    </div>
</div>















@endsection
@section('custom_modal')
<form action="" method="post" class="check-confirm-con" id="check_confirm_con">
    <div class="col-12 p-2 row m-0 border-bottom ">
        <ion-icon name="close-outline" class="align-self-center" id="off_check_confirm" style="color:rgba(126, 131, 137, 1);cursor: pointer; font-size:2rem;"></ion-icon>
        <div class="col-10 p-0 align-self-center text-center">
            <h3 class="m-0 font-weight-bold align-self-center">ตรวจสอบและยืนยัน</h3>
        </div>
    </div>
    <div class="col-12 p-3 m-0 row justify-content-between border-bottom">
        <h5 class="m-0  align-self-center" style="color:rgba(158, 158, 158, 1);">วิธีการชำระเงิน</h5>
        <h4 class="m-0 align-self-center" style="">K PLUS</h4>
    </div>
    <div class="col-12 p-3 m-0 row justify-content-between border-bottom">
        <h5 class="m-0  align-self-center" style="color:rgba(158, 158, 158, 1);">จำนวนที่เติม</h5>
        <h4 class="m-0 align-self-center" style="">฿ 100.00</h4>
    </div>
    <div class="col-12 p-3 m-0 row justify-content-between border-bottom">
        <h3 class="m-0 font-weight-bold align-self-center" style="color:rgba(72, 72, 72, 1);">ทั้งหมด</h3>
        <h3 class="m-0 align-self-center" style="color:rgba(72, 72, 72, 1);">฿ 100.00</h3>
    </div>
    <div class="col-12 m-0 p-2 pt-3">
        <button type="submit" class="btn  mt-4 col-12" style="font-size:1.3rem; background: #50CA65; color:rgba(255, 255, 255, 1);">เติมเงิน</button>

    </div>
</form>














@endsection
@section('custom_script')
<script>
    bottom_now(4);
    
    const inputTopUp = document.getElementById("input_Top_Up");
    const btnTopUp = document.getElementById("btn_Top_Up");

    inputTopUp.addEventListener('input', () => {
        if (inputTopUp.value >= 100) {
            btnTopUp.classList.add('btn-success');
        } else {
            btnTopUp.classList.remove('btn-success');

        }
    });

    const checkConfirmCon = document.getElementById("check_confirm_con");
    const checkConfirmShow = document.getElementById("show_check_confirm");
    const checkConfirmOff = document.getElementById("off_check_confirm");

    checkConfirmShow.addEventListener('click', () => {
        checkConfirmCon.classList.add('show-check-confirm');
        inputTopUp.classList.add('color-220');
        
        
    });

    checkConfirmOff.addEventListener('click', () => {
        checkConfirmCon.classList.remove('show-check-confirm');
        inputTopUp.classList.remove('color-220');
    });
   

    



</script>
@endsection