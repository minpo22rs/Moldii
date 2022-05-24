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
<div class="m-1">
    <div class="m-1">
        <div class="row align-items-center">
            <div class="col-12 text-left">
                <a href="{{url('/user/login')}}"><ion-icon name="arrow-back-outline" class="text-dark font-weight-bold" style="color: black; margin-top: 25px; font-size: 25px;"></ion-icon></a>
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
            <form action="{{url('checkregister')}}" method="POST" class="form-group row" id="formregis">
                @csrf
                <div class="col-10 offset-1 text-center">
                    <input type="text" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="firstname" id="firstname" value="" placeholder="Firstname">
                </div>
                <div class="col-10 offset-1 text-center">
                    <input type="text" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="lastname" id="lastname" value="" placeholder="Lastname">
                </div>
                <div class="col-10 offset-1 text-center">
                    <input type="text" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="username" id="username" value="" onchange="checkusername(this.value);" placeholder="Username">
                </div>
                <div class="col-10 offset-1 text-center">
                    <input type="text" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="mn" id="mn" value="" onchange="checkmn(this.value);" placeholder="Mobile Number">
                </div>
                <div class="col-10 offset-1 text-center">
                    <input type="password" class="form-control form-control-lg my-1" style="border-radius: 10px;" name="password" id="password" value="" minlength="8" placeholder="Password">
                </div>
                <div class="col-5 offset-1 text-center">
                    <input type="button" class="btn btn-index btn-block font-weight-bold my-3 rounded-pill" 
                                        style="font-size: 18px; align-items: center; height: 50px;" value="Sign-up" 
                                        id="subbutton" onclick="subform();">
                </div>
                
                <div class="col-6 text-left">
                    <div class = "row align-items-center my-3">
                        <div class = "col-12">
                            <span class="custom_hover font-weight-bold" style="font-size: 16px;">
                                Already a member ?
                            </span>
                        </div>
                        <div class = "col-12">
                            <span class="custom_hover" style="font-size: 16px; font-weight: bold;">
                                <a href="{{url('user/login')}}">Login</a>
                            </span>
                        </div>
                        
                        
                    </div>
                </div>
            </form>


        </div>

    </div>
</div>

{{-- เบอร์โทรศัพท์นี้ได้ทำการใช้งานไปเรียบร้อยแล้วค่ะ --}}
@endsection
@section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }

        var cn =0 ;
        var cm =0 ;

        
        function checkusername(v){
           
            $.ajax({
                url: '{{ url("checkusername")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'name':v},
                success: function(data) {
                    if(data == 1){
                        cn = 1;
                        alert('มีชื่อบัญชีนี้ในระบบแล้ว กรุณากรอกใหม่');
                        document.getElementById("username").value = '';
                        $('#username').focus();
                    }else{
                       
                        cn = 0;

                    }
                }
            });
        }

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



        function subform(){
            // console.log(cn);
            // console.log(cm);
            var f =  document.getElementById("firstname").value;
            var l =  document.getElementById("lastname").value;
            var p =  document.getElementById("password").value;
          
            if(cn ==0 && cm ==0 && f !='' && l !='' && p !=''){
               
                $('#formregis').submit();
            }else{
                alert('กรุณาข้อมูลให้ครบถ้วน');
            }
        }

   
    </script>
@endsection
