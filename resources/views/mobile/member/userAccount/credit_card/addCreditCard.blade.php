@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.location.replace('creditCard')"></ion-icon>
    </div>
    <div class="pageTitle">
        การเพิ่มบัตร11111
    </div>
</div>
@endsection
@section('content')


<form action="{{url('user/saveCreditCardonProfile')}}" method="POST">
    @csrf
    <div class="row p-2 col-12 m-0 " style="color:black; font-size:18px">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">หมายเลขบัตร</h4>
        </div>
        <input style="border-radius: 10px; height:2.8125rem;" type="text" name="no" class="form-control mt-1 input_3  " placeholder="•••• •••• •••• ••••"  onkeypress='return formats(this,event)' onkeyup="return numberValidation(event)" required>

        <div class="col-12 mx-0 mt-3 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">ชื่อบนบัตร</h4>
        </div> 
        <input style="border-radius: 10px; height:2.8125rem;" type="text" name="name" class="form-control mt-1 input_3  " placeholder="Cardholder name" required>
    </div>

    <div class="row  col-12 m-0  mt-1  " style="color:black; font-size:18px">
        <div class="col-6">
            <div class="col-12 mx-0 align-self-center row p-0">
                <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">วันหมดอายุ</h4>
            </div>
            <input style="border-radius: 10px; height:2.8125rem;" type="text" name="expirem" class="form-control mt-1 input_3  " minlength="2" maxlength="2" placeholder="MM (ex. 01)" required>
            <input style="border-radius: 10px; height:2.8125rem;" type="text" name="expirey" class="form-control mt-1 input_3  " minlength="2" maxlength="2" placeholder="YY (Last Two Digits)" required>
        </div>
        

        <div class="col-6">
            <div class="col-12 mx-0 align-self-center row p-0">
                <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">CCV</h4>
            </div>
            <input style="border-radius: 10px; height:2.8125rem;" type="text" name="ccv" class="form-control mt-1 input_3  " minlength="3" maxlength="3"  placeholder="•••" required>
        </div>

    </div>
    <div class="row p-2 col-12 m-0 mt-1    " style="color:black; font-size:18px">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">ชื่อเล่นบัตร(ไม่บังคับ)</h4>
        </div>
        <input style="border-radius: 10px; height:2.8125rem;" type="text" name="nickname" class="form-control mt-1 input_3  " placeholder="xxxx">

        <div class="col-12 mx-0 mt-3 align-self-center justify-content-between row p-0">
            <h4 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">ตั้งค่าเป็นบัตรหลัก</h4>

            <div class="custom-control custom-switch  ">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status">
                <label class="custom-control-label" for="customSwitch1"></label>
            </div>
        </div>

    </div>


    <div class="col-12 px-5 " style="height:100%;">
        <button type="submit" class="btn btn-success  col-12 " style="font-size:1.3rem; margin-top:60%;">บันทึกบัตร</button>
        {{-- id="buttonok" --}}
    </div>

</form>



@endsection

@section('custom_script')
<script>
    bottom_now(7);

    
    function formats(ele,e){
        if(ele.value.length<19){
          ele.value= ele.value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
          return true;
        }else{
          return false;
        }
      }
      

    function numberValidation(e){
        e.target.value = e.target.value.replace(/[^\d ]/g,'');
        return false;
    }
    // Basic eXV5Q2N2cG1JTGNlaVloTHNEVVBEaHZDeUpPdXlXZW06

    document.getElementById("buttonok").addEventListener("click", function(event){
        event.preventDefault();
        var publicKey = "yuyCcvpmILceiYhLsDUPDhvCyJOuyWem";
        var keyyy= "Basic " + btoa(publicKey + ":");
        console.log(keyyy);
        var dataReq = {
            "rememberCard": false,
            "card": {
                "number": "4535017710535741",
                "expirationMonth": "05",
                "expirationYear": "28",
                "securityCode": "184",
                "name": "Card Test UAT (Server Test)"
            }
        };
        $.ajax({
            type: "POST",
            url: "https://api.globalprimepay.com/v2/tokens",       // Test URL: https://api.globalprimepay.com/v2/tokens , Production URL: https://api.gbprimepay.com/v2/tokens
            data: JSON.stringify(dataReq),
            contentType: "application/json",
            dataType: "json",
            headers: {
            "Authorization": "Basic " + btoa(publicKey + ":")
            },
            success: function(dataResp){
                var dataStr = JSON.stringify(dataResp);
                alert(dataStr);
            },
            failure: function(errMsg) {
                alert(errMsg);
            }
        });
    });



</script>
@endsection