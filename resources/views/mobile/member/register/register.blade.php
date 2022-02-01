@extends('mobile.main_layout.guest')
@section('content')
<div class="m-1">
    <div class="m-1">
        <div class="row align-items-center">
            <div class="col-12 text-left">
                <ion-icon name="arrow-back-outline" class="text-dark font-weight-bold" style="color: black; margin-top: 25px; font-size: 25px;"></ion-icon>
            </div>
            <div class="col-6 text-right" style="margin-top: 100px;">
                <h1 class="">
                    Register
                </h1>
            </div>

            
            <div class="col-6 text-center" style="margin-top: 100px;">
                <div class="m-1">

                    <img src="{{asset('new_assets/custom_assets/contact_icons/google_logo.png')}}" class="m-1 p-1 bg-white rounded custom_hover" style="weight: 50px; height: 50px;">
                    <img src="{{asset('new_assets/custom_assets/contact_icons/facebook_logo.png')}}" class="m-1 p-1 bg-white rounded custom_hover" style="weight: 50px; height: 50px;">
                </div>
            </div>
            <form action="{{url('checkregister')}}" method="POST" class="form-group row">
                @csrf
                <div class="col-10 offset-1 text-center">
                    <input type="text" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="firstname" id="firstname" value="" placeholder="Firstname">
                </div>
                <div class="col-10 offset-1 text-center">
                    <input type="text" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="lastname" id="lastname" value="" placeholder="Lastname">
                </div>
                <div class="col-10 offset-1 text-center">
                    <input type="text" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="username" id="username" value="" placeholder="Username or Mobile Number">
                </div>
                <div class="col-10 offset-1 text-center">
                    <input type="password" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="password" id="password" value="" minlength="8" placeholder="Password">
                </div>
                <div class="col-5 offset-1 text-center">
                    <input type="submit" class="btn btn-danger btn-block font-weight-bold my-3 rounded-pill" style="   font-size: 18px; 
                                            align-items: center; height: 50px;" value="Sign-up">
                </div>
                
                <div class="col-6 text-left">
                    <span class="custom_hover font-weight-bold  my-3" style="font-size: 16px;">
                        Already a member ?
                    </span>
                    <span class="custom_hover my-3" style="font-size: 16px; font-weight: bold;">
                        <a href="{{url('user/login')}}">Login</a>

                    </span>
                </div>
            </form>


        </div>

    </div>
</div>
@endsection