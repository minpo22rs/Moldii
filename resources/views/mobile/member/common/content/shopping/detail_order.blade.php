@extends('mobile.main_layout.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('/user/myList')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
      รายละเอียดคำสั่งซื้อ
    </div>
    <div class="right"></div>
   
</div>
@endsection
@section('content')

  <div class="row">

    <div class="col-md-12 mt-5">

      <div class="container">
    
        <!-- -->
      
        <div class="card ">
          <h5 class="card-header">ได้รับคำสั่งซื้อแล้ว : {{$order->order_code}}</h5>
          <div class="card-body">
            @if($order->status_order ==1 )
              <h5 class="card-title">สถานะ : รอแจ้งชำระเงิน </h5> 
              {{-- <h6>กรุณาแจ้งชำระเงินภายใน</h6> --}}
            @else
              <h5 class="card-title">สถานะ : ชำระเงินแล้ว</h5>
            @endif
            @if($order->status_order ==1 )
              <form runat="server">
                <br>
                <input type="text" name="name" placeholder="ชื่อ-นามสกุล ของบัญชีที่ใช้ทำการโอนเงิน" class="form-control">
                <input type="hidden" name="oid" value="{{$order->order_code}}">
                <br>
                <input accept="image/*" type='file' id="imgInp" /><br><br>
                <img id="blah"  width ="40%" /><br><br>
                <button type="submit" class="btn btn-success col-md-12 btn-lg mt-2">อัพโหลดใบเสร็จรับเงิน</button>
              </form>
            @endif
          </div>
        </div>
      <!-- -->
      <br>

      <!-- -->
      <table class="table table-striped">
        <tbody>
          <tr style="background-color : #495057 ; color : #fff ;">
            <td>รายการสินค้า <br>พร้อมจัดส่ง {{date('d-m-Y', strtotime('+2 days'))}}  ถึง {{date('d-m-Y', strtotime('+5 days'))}} </td>
            <td align="right"> {{$sql->count()}} รายการ</td>
          </tr>
          @foreach($sql as $sqls)
            <tr>
              <td>{{$sqls->product_name}}</td>
              <td align="right">{{$sqls->product_price}} THB</td>
            </tr>
           
          @endforeach

          <tr>
            <td ><b>ค่าจัดส่ง</b></td>
            <td align="right"><b>{{$order->shipping_cost}} THB</b></td>
          </tr>
          <tr style="background-color : #495057 ; color : #fff ;">
            <td><b>รวมทั้งสิ้น</b></td>
            <td align="right"><b>{{number_format($order->order_total+$order->shipping_cost,2,'.',',')}} THB</b></td>
          </tr>
        </tbody>
      </table>
      <!-- -->
      <br>
      <!-- -->
      <div class="card">
        <div class="card-body">
          ที่อยู่สำหรับจัดส่ง <hr>
          <p style="color:#17a2b8;"><b>{{$order->order_address_name}}</b></p> 
          - {{$order->order_address}} {{$order->order_tumbon}} {{$order->order_district}} {{$order->order_province}} {{$order->order_postcode}} <br>
          - เบอร์โทร : {{$order->order_phone}}
        </div>
      </div>
      <!-- -->
      <br><br>
      <div class="row">
          <div class="col-6">
            <a href="{{url('/index')}}" type="button" class="btn btn-secondary btn-lg mt-2">กลับหน้าหลัก</a>
          </div>
          <div class="col-6 text-right">
            <a href="{{url('user/myList')}}"  type="button" class="btn btn-info btn-lg mt-2">รายการของฉัน</a>
          </div>
      </div>

      <br><br>
      </div> <!-- /container-->
    
        
      

      </div>
    </div>
  </div>

@endsection
@section('custom_script')
  <script>

      bottom_now(6);



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
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@endsection
