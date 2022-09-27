@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        หน้าเติมคอยน์
    </div>
</div>
@endsection
@section('content')
<div class="mt-3 p-2 col-md-12">
<br>
    <form action="{{url('user/submitconvert')}}" method="POST">
        @csrf
        <h3>ยอดเงินคงเหลือ : {{number_format($sql->customer_wallet,2,'.',',')}}</h3>
        <br>
        จำนวนเงินที่ต้องการแลก <input type="number" name="money" placeholder="จำนวนเงินที่ต้องการแลก" class="form-control" id="money" min="1" max="{{$sql->customer_wallet}}" onkeyup="ccoin(this.value);" required><br>
        จำนวนคอยน์ที่ได้ <input type="text" name="coin" placeholder="จำนวนคอยน์ที่ได้" class="form-control" id="coin" readonly>
        <br>
       
        <button type="submit" class="btn btn-success col-12 mt-4" style="font-size:1.3rem;">ยันยันการเติมคอยน์</button>
        {{-- <a href="#"><button type="button" class="btn btn-danger col-12 mt-2" style="font-size:1.3rem;">ยกเลิก</button></a> <!-- ให้ลิงค์กลับมาหน้าเดิม คล้ายการทำ  Reset --> --}}
    </form>

</div>

@endsection

@section('custom_script')
<script>
    bottom_now(7);

    var a = "{{Session::get('msg')}}";
    if(a){
        alert(a);
    }

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

    function ccoin(x){
        document.getElementById('coin').value = x*100;

        // var m = "{{$sql->customer_wallet}}";
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