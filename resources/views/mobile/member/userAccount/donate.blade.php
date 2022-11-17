@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        หน้าแลกเหรียญโดเนทเป็นคอยน์
    </div>
</div>
@endsection
@section('content')
<br>
<div class="mt-3 p-2 col-md-12">

    <form action="{{url('user/submitdonateexchange')}}" method="POST">
        @csrf
        <h3>จำนวนคอยน์คงเหลือ : {{number_format($sql->customer_coin,2,'.',',')}}</h3>
        {{-- <br> --}}
        {{-- จำนวนเหรียญโดเนทที่ต้องการแลก (ขั้นต่ำ 10 เหรียญ)<input type="number" name="money" placeholder="จำนวนเหรียญโดเนทที่ต้องการแลก" class="form-control" id="money" min="10" max="{{$sql->customer_donate}}" onchange="ccoin(this.value);" ><br> --}}
        จำนวนคอยน์ที่ได้ <input type="text" name="coin" placeholder="จำนวนคอยน์ที่ได้" class="form-control" id="coin" readonly>
        <br>
        <input type="hidden" name="money" id="money" >
        <button type="submit" class="btn btn-success col-12 mt-4" style="font-size:1.3rem;">ยืนยันการแลกไอคอน</button>
        {{-- <a href="#"><button type="button" class="btn btn-danger col-12 mt-2" style="font-size:1.3rem;">ยกเลิก</button></a> <!-- ให้ลิงค์กลับมาหน้าเดิม คล้ายการทำ  Reset --> --}}
    </form>
    
    @if($donate->count() > 0)
        <br><br>
        <h3>ตารางของขวัญที่ได้รับ</h3>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>รายการ</th>
                <th>จำนวน</th>
                <th><input type="checkbox" class="mr-1" onclick="selectdonate(0,this);">ทั้งหมด</th>
            </tr>
            </thead>
            <tbody>
                <?php $all =0; ?>
            
                    @foreach($donate as $key => $logs)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            @if($logs->donate == "Ghost")
                                <td><img src="{{ asset('new_assets/img/IconDonate/ghost.png') }}" width="30px" height="30px"></td>
                            @elseif($logs->donate == "Hi")
                                <td><img src="{{  asset('new_assets/img/IconDonate/Hi.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "Iloveyou")
                                <td><img src="{{  asset('new_assets/img/IconDonate/iloveyou.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "Supercar")
                                <td><img src="{{  asset('new_assets/img/IconDonate/Supercar.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "UFO")
                                <td><img src="{{  asset('new_assets/img/IconDonate/UFO.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "กระโหลก")
                                <td><img src="{{  asset('new_assets/img/IconDonate/กระโหลก.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "กล้อง")
                                <td><img src="{{  asset('new_assets/img/IconDonate/กล้อง.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "เกมบอย")
                                <td><img src="{{  asset('new_assets/img/IconDonate/เกมบอย.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ของขวัญ")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ของขวัญ.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "เข็มฉีดยา")
                                <td><img src="{{  asset('new_assets/img/IconDonate/เข็มฉีดยา.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "เค้ก")
                                <td><img src="{{  asset('new_assets/img/IconDonate/เค้ก.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "เครื่องบิน")
                                <td><img src="{{  asset('new_assets/img/IconDonate/เครื่องบิน.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "จอยเกม")
                                <td><img src="{{  asset('new_assets/img/IconDonate/จอยเกม.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "จักรยาน")
                                <td><img src="{{  asset('new_assets/img/IconDonate/จักรยาน.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "เจ๋ง")
                                <td><img src="{{  asset('new_assets/img/IconDonate/เจ๋ง.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ดวงอาทิตย์")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ดวงอาทิตย์.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ดอกไม้")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ดอกไม้.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ดาว")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ดาว.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "โดนัท")
                                <td><img src="{{  asset('new_assets/img/IconDonate/โดนัท.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ตุ๊กตา")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ตุ๊กตา.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ถ้วยรางวัลที่ 1")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ถ้วยรางวัลที่ 1.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ถ้วยรางวัลที่ 2")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ถ้วยรางวัลที่ 2.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ถ้วยรางวัลที่ 3")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ถ้วยรางวัลที่ 3.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ถุงเงิน")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ถุงเงิน.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ทามาก๊อต")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ทามาก๊อต.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ทีวี")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ทีวี.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "เทปคาสเซ็ต")
                                <td><img src="{{  asset('new_assets/img/IconDonate/เทปคาสเซ็ต.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ปั้มน้ำมัน")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ปั้มน้ำมัน.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ไฟ")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ไฟ.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ภูเขาไฟ")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ภูเขาไฟ.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "มงกุฎ")
                                <td><img src="{{  asset('new_assets/img/IconDonate/มงกุฎ.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "มอเตอร์ไซค์")
                                <td><img src="{{  asset('new_assets/img/IconDonate/มอเตอร์ไซค์.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "แมวกวัก")
                                <td><img src="{{  asset('new_assets/img/IconDonate/แมวกวัก.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ยานอวกาศ")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ยานอวกาศ.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ระเบิด")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ระเบิด.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "รุ้ง")
                                <td><img src="{{  asset('new_assets/img/IconDonate/รุ้ง.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ลูกโป่ง")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ลูกโป่ง.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ลูกอม")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ลูกอม.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "สายฟ้า")
                                <td><img src="{{  asset('new_assets/img/IconDonate/สายฟ้า.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "หีบสมบัติ")
                                <td><img src="{{  asset('new_assets/img/IconDonate/หีบสมบัติ.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "หุ่นยนต์")
                                <td><img src="{{  asset('new_assets/img/IconDonate/หุ่นยนต์.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "เห็ดเพิ่มพลัง")
                                <td><img src="{{  asset('new_assets/img/IconDonate/เห็ดเพิ่มพลัง.png') }}"  width="30px" height="30px"></td>
                            @elseif($logs->donate == "ไอศกรีม")
                                <td><img src="{{  asset('new_assets/img/IconDonate/ไอศกรีม.png') }}"  width="30px" height="30px"></td>
                            @endif
                            <td>{{$logs->countt}}</td>
                           
                            <td><input type="checkbox" name="chk" value="{{$logs->coin*$logs->countt}}" onclick="selectdonate(1,this);"></td>
                        </tr>
                        <?php $all += $logs->coin*$logs->countt; ?>
                    @endforeach
                
                            
            </tbody>
        </table>
        
    @endif

</div>

@endsection

@section('custom_script')
<script>
    bottom_now(7);

    var a = "{{Session::get('msg')}}";
    if(a){
        Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
    }

   
    var id = 0;

    function selectdonate(v,t){
        var all  = "{{$all}}";
        var ele=document.getElementsByName('chk');  
        if( v ==0){
            id = parseInt(all);
            if(t.checked == true){
                var allint = parseInt(all);
                document.getElementById('coin').value = allint-(allint*0.1);
                document.getElementById('money').value = allint;
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }else{
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                      
                }  
                document.getElementById('money').value = '';
                document.getElementById('coin').value = '';
            }
            

        }else{
            if(t.checked == true){
                id += parseInt(t.value);
                document.getElementById('coin').value = id-(id*0.1);
                document.getElementById('money').value = id;
            }else{
                id -= parseInt(t.value);
                document.getElementById('coin').value = id-(id*0.1);
                document.getElementById('money').value = id;
                if(id == 0){
                    document.getElementById('money').value = '';
                    document.getElementById('coin').value = '';

                }
            }
        }
        
    }

    function ccoin(x){
        document.getElementById('coin').value = x-(x*0.1);
      
        // if(x < 100){
        //     alert('กรุณากรอกจำนวนเงินขั้นต่ำ 100 บาท');
        //     document.getElementById('money').value = '';

        // }else{
        //     if(x > parseInt(m)){
        //         alert('ยอดเงินคงเหลือไม่พอ  กรุณากรอกจำนวนเงินใหม่');
        //         document.getElementById('money').value = '';
        //     }else{
        //         document.getElementById('coin').value = x/100;

        //     }

        // }
        
    }

</script>
@endsection