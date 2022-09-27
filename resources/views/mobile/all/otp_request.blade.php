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
                            <input type="text" class="form-control" name = "mn" id="mn" onkeyup="autoTab(this);"  placeholder="หมายเลขโทรศัพท์" required>
                           
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


        function autoTab(obj){
            /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
            หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
            4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
            รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
            หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
            ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
            */
                var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
                var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
                var returnText=new String("");
                var obj_l=obj.value.length;
                var obj_l2=obj_l-1;
                for(i=0;i<pattern.length;i++){           
                    if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                        returnText+=obj.value+pattern_ex;
                        obj.value=returnText;
                    }
                }
                if(obj_l>=pattern.length){
                    obj.value=obj.value.substr(0,pattern.length);           
                }
        }
        
    </script>
    @endsection