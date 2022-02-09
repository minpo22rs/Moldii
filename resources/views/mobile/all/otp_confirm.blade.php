@extends('mobile.main_layout.guest')
@section('content')

<script>
    var a = "{{Session::get('error')}}";
    if(a){
        alert(a);
    }
</script>


<!-- App Capsule -->
<div id="appCapsule" class="pt-0">

    <div class="login-form" style = "margin-top: 150px;">
            <!-- <div class="section">
                <img src="new_assets/custom_assets/icons/mangkorn_logo.jpg" alt="image" class="form-image">
            </div> -->
        <div class="section mt-1">
            <h1>OTP</h1>
            <h4>Type your telephone number for getting the OTP</h4>
        </div>
        <div class="section mt-1 mb-5">
            <form action="{{route('Check_OTP')}}" method="post">
                @csrf

                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="text" class="form-control" name="tel" id="tel" placeholder="หมายเลขโทรศัพท์" value="{{Session::get('phone')}}" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
          
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="text" class="form-control" name="otp" id="otp" placeholder="เลข OTP" >
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-button-group">
                    <button type="submit" class="btn btn-danger btn-block btn-lg">ยืนยัน OTP</button>
                </div>

            </form>
        </div>
    </div>


</div>
<!-- * App Capsule -->


@endsection

@section('custom_script')
@endsection
