
@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('/')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">

    </div>
    <div class="center mt-1 ">ร้านค้า </div>
  
</div>
@endsection

@section('content')

<div class="col-md-12  mt-3 ">
    <div class="container">
        <div class="row justify-content-between">
                    <div class="row px-2">
                        <img src="{{('https://www.คนละครึ่ง.com/assets/img/img-merchant.png ')}}" alt="alt" class=" rounded-circle  " style="width: 50px; height:50px;">

                        <div class="card-title  align-self-center m-0 ml-1 ">
                            <h3 class=" m-0 p-0"><b>ชื่อร้าน</b></h3>
                            <h6 class=" m-0 p-0" style="color: #A0A0A0;">จังหวัดกรุงเทพมหานคร</h6>
                        </div>
                    </div>

                    <div class="right">
                         <button type="button" class="btn  btn-sm rounded shadowed  mr-1 p-1 align-self-center " style="width: 48px; height: 15px; background: #FF5C63; color: white; font-size:10px;">ติดตาม</button><br>
                         <button type="button" class="btn  btn-sm rounded shadowed  mr-1 p-1 align-self-center " style="width: 48px; height: 15px; background: #E5E6E7; color: white; font-size:10px;">พูดคุย</button>
                    </div>
        </div>

        <div class="row text-center mt-1 ">
            <div class="col-4 p-1 line-con align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">500</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">รายการสินค้า</h6>
                <div class="line my-1"></div>
            </div>

            <div class="col-4 p-1 align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">4.1</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">คะแนน</h6>
                <div class="line my-1"></div>
            </div>

            <div class="col-4 p-1 align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">82%</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">การตอบกลับแขก</h6>
            </div>
        </div>
        
        <!-- <div class="carousel-multiple owl-carousel mt-2 " > 
                        <div  class="item ">
                              <a href="#">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 91px; height: 38px; background: #FF5C63; color: white; font-size:15px; border-radius: 12px;">สำหรับคุณ</button> </a>            
                        </div>                    
                        <div  class="item ">
                              <a href="#">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 103px; height: 38px; background: #FBFCF9; color: #132D2F; font-size:15px; border-radius: 12px;">รายการสินค้า</button> </a>             
                        </div>                    
                        <div  class="item ">
                              <a href="#">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 64px; height: 38px; background: #FBFCF9; color: #132D2F; font-size:15px; border-radius: 12px;">มาใหม่</button> </a>             
                        </div>                    
                        <div  class="item ">
                              <a href="#">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 79px; height: 38px; background: #FBFCF9; color: #132D2F; font-size:15px; border-radius: 12px;">หมวดหมู่</button> </a>             
                        </div>                    
        </div> -->
        
  <div class="mt-2 " align="center" >
        <a href="{{url('shopping/store_7/')}}">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 81px; height: 38px; background: #FBFCF9; color: #132D2F; font-size:13px; border-radius: 15px;">สำหรับคุณ</button> </a>                        
                       
        <a href="{{url('shopping/store_8/')}}">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 93px; height: 38px; background: #FF5C63; color: white; font-size:13px; border-radius: 15px;">รายการสินค้า</button> </a>             
                    
        <a href="{{url('shopping/store_9/')}}">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 54px; height: 38px; background: #FBFCF9; color: #132D2F; font-size:13px; border-radius: 15px;">มาใหม่</button> </a>             

        <a href="{{url('shopping/store_10/')}}">  <button type="button" class="btn  btn-sm  mr-1 p-1 align-self-center " style="width: 69px; height: 38px; background: #FBFCF9; color: #132D2F; font-size:13px; border-radius: 15px;">หมวดหมู่</button> </a>             
</div>    

<div class="col-12 row m-0 justify-content-center mt-2 mb-3 ">
<?php for($i = 1 ; $i <= 8 ; $i++ ){ ?>
    <a href="#" style="width: 50%;">
        <div class=" card  my-2 mx-2 align-self-center justify-content-center">
            <img class="imaged w-100 card-image-top mt-1" src="{{('https://mpics.mgronline.com/pics/Images/564000010524001.JPEG')}}" alt="alt" style=" height:120px;">
            <div class="card-body col-12 p-1 ">
                <div class="row pl-1">
                    <h5 class=" font-weight-bolder m-0">ชื่อสินค้า</h5>
                </div>
                <div class=" row ">
                    <h6 class="mt-1 pl-1 m-0 col-6" style=" color:#E81F12;">฿ 250</h6>
                    <!-- {{-- <h6 class="mt-1 pl-1 m-0 col-6">฿350 ฿250</h6> --}} -->
                    <div class="pl-2">
                        <h6 class="m-0"><small>ขายได้ 100 ชิ้น</small></h6>
                        <div class="rating-system2">

                            <input type="radio" name='rate2' id="star5_2" />
                            <label for="star5_2"></label>

                            <input type="radio" name='rate2' id="star4_2" />
                            <label for="star4_2"></label>

                            <input type="radio" name='rate2' id="star3_2" />
                            <label for="star3_2"></label>

                            <input type="radio" name='rate2' id="star2_2" />
                            <label for="star2_2"></label>

                            <input type="radio" name='rate2' id="star1_2" />
                            <label for="star1_2"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
<?php } ?>
</div>

    </div> <!-- container -->
</div> <!-- col-md-12  mt-3 -->


@endsection

