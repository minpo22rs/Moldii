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
            <h5 class="card-title">สถานะ : รอชำระเงิน</h5>
            <p class="card-text">ชำระเงิน 300 บาท ก่อนวันที่ 12 / 11 / 2556</p>
            <p class="card-text">กสิกร : 1121-1215-1212-2-21</p> <!-- หรือจะใส่เป็นรูปก็ได้-->
            <form runat="server">
              <input accept="image/*" type='file' id="imgInp" /><br><br>
              <img id="blah"  width ="40%" /><br><br>
              <button type="submit" class="btn btn-success col-md-12 btn-lg mt-2">อัพโหลดใบเสร็จรับเงิน</button>
            </form>
          </div>
        </div>
      <!-- -->
      <br>

      <!-- -->
      <table class="table table-striped">
        <tbody>
          <tr style="background-color : #17a2b8 ; color : #fff ;">
            <td>รอชำระเงิน - พร้อมจัดส่ง 23 Jul 2022 ถึง 25 Jul 2022</td>
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
            <td align="right"><b>50 THB</b></td>
          </tr>
          <tr style="background-color : #17a2b8 ; color : #fff ;">
            <td><b>รวมทั้งสิ้น</b></td>
            <td align="right"><b>550 THB</b></td>
          </tr>
        </tbody>
      </table>
      <!-- -->
<br>
      <!-- -->
      <div class="card">
        <div class="card-body">
          ที่อยู่สำหรับจัดส่ง <hr>
          <p style="color:#17a2b8;"><b>Name User </b></p> 
          - 92/2 หมู๋บ้าน หนองหิน ต.ศรีโคตร อ.จตุรพักพิมาน จ.สารคาม 45180 <br>
          - เบอร์โทร : 063 004 9185
        </div>
      </div>
      <!-- -->
      <br><br>

      </div> <!-- /container-->
    
        
      

      </div>
    </div>
  </div>

@endsection
@section('custom_script')
  <script>

      bottom_now(6);
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
