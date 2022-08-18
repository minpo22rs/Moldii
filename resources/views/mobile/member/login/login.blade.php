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
            <img src="{{asset('new_assets/img/login_new.jpg')}}" alt="">
        </div>
        <br><br><br>
        <div class = "m-1">
            <div class = "m-1">
                <form action="{{url('checklogin')}}" method="POST">
                    @csrf
                        <div class = "row align-items-center">
                            <div class = "col-12 text-center">
                                <img src="{{asset('new_assets/img/Moldii.png')}}" style="width: 25%;height:25%;margin-top: 100px;">
                                <b><h1 class = ""  style = "margin-top: 10px;">
                                    เข้าสู่ระบบ
                                </h1></b>
                            </div>
                        
                                <div class = "col-10 offset-1 text-center">
                                    <input  type = "text" class = "form-control form-control-lg my-3" style = "border-radius: 10px;"
                                            name = "username" id = "username" 
                                            value = "" placeholder = "ชื่อผู้ใช้" >
                                </div>
                                <div class = "col-10 offset-1 text-center">
                                    <input  type = "password" class = "form-control form-control-lg my-3" style = "border-radius: 10px;"
                                            name = "password" id = "password" 
                                            value = "" placeholder = "รหัสผ่าน" >
                                </div>
                                <div class = "col-10 offset-1 text-right">
                                    <a href="{{url('user/forgotPassword')}}"><span class = "custom_hover font-weight-bold mx-2 my-3" style = "font-size: 16px;">ลืมรหัสผ่าน?</span></a>
                                </div>
                                <div class = "col-10 offset-1 text-center">
                                    <input  type = "submit" class = "btn btn-index btn-block font-weight-bold my-3 rounded-pill" 
                                            style = "   font-size: 18px; 
                                                        align-items: center; height: 50px;" value = "เข้าสู่ระบบ">
                                </div>
                    

                            <div class = "col-12 text-left" style = "margin-top: 70px;">
                                <div class = "m-1">
                                    <a href="{{route('redirectToProvider','google')}}">
                                        <img    src = "{{asset('new_assets/custom_assets/contact_icons/google_logo.png')}}"
                                            class = "m-1 p-1 bg-white rounded custom_hover"
                                            style = "weight: 50px; height: 50px;">
                                    </a>

                                    <a href="{{route('redirectToProvider','facebook')}}">
                                        <img    src = "{{asset('new_assets/custom_assets/contact_icons/facebook_logo.png')}}"
                                            class = "m-1 p-1 bg-white rounded custom_hover"
                                            style = "weight: 50px; height: 50px;">
                                    </a>
                                </div>
                            </div>

                            <div class = "col-12 text-left">
                                <span class = "custom_hover font-weight-bold mx-2 my-3" style = "font-size: 16px;">
                                    ลงทะเบียนได้ที่นี่  <a href="{{url('user/register')}}">สมัครสมาชิก</a>
                                </span>
                            </div>
                            {{-- <div class = "col-12 text-left">
                            
                                <span class = "custom_hover font-weight-bold ml-1 my-3" style = "font-size: 16px;">
                                    New Here ? 
                                </span>
                                <span class = "custom_hover my-3" style = "font-size: 16px; font-weight: bold;">
                                <a href="{{url('user/register')}}">สมัครสมาชิก</a>
                                </span>
                                
                            </div> --}}

                        </div>
                </form>
                
            </div>
        </div>
    @endsection

    @section('custom_script')
    <script>
        var a = "{{Session::get('error')}}";
        if(a){
            alert(a);
        }
    </script>

@endsection