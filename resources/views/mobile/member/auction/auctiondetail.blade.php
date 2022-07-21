@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('auction')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">

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
    <div class="row">
        <div class="row justify-content-between w-100 p-1  mx-2">
            <h3 class="mb-0">{{$product->product_name}}</h3>
            <p class="text-danger">ราคาปัจจุบัน {{$product->product_price}}</p>
            <div id="result">00:00:25</div>
        </div>
        {{-- <div class="row justify-content-between w-100 px-2 mx-2">
           
            <div class="row pr-1 align-self-center" style="font-size: 18px;">
                
               ราคาปัจจุบัน {{$product->product_price}}
                
                
               
            </div>
            

        </div> --}}

{{--        
        @if($product->product_discount!=null)
            <div class="row justify-content-between w-100 px-2 mx-2">
                <h5 class="mb-0 font-weight-bold" style="color:rgba(180, 182, 186, 1);"><s>฿{{$product->product_price}}</s></h5>
                <div class="row pr-1" style="font-size: 18px;">
                    <h6 class="m-0"> ขายได้ {{$detail->count()}} ชิ้น</h6>
                </div>
            </div>
        @else
            <div class="row justify-content-between w-100 px-2 mx-2">
                <div class="row pr-1" style="font-size: 18px;">
                    <h6 class="m-0 pl-1"> ขายได้ {{$detail->count()}} ชิ้น</h6>
                </div>
            </div>
        @endif
       --}}

    </div>
  
    {{-- merchant --}}
    <div class="col-12">
        
        <hr class="my-1">
        <div class="col-12 p-1  ">
            รายละเอีดสินค้า
            <h4 class="text-break ">{{$product->product_description}}</h4>
           
            <h4 class="text-break ">น้ำหนัก : {{$product->weight}}</h4>
           
            <h4 class="text-break ">ความกว้าง : {{$product->width}}</h4>
           
            <h4 class="text-break ">ความสูง : {{$product->height}}</h4>
           
            <h4 class="text-break ">ความยาว : {{$product->length}}</h4>
            
            {{-- <a href="" class="text-center">
                <h6 class="   m-0 font-weight-bold" style="color: rgba(255, 92, 99, 1);">เพิ่มเติม</h6>
            </a> --}}
        </div>
        <hr class="my-1">
        <div class="row justify-content-between  p-1">
            {{-- <h3 class="font-weight-bold mb-0 align-self-center">จำนวน</h3> --}}
            <?php $p = number_format($auction->price+$auction->bit,2,'.','');?>
            <div class="stepper stepper-dark align-self-center" style="font-size: 28px; ">
                <a href="#" class=" stepper-downs align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-minus-circle"></i></a>
                <input type="text" class="form-control font-weight-bold " value="{{$p}}" readonly style="border:none;" name="count" />
                <a href="#" class=" stepper-ups align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-plus-circle "></i></a>
            </div>
            <button class="btn btn-info" id="buy-goods">ประมูลเลย</button>

        </div>
        
        <br>
       

    </div>


</div>

@endsection
@section('choice')

<div class="" id="buy_goods_container">

    <div class="buy-good-box p-2" id="buy_goods_box">
       
        <hr class="my-2 ">
            <form action="{{url('cart')}}" method="POST" id="formcart">
                @csrf
                <input type="hidden" name="back" value="1" id="backpage">
                <input type="hidden" name="id" value="{{$product->product_id}}">

               
                <hr class="my-2 ">
                <div class="row justify-content-around p-1 ">

                    
                        <div class="row col-11  mt-2 p-0">
                            <button type="submit" id="off_share_btn" class="btn  btn-block font-weight-bold" style="background-color:rgba(80, 202, 101, 1); color:#FFF; font-size:15px; border-radius: 8px;">
                               ซื้อสินค้า
                            </button>

                        </div>
                    
                </div>
            </form>
    </div>


</div>

@endsection

@section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }

        var p = "{{$auction->price}}";
        var b = "{{$auction->bit}}";
        var min = parseInt(p)+parseInt(b);
        function subcart(){
            document.getElementById('backpage').value =2;
            $('#formcart').submit();
        }

        $("body").on("click", ".stepper-ups", function () {
            var valueInput = $(this).parent(".stepper").children(".form-control");
            valueInput.val((parseInt(valueInput.val()) + parseInt(b)).toFixed(2));
        });
        $("body").on("click", ".stepper-downs", function () {
      
            var valueInput = $(this).parent(".stepper").children(".form-control");
            if (parseInt(valueInput.val()) < min) {
                
            }
            else{
                valueInput.val((parseInt(valueInput.val()) - b).toFixed(2));
            }
        });
       

        let c = 25;
        var counter = setInterval(() => {

            document.getElementById("result").innerHTML = '00:00:'+c;
            c--;
            if(c <10){
                document.getElementById("result").innerHTML = '00:00:0'+c;
                
            }
            if( c == -1 ) {
                clearInterval( counter );
                document.getElementById("result").innerHTML = "Finish";

            }
        }, 1000);

   
        bottom_now(5);
    </script>
@endsection