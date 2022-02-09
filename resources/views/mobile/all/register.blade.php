@extends('mobile.main_layout.guest')
@section('content')



    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="assets/custom_assets/icons/mangkorn_logo.jpg" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>สมัครสมาชิก</h1>
                <h4>กรุณาใส่ข้อมูลให้ครบถ้วน</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="#">

                    <div class="form-group boxed">
                        <div class="input-wrapper text-left">
                            <label class = "font-weight-bold">ชื่อผู้ใช้งาน (ใช้หมายเลขโทรศัพท์เป็นชื่อผู้ใช้งาน)</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name = "tel" id="tel" placeholder="หมายเลขโทรศัพท์" readonly>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper text-left">
                            <label class = "font-weight-bold">รหัสผ่าน</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="password" class="form-control" name = "password" id="password" placeholder="รหัสผ่าน" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper text-left">
                            <label class = "font-weight-bold">ยืนยันรหัสผ่าน</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="password" class="form-control" name = "confirm_password" id="confirm_password" placeholder="ยืนยันรหัสผ่าน" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>


                    <div class="form-button-group">
                        <button type="button" class="btn btn-primary btn-block btn-lg">ขอ OTP</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->
    @endsection