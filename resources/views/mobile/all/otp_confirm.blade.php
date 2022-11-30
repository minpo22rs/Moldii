@extends('mobile.main_layout.guest')
@section('content')

<script>
    var a = "{{Session::get('error')}}";
    if(a){
        alert(a);
    }
</script>
<style>
    #bg {
        position: fixed; 
        top: -50%; 
        left: -50%; 
        width: 200%; 
        height: 200%;
    }
    #bg img {
        position: absolute; 
        top: 0; 
        left: 0; 
        right: 0; 
        bottom: 0; 
        margin: auto; 
        min-width: 50%;
        min-height: 50%;
    }
</style>

<!-- App Capsule -->
<div id="appCapsule" class="pt-0">

    <div class="login-form" style = "margin-top: 170px;">
        <div id="bg">
            <img src="{{asset('new_assets/img/login_new.JPG')}}" alt="">
        </div>
        
        <div class="section mt-1 mb-5">
            <form action="{{route('Check_OTP')}}" method="post">
                @csrf
                

                <div class="form-group boxed">
                   
                    <div class="input-wrapper">
                        <h2>กรอกรหัส OTP</h2>

                        <input type="text" class="form-control" name="tel" id="tel" placeholder="หมายเลขโทรศัพท์" value="{{Session::get('phone')}}" readonly>
                        
                    </div>
                </div>
          
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="number" class="form-control" name="otp" id="otp" placeholder="กรอกเลข OTP ที่ได้รับ" required>
                        

                        <br><br><br>
                        <button type="submit" class="btn btn-danger btn-block btn-lg" style="width:150px!important">ยืนยัน OTP</button>
                    </div>

                    
                </div>

               

            </form>
        </div>
    </div>


</div>
<!-- * App Capsule -->


@endsection

@section('custom_script')
<script>
     var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }

</script>
@endsection
