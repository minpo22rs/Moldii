@extends('mobile.main_layout.guest')
@section('content')
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
        <div id="bg">
            <img src="{{asset('new_assets/img/login_new.JPG')}}" alt="">
        </div>
        <div class="login-form" style = "margin-top: 200px;">
           
            
            <br>
            <div class="section mt-1 mb-5">
                <form action="{{route('Create_OTP')}}" method="POST">
                    @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                           
                            <h1>OTP</h1>
                            <h4>กรอกเบอร์โทรศัพท์เพื่อใช้ในการรับหรัส OTP <br>และใช้ในการยืนยันตัวตน</h4>
                            <input type="text" class="form-control" name = "mn" id="mn" onchange="checkmn(this.value);" placeholder="เบอร์โทรศัพท์ Ex.08xxxxxxxx" required>
                           
                            <br><br><br>
                            <button type="submit" class="btn btn-danger btn-block btn-lg" style="width:150px!important">ขอรหัส OTP</button>
                        </div>
                        
                    </div>
                   
                    {{-- <div class="form-button-group " >
                        <button type="submit" class="btn btn-danger btn-block btn-lg" >ขอรหัส OTP</button>
                    </div> --}}

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->
    <script>
        function checkmn(v){
            // console.log(v);
            $.ajax({
                url: '{{ url("checkmn")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'mn':v},
                success: function(data) {
                    if(data == 1){
                        cm = 1;
                        alert('มีเบอร์โทรศัพท์นี้ในระบบแล้ว กรุณากรอกใหม่');
                        document.getElementById("mn").value = '';
                        $('#mn').focus();
                    }else{
                        cm = 0;
                        

                    }
                }
            });
        }
    </script>
    @endsection