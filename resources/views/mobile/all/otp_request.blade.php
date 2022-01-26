@extends('mobile.main_layout.guest')
@section('content')
    


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="new_assets/custom_assets/icons/mangkorn_logo.jpg" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>สมัครสมาชิก</h1>
                <h4>กรุณาใส่ข้อมูลให้ครบถ้วน</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="{{route('Create_OTP')}}" method="POST">
                @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name = "tel" id="tel" placeholder="หมายเลขโทรศัพท์">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">ขอ OTP</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->

    @endsection