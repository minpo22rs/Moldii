@extends('mobile.main_layout.main')
@section('app_header')
<style>
    optgroup { font-size:1rem; }
</style>
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ที่อยู่ใหม่
    </div>
</div>
@endsection
@section('content')


<form action="{{url('user/addnewaddress')}}" method="POST" id="input_Top_Up">
    @csrf
    <div class="row p-2 col-12 m-0   border-bottom " style="color:black; font-size:18px">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">ช่องทางการติดต่อ</h4>
        </div>
    </div>

    <input style="border:none;" type="text" name="name" class="form-control input_2  border-bottom" placeholder="ชื่อ นามสกุล">
    <input style="border:none;" type="text" name="phone" class="form-control input_2  border-bottom" placeholder="หมายเลขโทรศัพท์">
    <div class="row p-2 col-12 m-0 mt-1   border-bottom " style="color:black; font-size:18px">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">ที่อยู่</h4>
        </div>
    </div>
    <input style="border:none;" type="text" name="address_details" class="form-control input_2 border-top mt-2  border-bottom" placeholder="รายละเอียดที่อยู่">
    <select style="border:none;" class="form-control input_2  border-bottom" name="province" id="province">
        <optgroup>
            <option value="" >เลือกจังหวัด</option>
        </optgroup>
    </select>
    <select style="border:none;" class="form-control input_2  border-bottom" name="county" id="county">
        <option>เลือกเขต/อำเภอ</option>
    </select>
    <select style="border:none;" class="form-control input_2  border-bottom" name="zip_code" id="tumbon">
        <option>เลือกแขวง/ตำบล</option>
    </select>

    <input style="border:none;" type="text" name="zip_code" class="form-control input_2  border-bottom" placeholder="รหัสไปรษณีย์" readonly>


    <div class="row p-2 col-12 m-0 mt-1    " style="color:black; font-size:18px">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">ตั้งค่า</h4>
        </div>
        <div class="col-12 mx-0 mt-3 align-self-center justify-content-between row p-0">
            <h4 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">ตั้งค่าเป็นที่อยู่เริ่มต้น</h4>

            <div class="custom-control custom-switch  ">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1"></label>
            </div>
        </div>
    </div>
    <div class="col-12 px-3">
        <button type="submit" class="btn  mt-3 col-12" id="btn_Top_Up" style="font-size:1.3rem; background: #C4C6C7; color:#fff;">บันทึก</button>

    </div>

</form>



@endsection

@section('custom_script')
<script>
    bottom_now(7);


    const inputTopUp = document.getElementById("input_Top_Up");
    const btnTopUp = document.getElementById("btn_Top_Up");

    inputTopUp.addEventListener('input', () => {
        if (inputTopUp.value !== "") {
            btnTopUp.classList.add('btn-success');
        }else{
            btnTopUp.classList.remove('btn-success');

        }



    });
</script>
@endsection