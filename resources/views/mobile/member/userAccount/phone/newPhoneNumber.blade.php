@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        เบอร์โทรศัพท์ใหม่
    </div>
</div>
@endsection
@section('content')
<br>
<div class="mt-3 p-2 col-12">
<br>
    <form action="{{url('user/OTP_PhoneNumber')}}" method="GET" id="OTP_PhoneNumber">
        @csrf
        <h6 class="my-1" style="color:rgba(181, 181, 181, 1);">กรุณาใส่หมายเลขโทรศัพท์ที่ต้องการเลี่ยนแปลงและเพื่อรับรหัส OTP </h6>

        <input type="text" class="form-control form-control-lg mt-1 mb-1 input" style="border-radius: 10px; " name="newPhone" id="phone" onkeyup="autoTab(this);"  placeholder="หมายเลขโทรศัพท์" data-operand-current required>

        <h6 class="text-center my-3" style="color:rgba(181, 181, 181, 1);">หากคุณแก้ไขหมายเลขโทรศัพท์ที่นี่ หมายเลขโทรศัพท์ของบัญชีทั้งหมดที่ผูกกับ<br>บัญชีผู้ใช้นี้จะถูกแก้ไขตามไปด้วย </h6>



        <button type="submit" class="btn btn-success col-12" style="font-size:1.3rem;" >ดำเนินการต่อ</button>
    </form>
</div>




@endsection

@section('custom_script')

<script>
    bottom_now(7);

    var a = "{{Session::get('msg')}}";
    if (a) {
        Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
    }


        // function checkmn(){
            
        //     var p = document.getElementById("phone").value;
        //     $.ajax({
        //         url: '{{ url("checkmn")}}',
        //         type: 'GET',
        //         dataType: 'HTML',
        //         data: {'mn':p},
        //         success: function(data) {
        //             if(data == 1){
                       
        //                 alert('มีเบอร์โทรศัพท์นี้ในระบบแล้ว กรุณากรอกใหม่');
        //                 document.getElementById("phone").value = '';
        //                 $('#phone').focus();
        //             }else{
        //                 $('#OTP_PhoneNumber').submit();
                        

        //             }
        //         }
        //     });
        // }

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