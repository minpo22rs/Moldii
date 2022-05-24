@extends('mobile.main_layout.guest')
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
    @section('content')
    <div id="bg">
        <img src="{{asset('new_assets/img/login_new.JPG')}}" alt="">
    </div>
    <br>
        <div class = "m-1">
            <div class = "m-1">
                <div class = "row align-items-center">
                    <div class = "col-12 text-left">
                        <a href="{{url('/user/login')}}"><ion-icon   name="arrow-back-outline"
                                    class = "text-dark font-weight-bold" 
                                    style = "color: black; margin-top: 10%; font-size: 25px;"></ion-icon></a>
                    </div>
                    <div class = "col-12 " style = "margin-top: 30%;">
                        <h1 class = "ml-4 text-left">
                            Forgot
                        </h1>
                        <h1 class = "ml-4 text-left">
                            Password?
                        </h1>
                    </div>
                   
                        <div class = "col-8 offset-1 text-center"  >
                            <form action="{{url('createreset')}}" method="POST" id="sendmn">
                                @csrf
                                        <input  type = "text" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                                name = "tel" id = "tel" 
                                                value = "{{Session::get('phone') !=null ? ''.Session::get('phone').'':''}}" placeholder = "Mobile Number" minlength="10">
                                    </div>
                                    @if(Session::get('phone') ==null)
                                        <div class = "col-3 text-left">
                                        
                                                <ion-icon   name = "arrow-forward-outline"
                                                        class = "text-white font-weight-bold bg-danger p-1 rounded-circle" 
                                                        style = "color: black; margin-top: 10%; font-size: 25px;background-color: rgb(31, 164, 226) !important"
                                                        onclick="sendmn()"></ion-icon>

                                        
                                        </div>
                                    @endif
                                </form>


                        <div class = "col-8 offset-1 text-center " >
                            <form action="{{url('checkreset')}}" method="POST" id="sendotp">
                                @csrf
                                    <input type="hidden" name="tel" id="tel" value="{{Session::get('phone')}}" >

                                        <input  type = "text" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                                name = "otp" id = "otp" 
                                                value = "" placeholder = "OTP" >
                                    </div>
                                    <div class = "col-3 text-left">
                                        <ion-icon   name = "arrow-forward-outline"
                                                    class = "text-white font-weight-bold bg-danger p-1 rounded-circle" 
                                                    style = "color: black; margin-top: 10%; font-size: 25px;background-color: rgb(31, 164, 226) !important"
                                                    onclick="sendotp()"></ion-icon>
                                    </div>
                            </form>



                
                       

                            <div class = "col-10 offset-1 text-center">
                                <form action="{{url('formresetpassword')}}" method="POST" id="formchangepass">
                                        @csrf
                                        <input type="hidden" name="phone" id="phone" value="{{Session::get('phone')}}" >
                                        <input  type = "password" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                                name = "password" id = "password" value = "" placeholder = "Password" readonly>
                                    </div>

                                    <div class = "col-10 offset-1 text-center">
                                        <input  type = "password" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                                name = "confirm_password" id = "confirm_password" value = "" placeholder = "Confirm Password" readonly>
                                    </div>
                                    <div class = "col-10 offset-1 text-center">
                                        <input  type = "button" class = "btn btn-index btn-block font-weight-bold my-3 rounded-pill" id="btnsend"
                                                style = "   font-size: 18px; 
                                                            align-items: center; height: 50px;" value = "Reset Password" disabled
                                                onclick="confirmpass();"      
                                                >
                                    </div>
                                </form>
                    </div>
                    

                </div>
                
            </div>
        </div>
    @endsection

    @section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        var verify = "{{Session::get('verify')}}";

        $( document ).ready(function() {
            if(verify == 1){
                console.log('v1')
                document.getElementById('password').readOnly = 'false';
                document.getElementById('confirm_password').readOnly = 'false';
                document.getElementById('btnsend').disabled = 'false';
            }
        });

       

        if (a) {
            alert(a);
        }

       function sendmn(){
           var tel = document.getElementById('tel').value ;
           if(tel == ''){
                alert('กรุณากรอกเบอร์โทรศัพท์');
           }else{
                $('#sendmn').submit();

           }
       }

       function sendotp(){
           var otp = document.getElementById('otp').value ;
           if(otp == ''){
                alert('กรุณากรอกหมายเลข OTP');
           }else{
                $('#sendotp').submit();

           }
       }


       function confirmpass(){
           var p2 = document.getElementById('confirm_password').value ;
           var p1 = document.getElementById('password').value ;
           if(p1  != p2){
                alert('รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่');
           }else{
                $('#formchangepass').submit();

           }
       }


    </script>
    @endsection