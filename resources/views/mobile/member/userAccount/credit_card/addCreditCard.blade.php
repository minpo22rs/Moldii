@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        การเพิ่มบัตร
    </div>
</div>
@endsection
@section('content')


<form action="">
    @csrf
    <div class="row p-2 col-12 m-0    " style="color:black; font-size:18px">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">หมายเลขบัตร</h4>
        </div>
        <input style="border-radius: 10px; height:2.8125rem;" type="text" name="phone" class="form-control mt-1 input_2  " placeholder="•••• •••• •••• ••••">

        <div class="col-12 mx-0 mt-3 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">ชื่อบนบัตร</h4>
        </div>
        <input style="border-radius: 10px; height:2.8125rem;" type="text" name="phone" class="form-control mt-1 input_2  " placeholder="Cardholder name">
    </div>

    <div class="row  col-12 m-0  mt-1  " style="color:black; font-size:18px">
        <div class="col-6">
            <div class="col-12 mx-0 align-self-center row p-0">
                <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">วันหมดอายุ</h4>
            </div>
            <input style="border-radius: 10px; height:2.8125rem;" type="text" name="phone" class="form-control mt-1 input_2  " placeholder="MM/YY">
        </div>

        <div class="col-6">
            <div class="col-12 mx-0 align-self-center row p-0">
                <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">CVV</h4>
            </div>
            <input style="border-radius: 10px; height:2.8125rem;" type="text" name="phone" class="form-control mt-1 input_2  " placeholder="••••">
        </div>

    </div>
    <div class="row p-2 col-12 m-0 mt-1    " style="color:black; font-size:18px">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">ชื่อเล่นบัตร(ไม่บังคับ)</h4>
        </div>
        <input style="border-radius: 10px; height:2.8125rem;" type="text" name="phone" class="form-control mt-1 input_2  " placeholder="•••• •••• •••• ••••">

        <div class="col-12 mx-0 mt-3 align-self-center justify-content-between row p-0">
            <h4 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">ตั้งค่าเป็นบัตรหลัก</h4>

            <div class="custom-control custom-switch  ">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1"></label>
            </div>
        </div>

    </div>


    <div class="col-12 px-3">
        <button type="submit" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;">บันทึกบัตร</button>

    </div>

</form>



@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection