@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        รหัสผ่านใหม่
    </div>
</div>
@endsection
@section('content')
<br>
<div class="mt-1 p-2 col-12">

    <form action="{{url('user/savenewPassword')}}" method="POST" id="formchangepass">
        @csrf
        <h3 class="my-1"><small style="color:rgba(181, 181, 181, 1);">เพื่อความปลอดภัยของบัญชีคุณ</small> </h3>
        <h3 class="my-1"><small style="color:rgba(181, 181, 181, 1);">กรุณายืนยันรหัสผ่านเพื่อดำเนินการต่อ</small> </h3>
        <h3 class="my-1"><small style="color:red">ขั้นต่ำ 8 ตำแหน่ง</small> </h3>

        <input type="password" class="form-control form-control-lg  my-3 mb-1 input" style="border-radius: 10px; " name="password" id="password" value="" minlength="8" placeholder="รหัสผ่านใหม่ ">
        <input type="password" class="form-control form-control-lg  my-3 mb-1 input" style="border-radius: 10px; " name="confirm_password" id="confirm_password" value="" minlength="8"  placeholder="ยืนยันรหัสผ่านใหม่">




        <button type="button" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;" onclick="confirmpass();">ยืนยัน</button>



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
@endsection
@section('custom_script')

<script>
    bottom_now(7);
    //_______________[Buy_goods]__________________//
    // const showNum = document.getElementById("newPassword");
    // const boxNum = document.getElementById("numpad_box");
    // const conNum = document.getElementById("numpad_container");

    // showNum.addEventListener("click", () => {
    //     boxNum.classList.add("numpad-show");

    // });



    function confirmpass(){
        var p2 = document.getElementById('confirm_password').value ;
        var p1 = document.getElementById('password').value ;
        if(p1  != p2){
            Swal.fire({
                text : "รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่",
                confirmButtonColor: "#fc684b",
            })


        }else{
            if(p2.length < 8 || p1.length < 8){
                Swal.fire({
                    text : "รหัสผ่านนี้ไม่เป็นไปตามข้อกำหนดขั้นต่ำ",
                    confirmButtonColor: "#fc684b",
                })
            }else{
                $('#formchangepass').submit();

            }

        }
    }



    //_______________[Buy_goods]__________________//
</script>

@endsection