@extends('mobile.main_layout.main')
@section('app_header')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('auction')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        การประมูล
    </div>
    <div class="right"></div>
    <!-- <div class="m-1 w-100">

            <div class = "row">
                <div class = "col-10">
                    <form class="search-form">
                        <div class="form-group searchbox mt-1 mb-0">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="input-icon">
                                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                            </i>
                        </div>
                    </form>
                </div>
                <div class = "col-2">
                    <ion-icon   name="funnel"  
                                class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5"  
                                
                                role="img" aria-label="search outline">
                    </ion-icon>
                </div>
            </div>
            
        </div> -->
</div>
@endsection

@section('content')
<div class="m-1 shopping-container">
    <div class="section full mt-3 mb-3">
        <div class="carousel-full owl-carousel owl-theme">
            @if($imggal->count()>0)
                @foreach($imggal as $imggals)
                    <div class="item">
                    
                        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_img/'.$imggals->img_name.'')}}" alt="alt" class="imaged w-100 square">
                    </div>
                @endforeach
            @else
                <div class="item">
                        
                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$product->product_img.'')}}" alt="alt" class="imaged w-100 square">
                </div>
            @endif
        
           
        </div>
    </div>
    {{-- ราคาปัจจุบัน --}}
    <div class="row">
        <div class="row justify-content-between w-100 p-1  mx-2">
            <h3 class="mb-0">{{$product->product_name}}</h3>
            <h3 class="text-danger" id="pricenow">ราคาปัจจุบัน {{$log->count()!=0?$log[0]->price:$auction->price}}</h3>
            <p class="time">
                <br>
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
       

    </div>
  
   
    <div class="col-12">
        <hr class="my-1">
        {{-- <form action="{{url('addauction')}}" method="POST">
            @csrf --}}
            @csrf 
            <div class="row justify-content-between  p-1" id="divbit">
                {{-- <h3 class="font-weight-bold mb-0 align-self-center">จำนวน</h3> --}}
                <?php   $p = 0;
                        if($log->count()!=0){
                            $p = $log[0]->price+$auction->bit;
                        }else{
                            $p = $auction->price+$auction->bit;
                        }
                
                ?>
                <div class="stepper stepper-dark align-self-center" style="font-size: 32px; ">
                    <a href="#" class=" stepper-downs align-self-center " style="color:rgba(0, 0, 0, 1);"><i class="far fa-minus-circle"></i></a>
                    <input type="number" class="form-control font-weight-bold " value="{{$p}}" id="bitcount" style="border:none;font-size: 24px;width:100px" name="count" />
                    <a href="#" class=" stepper-ups align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-plus-circle "></i></a>
                </div>
                <button class="btn btn-info" onclick="updateDiv();">ประมูลเลย</button>
                <input type="hidden" name="pid" id="pid" value="{{$product->product_id}}">
                <input type="hidden" name="adid" id="adid" value="{{$detail->id_auction_detail}}">
                <input type="hidden" name="aid" id="aid" value="{{$auction->id_auction}}">

            </div>
        {{-- </form> --}}

        {{-- <button class="btn btn-info" onclick="updateDiv();">button</button> --}}


        {{-- <div id="here">
            tested
        </div> --}}
        @if($log->count()!=0)
            <hr class="my-1">
            <div class="col-12 p-1  " id="here">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>ราคา</th>
                        <th>เวลา</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($log as $key => $logs)
                            <?php $u = DB::Table('tb_customers')->where('customer_id',$logs->customer_id)->first();?>
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$u->customer_username}}</td>
                                <td>{{$logs->price}}</td>
                                <td>{{ $logs->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <hr class="my-1">
        <div class="col-12 p-1  ">
            รายละเอียดสินค้า
            <h4 class="text-break ">{{$product->product_description}}</h4>
           
            <h4 class="text-break ">น้ำหนัก : {{$product->weight}} กรัม</h4>
           
            <h4 class="text-break ">ความกว้าง : {{$product->width}} เซนติเมตร</h4>
           
            <h4 class="text-break ">ความสูง : {{$product->height}} เซนติเมตร</h4>
           
            <h4 class="text-break ">ความยาว : {{$product->length}} เซนติเมตร</h4>
            
        </div>
        <hr class="my-1">
        
        <br>
       

    </div>


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
          <p id="text_exp">สิ้นสุดการประมูล</p>
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

        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }

        var p = "{{$minbit}}";
        var b = "{{$auction->bit}}";
        var limit = "{{$limit}}";
        var countDownDate = new Date(limit).getTime();
        // Set the date we're counting down to
        var _token = $('input[name="_token"]').val();
        var pid = document.getElementById('pid').value ;
        var adid = document.getElementById('adid').value ;
        var aid = document.getElementById('aid').value ;
        var min = parseInt(p)+parseInt(b);
        

        $(".stepper-ups").on("click", function () {
            var valueInput = document.getElementById('bitcount').value;
            document.getElementById('bitcount').value = (parseInt(valueInput) + parseInt(b));
            // var valueInput = document.getElementById('bitcount').value;
            // valueInput.val((parseInt(valueInput.val()) + parseInt(b)));
        });
        $(".stepper-downs").on("click", function () {
           
            var valueInput = document.getElementById('bitcount').value;
            if (parseInt(valueInput) <= min) {
                // valueInput.val(parseInt(min));
                document.getElementById('bitcount').value = (parseInt(min));
                
            }
            else{
                // valueInput.val((parseInt(valueInput.val()) - b));
                document.getElementById('bitcount').value = (parseInt(valueInput) - b);
            }
        });

        function updateDiv()
        { 
           
            var bitcount = document.getElementById('bitcount').value ;

            $.ajax({
                url: '{{ url("/addauction")}}',
                type: 'POST',
                dataType: 'HTML',
                data: {'pid':pid,'adid':adid,'aid':aid,'count':bitcount,'_token':_token},
                success: function(data) {
                    var json = JSON.parse(data);
                    limit = json['limit'];
                    console.log(limit);
                    document.getElementById('pricenow').innerHTML = 'ราคาปัจจุบัน '+json['now'];

                    document.getElementById('bitcount').value = json['bit'];
                    $( "#here" ).load(window.location.href + " #here" );
                    // $( "#here" ).load(window.location.href + " #here" );

                    // $( "#divbit" ).load(window.location.href + " #divbit" );
                }
            });

            
        }

       
        const getLastDigit = (number) => {
            return number % 10;
        };

        const getTenDigit = (number) => {
            return Math.floor((number % 100) / 10);
        };



           
        
        
          

            // Update the count down every 1 second
        var x = setInterval(function() {
            countDownDate = new Date(limit).getTime();
            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;
                // console.log(distance);
            // Time calculations for days, hours, minutes and seconds
            // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
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
                $.ajax({
                    url: '{{ url("/checkauction")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'pid':pid,'adid':adid,'aid':aid},
                    success: function(data) {
                        if(data==1){
                            document.getElementById('text_exp').innerHTML ='คุณชนะการประมูล ตรวจสอบสินค้าได้ที่ตระกร้า';
                            $('#exp').modal('show');

                        }else{
                            $('#exp').modal('show');

                        }
                       
                    }
                });
            }
        }, 1000);

            

   
    </script>
@endsection