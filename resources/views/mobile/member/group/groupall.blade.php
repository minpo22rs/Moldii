
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
<br>
    <div class="container p-1 my-3">
       <h3 class="text-center">รายการกลุ่มทั้งหมด</h3>
        <div class="col-12 row m-0 justify-content-center ">
         
                 
                @foreach($group as $groups)
                    <a href="{{url('groupid/'.$groups->id.'')}}" style="width: 50%;">
                        <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                            <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$groups->group_img.'')}}" alt="alt" style=" height:120px;">
                            <div class="card-body col-12 p-1 ">
                                <div class="row pl-1">
                                    <h5 class=" font-weight-bolder m-0">{{$groups->name}}</h5>
                                    {{-- <h5 class="font-weight-bolder m-0 ml-5">{{$groups->product_price}}</h5> --}}
                                </div>
                                
                            </div>
                        </div>
                    </a>
                @endforeach
            

        </div>

        <!-- align-self-center justify-content-center -->

    </div>


@endsection
@section('custom_script')
        <script>

            bottom_now(4);


            var a = "{{Session::get('success')}}";
            if (a) {
                Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
            }

           

        </script>

       
@endsection
    
