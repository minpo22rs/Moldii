@extends('mobile.main_layout.guest')
    @section('content')
        <div class = "m-1">
            <div class = "m-1">
                <form action="{{url('checklogin')}}" method="POST">
                    @csrf
                        <div class = "row align-items-center">
                            <div class = "col-12 text-center">
                                <h1 class = ""  style = "margin-top: 50%;">
                                    LOGIN
                                </h1>
                            </div>
                        
                                <div class = "col-10 offset-1 text-center">
                                    <input  type = "text" class = "form-control form-control-lg my-3" style = "border-radius: 10px;"
                                            name = "username" id = "username" 
                                            value = "" placeholder = "Username or Mobile Number" >
                                </div>
                                <div class = "col-10 offset-1 text-center">
                                    <input  type = "password" class = "form-control form-control-lg my-3" style = "border-radius: 10px;"
                                            name = "password" id = "password" 
                                            value = "" placeholder = "Password" >
                                </div>
                                <div class = "col-10 offset-1 text-right">
                                    <span class = "custom_hover font-weight-bold mx-2 my-3" style = "font-size: 16px;">Forgot password?</span>
                                </div>
                                <div class = "col-10 offset-1 text-center">
                                    <input  type = "submit" class = "btn btn-danger btn-block font-weight-bold my-3 rounded-pill" 
                                            style = "   font-size: 18px; 
                                                        align-items: center; height: 50px;" value = "Login">
                                </div>
                    

                            <div class = "col-12 text-left" style = "margin-top: 70px;">
                                <div class = "m-1">
                                    <img    src = "{{asset('new_assets/custom_assets/contact_icons/google_logo.png')}}"
                                            class = "m-1 p-1 bg-white rounded custom_hover"
                                            style = "weight: 50px; height: 50px;">
                                    <img    src = "{{asset('new_assets/custom_assets/contact_icons/facebook_logo.png')}}"
                                            class = "m-1 p-1 bg-white rounded custom_hover"
                                            style = "weight: 50px; height: 50px;">
                                </div>
                            </div>

                            <div class = "col-12 text-left">
                                <span class = "custom_hover font-weight-bold mx-2 my-3" style = "font-size: 16px;">
                                    ลงทะเบียนได้ที่นี่
                                </span>
                            </div>
                            <div class = "col-12 text-left">
                            
                                <span class = "custom_hover font-weight-bold ml-1 my-3" style = "font-size: 16px;">
                                    New Here ? 
                                </span>
                                <span class = "custom_hover my-3" style = "font-size: 16px; font-weight: bold;">
                                <a href="{{url('user/register')}}">Register</a>
                                </span>
                                
                            </div>

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