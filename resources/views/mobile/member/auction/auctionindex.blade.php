
@extends('mobile.main_layout.main')

@section('app_header')
<style>
    
    #search_box_2 {
        width: 100%;
        height: auto;
        padding: 60px 0;
        text-align: center;
        background-color: white ;
        margin-top: 30px;
        position: sticky;
        display: none;
        transform: translateY( 0%);
        transition: transform 0.5s;
    }
    
    #search_2 {
        width: 100%;
        height: auto;
        padding: 30px 0;
        text-align: center;
        background-color: #fc684b ;
        margin-top: 30px;
        position: fixed;
        display: none;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<div class="appHeader bg-danger text-light">

    <div class="pageTitle">

    </div>
    <div class="right">

    </div>
    <div class="m-1 w-100">

        <div class="row">
            
            <div class="col-2 ">
                <div id="btn_search_2" style="cursor: pointer;"  onclick="myFunction()"  class="md hydrated bg-white text-danger rounded p-1 mt-1 mb-0 h5 text-center">
                 <img  src="{{ asset('new_assets/icon/ตัวกรอง.png')}}" >
                </div>
            </div>
            
            <div class="col-6">
                <form action="{{url('user/search')}}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group searchbox mt-1 mb-0">
                        <input type="text" name="text" class="form-control" id="input_search_1" placeholder="Search..." style="padding: 20px ">
                        <!-- <i class="input-icon" >
                            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                        </i> -->
                    </div>
                    
                </form>
            </div>
            <?php $countcart = DB::Table('tb_carts')->select(DB::raw('SUM(count) as countt'))->where('customer_id',Session::get('cid'))->first(); ?>
           
            <div class="col-2 mt-1">
                <a href="{{url('cartindex')}}" > 
                    <div class="  md hydrated  bg-white text-danger rounded p-1 mb-1 h5 text-center">
                        <!-- <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon> -->
                        <img  src="{{ asset('new_assets/icon/ตะกร้า.png')}}" >
                        <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$countcart->countt != null ?$countcart->countt:'0'}}</span> 
                    </div>
                </a>
            </div>

            <div class="col-2 mt-1">
                <a href="{{url('user/notification')}}" > 
                    <div class="  md hydrated  bg-white text-danger rounded p-1 mb-1 h5 text-center">
                        <!-- <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon> -->
                        <img  src="{{ asset('new_assets/icon/แจ้งเตือน.png')}}" >
                        <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$noti->count()+$ccomment->count()}}</span> 
                    </div>
                </a>
            </div>
            
        </div>

    </div>

    <!-- Show List Menu btn_search_2 [Start]-->
     
    <div id="search_2" >
        <div class="col-md-12 mt-2"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 
            <div style="left: 16px;  position: absolute; " class="mt-2">
                 <ion-icon name="close" onclick="myFunction()"  aria-label="search outline" ></ion-icon>
            </div><br><br>
            <div class="row" style="overflow: auto ; width: 100%; height: 450px; justify-content: center;">
              @foreach($cat as $cats)
                    <div class="text-center p-1 ">                      
                        <a href="{{url('/shopping/category/'.$cats->cat_id.'')}}"> 
                            <h4 class="mt-1" style="color:#fff;">{{$cats->cat_name}}</h4>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Show List Menu btn_search_2 [End]-->
</div>
{{-- Recent Search --}}
<div id="search_box_2">
    <h3> Recent Search</h3>

        <p> @if(Session::get('recent') != null)
                @foreach (Session::get('recent') as $text)
                    <a href="{{url('user/searcha/'. $text.'')}}">
                        {{$text}}<br>
                    </a>
                @endforeach
                
            @else
                <p style="text-align: center;">ไม่พบการค้นหาล่าสุด</p>
            @endif
        </p>
  
</div>
@endsection
   

@section('content')
<br>
    <div class="container p-1 my-3">
        {{-- @if( $chk != 0)
            <div class="col-12 row m-0 justify-content-center mt-4">
                    <p class="time">
                                        
                                        
                                            
                        <!-- hours -->
                        <span id='hour-ten-digit' class="show p-1" style="border-radius: 5px ; background-color: rgb(88, 182, 88);font-size:24px;font-weight:700;">
                        0
                        </span>
                        <span id='hour-last-digit' class="show p-1 ml-1" style="border-radius: 5px ; background-color: rgb(88, 182, 88);font-size:24px;font-weight:700;">
                        0
                        </span>
                        <span className="indicate" style="font-size: 40px">:</span>
                        
                        <!-- min -->
                        <span id='min-ten-digit' class="show p-1" style="border-radius: 5px ; background-color: rgb(88, 182, 88);font-size:24px;font-weight:700;">
                        0
                        </span>
                        <span id='min-last-digit' class="show p-1 ml-1" style="border-radius: 5px ; background-color: rgb(88, 182, 88);font-size:24px;font-weight:700;">
                        0
                        </span>
                        <span className="indicate" style="font-size: 40px">:</span>
                        
                        <!-- sec -->
                        <span id='sec-ten-digit' class="show p-1" style="border-radius: 5px ; background-color: rgb(88, 182, 88);font-size:24px;font-weight:700;">
                        0
                        </span>
                        <span id='sec-last-digit' class="show p-1 ml-1" style="border-radius: 5px ; background-color: rgb(88, 182, 88);font-size:24px;font-weight:700;">
                        0
                        </span>
                    
                    </p>
            </div>
        @endif --}}
        <div class="card-title my-1 font-weight-bold font-weight-bolder pt-2">หมวดหมู่ </div>

        <div class="col-12 pt-1  m-0" >
            <div class="row " style="overflow: auto ; width: 100%; height: 200px; justify-content: center;" >

                @foreach($cat as $cats)
                    
                    
                    <div class="text-center p-1 col-3">                      
                        <a href="{{url('/shopping/category/'.$cats->cat_id.'')}}"><img class=" rounded-circle  " src="{{('https://testgit.sapapps.work/moldii/storage/app/category_cover/'.$cats->cat_img.'')}}" alt="alt" style="width: 53px; height:53px;"></a>
                        <h6 class="mt-1">{{$cats->cat_name}}</h6>
                    </div>
            
                  
                @endforeach
            </div>
        </div>

        <br>
        <hr>
        <div class="col-12 row m-0 justify-content-center " id="dataall">
            @if( $chk != 0)
                 
                @foreach($auction as $key => $details)
                    <a href="{{url('auction/detail/'.$details->id_auction.'')}}" style="width: 50%;">
                        <div class=" card  my-2 mx-2 align-self-center justify-content-center number" id="time{{$details->id_auction}}">
                            <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$details->product_img.'')}}" alt="alt" style=" height:120px;">
                            <div class="card-body col-12 p-1 ">
                                <div class="row pl-1">
                                    <h5 class=" font-weight-bolder m-0 col-12">ชื่อ : {{$details->product_name}}</h5>
                                    <h5 class="font-weight-bolder m-0  col-12">ราคาล่าสุด: ฿ {{number_format($log[$key],2,'.',',')}} </h5>
                                    <div class="font-weight-bolder m-0  col-12" data-countdown={{$adate[$key]}}.{{$atime[$key]}} id="{{$details->id_auction}}"></div>

                                </div>
                                
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <br><br>
                    ไม่พบข้อมูลรายการสินค้าประมูล
            @endif
            <div id="nodata" style="display: none">
                <br><br>
                ไม่พบข้อมูลรายการสินค้าประมูล

            </div>

        </div>
        <br>
        <!-- align-self-center justify-content-center -->

    </div>

    <div class="modal" tabindex="-1" role="dialog" id="exp">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            {{-- <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> --}}
            <div class="modal-body text-center">
              <p>สิ้นสุดการประมูล</p>
              <a href="{{url('auction')}}" type="button" class="btn btn-primary">ปิด</a>

            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="{{url('auction')}}" type="button" class="btn btn-primary">ปิด</a>
            </div> --}}
          </div>
        </div>
    </div>



@endsection
@section('custom_script')

    <script src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>
        <script>

            bottom_now(5);
            // var chk = "{{$chk}}";

            var a = "{{Session::get('success')}}";
            if (a) {
                Swal.fire({
                    text : a,
                    confirmButtonColor: "#fc684b",
                })
            }

            const getLastDigit = (number) => {
                return number % 10;
            };

            const getTenDigit = (number) => {
                return Math.floor((number % 100) / 10);
            };

            $('[data-countdown]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                var id = $this.attr('id');
                var elemList = document.getElementsByClassName("number");
               

                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('%H:%M:%S'));
                    

                }).on('finish.countdown', function() {
                    document.getElementById('time'+id).remove();
                    if(elemList.length == 0){
                        document.getElementById('nodata').style.display ='';

                        setTimeout(function(){ 
                           window.location.reload();
                        }, 4000);
                        
                    }

                });

            });

        



            // if(parseInt(chk) != 0){
            //  
                
                
            //         // Set the date we're counting down to
            //     var countDownDate = new Date(limit).getTime();

            //         // Update the count down every 1 second
            //     var x = setInterval(function() {

            //         // Get today's date and time
            //         var now = new Date().getTime();

            //         // Find the distance between now and the count down date
            //         var distance = countDownDate - now;

            //         // Time calculations for days, hours, minutes and seconds
            //         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            //         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            //         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            //         var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            //         // Display the result in the element with id="demo"
            //         // document.getElementById("demo").innerHTML = hours + "h "
            //         // + minutes + "m " + seconds + "s ";

            //         document.getElementById('hour-ten-digit').innerHTML = getTenDigit(hours);
            //         document.getElementById('hour-last-digit').innerHTML = getLastDigit(hours);
            //         document.getElementById('min-ten-digit').innerHTML = getTenDigit(minutes);
            //         document.getElementById('min-last-digit').innerHTML = getLastDigit(minutes);
            //         document.getElementById('sec-ten-digit').innerHTML = getTenDigit(seconds);
            //         document.getElementById('sec-last-digit').innerHTML = getLastDigit(seconds);



            //         // If the count down is finished, write some text
            //         if (distance < 0) {
            //             clearInterval(x);
            //             document.getElementById('hour-ten-digit').innerHTML = '0';
            //             document.getElementById('hour-last-digit').innerHTML ='0';
            //             document.getElementById('min-ten-digit').innerHTML = '0';
            //             document.getElementById('min-last-digit').innerHTML ='0';
            //             document.getElementById('sec-ten-digit').innerHTML = '0';
            //             document.getElementById('sec-last-digit').innerHTML ='0';
            //             $('#exp').modal('show');
            //             // window.location.replace("{{url('auction')}}");
            //             // document.getElementById("demo").innerHTML = "EXPIRED";
            //         }
            //     }, 1000);

            // }


        </script>

       
@endsection
    
