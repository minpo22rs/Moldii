
@extends('mobile.main_layout.main')

@section('app_header')
<div class="appHeader bg-danger text-light">
    {{-- <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div> --}}
    <div class="pageTitle">
        รายการสินค้าประมูล
    </div>
</div>
@endsection
    

@section('content')
    <div class="container p-1 my-3">
        @if( $chk != 0)
            <div class="col-12 row m-0 justify-content-center ">
                {{-- <p id="demo"></p> --}}
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
        @endif
        <div class="col-12 row m-0 justify-content-center ">
            @if( $chk != 0)
                 
                @foreach($detail as $details)
                    <a href="{{url('auction/detail/'.$details->id_auction_detail.'')}}" style="width: 50%;">
                        <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                            <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$details->product_img.'')}}" alt="alt" style=" height:120px;">
                            <div class="card-body col-12 p-1 ">
                                <div class="row pl-1">
                                    <h5 class=" font-weight-bolder m-0">{{$details->product_name}}</h5>
                                    <h5 class="font-weight-bolder m-0 ml-5">{{$details->product_price}}</h5>
                                </div>
                                {{-- <div class=" row ">
                                    <h6 class="mt-1 pl-1 m-0 col-6">{{$details->product_price}}</h6>
                                    <p class="time">
                                       
                                       
                                        
                                        <!-- hours -->
                                        <span id='hour-ten-digit' class="show">
                                          0
                                        </span>
                                        <span id='hour-last-digit' class="show">
                                          0
                                        </span>
                                        <span className="indicate">:</span>
                                        
                                        <!-- min -->
                                        <span id='min-ten-digit' class="show">
                                          0
                                        </span>
                                        <span id='min-last-digit' class="show">
                                          0
                                        </span>
                                        <span className="indicate">:</span>
                                        
                                        <!-- sec -->
                                        <span id='sec-ten-digit' class="show">
                                          0
                                        </span>
                                        <span id='sec-last-digit' class="show">
                                          0
                                        </span>
                                       
                                      </p>
                                    {{-- <h6 class="mt-1 pl-1 m-0 col-6 text-danger text-right result" >00:00:25</h6> 
                                    
                                </div> --}}
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                    ไม่พบข้อมูล
            @endif

        </div>

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
        <script>

            bottom_now(5);
            var chk = "{{$chk}}";

            var a = "{{Session::get('success')}}";
            if (a) {
                alert(a);
            }

            const getLastDigit = (number) => {
                return number % 10;
            };

            const getTenDigit = (number) => {
                return Math.floor((number % 100) / 10);
            };



            if(parseInt(chk) != 0){
                var limit = "{{$limit}}";
                
                
                    // Set the date we're counting down to
                var countDownDate = new Date(limit).getTime();

                    // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="demo"
                    // document.getElementById("demo").innerHTML = hours + "h "
                    // + minutes + "m " + seconds + "s ";

                    document.getElementById('hour-ten-digit').innerHTML = getTenDigit(hours);
                    document.getElementById('hour-last-digit').innerHTML = getLastDigit(hours);
                    document.getElementById('min-ten-digit').innerHTML = getTenDigit(minutes);
                    document.getElementById('min-last-digit').innerHTML = getLastDigit(minutes);
                    document.getElementById('sec-ten-digit').innerHTML = getTenDigit(seconds);
                    document.getElementById('sec-last-digit').innerHTML = getLastDigit(seconds);



                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById('hour-ten-digit').innerHTML = '0';
                        document.getElementById('hour-last-digit').innerHTML ='0';
                        document.getElementById('min-ten-digit').innerHTML = '0';
                        document.getElementById('min-last-digit').innerHTML ='0';
                        document.getElementById('sec-ten-digit').innerHTML = '0';
                        document.getElementById('sec-last-digit').innerHTML ='0';
                        $('#exp').modal('show');
                        // window.location.replace("{{url('auction')}}");
                        // document.getElementById("demo").innerHTML = "EXPIRED";
                    }
                }, 1000);

            }


        </script>

       
@endsection
    
