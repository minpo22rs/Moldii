@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        เปลี่ยนรหัสผ่าน
    </div>
</div>
@endsection
@section('content')
<div class="mt-1 p-2 col-12">

    <form action="{{url('checkotpchangepassword')}}" method="POST">
        @csrf
        <h3 class="my-1"><small style="color:rgba(181, 181, 181, 1);">เพื่อความปลอดภัยของบัญชีคุณ</small> </h3>
        <h3 class="my-1"><small style="color:rgba(181, 181, 181, 1);">กรุณายืนยันรหัส OTP เพื่อดำเนินการต่อ</small> </h6>

        <input type="text" class="form-control form-control-lg  my-3 mb-1 input" style="border-radius: 10px; " value="" placeholder="รหัส OTP จะถูกส่งไปที่เบอร์ {{substr($sql->customer_phone,0,6)}}****" readonly>
        {{-- <a href="{{url('user/profile/forgotPassword')}}">
            <h6 class="my-1 mr-2 text-right"><small style="color:rgba(80, 202, 101, 1);">ลืมรหัสผ่าน</small> </h6>
        </a> --}}


        @if($btn != 1)
            <button type="button" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;" id="btnold">ดำเนินการต่อ</button>
        @endif
        @if($btn == 0)
            <input type="text" class="form-control form-control-lg  my-3 mb-1 input" style="border-radius: 10px;display:none " id="newPassword" name="otp" value="" placeholder="รหัส OTP" minlength="4" maxlength="4">
            <button type="submit" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;display:none" id="btnnew" >ดำเนินการต่อ</button>
        @else
            <input type="text" class="form-control form-control-lg  my-3 mb-1 input" style="border-radius: 10px; " name="otp" value=""  id="newPassword" placeholder="รหัส OTP" minlength="4" maxlength="4">
            <button type="submit" class="btn btn-success mt-3 col-12" style="font-size:1.3rem;" id="btnnew" >ดำเนินการต่อ</button>
        @endif
    </form>
</div>



@endsection


@section('custom_script')

<script>
    bottom_now(7);

    var a = "{{Session::get('success')}}";
      if(a){
          Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
      }


      
    $('#btnold').on("click",()=> {
        console.log('asasasas');
        var tel = "{{$sql->customer_phone}}";
        $.ajax({
            url: '{{ url("/sendotpchangepassword")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'tel':tel},
            success: function(data) {
                if(data =='1'){
                    document.getElementById('newPassword').style.display = '';
                    document.getElementById('btnnew').style.display = '';
                    document.getElementById('btnold').style.display = 'none';
                }else{
                    Swal.fire({
                        text : "กรุณาลองใหม่อีกครั้งในภายหลังค่ะ",
                        confirmButtonColor: "#fc684b",
                    })

                    window.location.reload();
                }
                
            }
        });
    });

</script>

@endsection