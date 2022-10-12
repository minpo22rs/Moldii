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
        <h3>จำนวนเหรียญโดเนทคงเหลือ : {{number_format($sql->customer_donate,2,'.',',')}}</h3>
        <br>
        จำนวนเหรียญโดเนทที่ต้องการแลก (ขั้นต่ำ 10 เหรียญ)<input type="number" name="money" placeholder="จำนวนเหรียญโดเนทที่ต้องการแลก" class="form-control" id="money" min="10" max="{{$sql->customer_donate}}" onchange="ccoin(this.value);" ><br>
        จำนวนคอยน์ที่ได้ <input type="text" name="coin" placeholder="จำนวนคอยน์ที่ได้" class="form-control" id="coin" readonly>
        <br>
       
        <button type="submit" class="btn btn-success col-12 mt-4" style="font-size:1.3rem;">ยันยันการแลกเหรียญโดเนท</button>
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
                <th>จำนวนเหรียญโดเนทที่ได้</th>
                <th><input type="checkbox" class="mr-1" onclick="selectdonate(0,this);">ทั้งหมด</th>
            </tr>
            </thead>
            <tbody>
                <?php $all =0; ?>
            
                    @foreach($donate as $key => $logs)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$logs->donate}}</td>
                            <td>{{$logs->coin}}</td>
                            <td><input type="checkbox" name="chk" value="{{$logs->coin}}" onclick="selectdonate(1,this);"></td>
                        </tr>
                        <?php $all += $logs->coin; ?>
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