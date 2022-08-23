@extends('mobile.main_layout.guest')
    @section('content')
    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="{{ asset('new_assets/custom_assets/icons/mangkorn_logo.jpg') }}" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>เข้าสู่ระบบ</h1>
                <h4>กรุณาใส่ข้อมูลให้ครบถ้วน</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="{{ url ('getLogin') }}" method = "POST" name = "form_login" id = "form_login">
                    @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper text-left">
                            <label class = "font-weight-bold">ชื่อผู้ใช้งาน (ใช้หมายเลขโทรศัพท์เป็นชื่อผู้ใช้งาน)</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name = "tel" id="tel" placeholder="หมายเลขโทรศัพท์" onkeyup="this.value = this.value.replace(/[^0-9]/, '')" required>
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
                            <input type="password" class="form-control" name = "password" id="password" placeholder="รหัสผ่าน" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-button-group">
                        <button type="button" class="btn btn-primary btn-block btn-lg" onclick = "submit_form()">เข้าสู่ระบบ</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->
    @endsection

    @section('custom_script')
    <script>
        function submit_form()
        {

            document.getElementById('form_login').submit();
        }

        function check_username_char(event) {
            var ew = event.which;
                if(48 <= ew && ew <= 57)
                    return true;
                if(65 <= ew && ew <= 90)
                    return true;
                if ((45 == ew) || (ew == 95))
                    return true;
                if(97 <= ew && ew <= 122)
                    return true;
                return false;
        }
    </script>
    @endsection


