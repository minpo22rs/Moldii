@extends('mobile.main_layout.guest')
    @section('content')
        <div class = "m-1">
            <div class = "m-1">
                <div class = "row align-items-center">
                    <div class = "col-12 text-left">
                        <ion-icon   name="arrow-back-outline"
                                    class = "text-dark font-weight-bold" 
                                    style = "color: black; margin-top: 10%; font-size: 25px;"></ion-icon>
                    </div>
                    <div class = "col-12 text-left" style = "margin-top: 30%;">
                        <h1 class = "ml-4">
                            Forgot
                        </h1>
                        <h1 class = "ml-4">
                            Password?
                        </h1>
                    </div>
                    
                    <div class = "col-10 offset-1 text-center">
                        <input  type = "text" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                name = "tel" id = "tel" 
                                value = "" placeholder = "Tel Number" >
                    </div>
                    <div class = "col-8 offset-1 text-center">
                        <input  type = "text" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                name = "otp" id = "otp" 
                                value = "" placeholder = "OTP" >
                    </div>
                    <div class = "col-3 text-left">
                        <ion-icon   name = "arrow-forward-outline"
                                    class = "text-white font-weight-bold bg-danger p-1 rounded-circle" 
                                    style = "color: black; margin-top: 10%; font-size: 25px;"></ion-icon>
                    </div>
                    <div class = "col-10 offset-1 text-center">
                        <input  type = "password" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                name = "password" id = "password" 
                                value = "" placeholder = "Password" >
                    </div>
                    <div class = "col-10 offset-1 text-center">
                        <input  type = "password" class = "form-control form-control-lg my-1" style = "border-radius: 10px;"
                                name = "confirm_password" id = "confirm_password" 
                                value = "" placeholder = "Confirm Password" >
                    </div>
                    <div class = "col-10 offset-1 text-center">
                        <input  type = "button" class = "btn btn-danger btn-block font-weight-bold my-3 rounded-pill" 
                                style = "   font-size: 18px; 
                                            align-items: center; height: 50px;" value = "Reset Password">
                    </div>
                    

                </div>
                
            </div>
        </div>
    @endsection