
@extends('mobile.main_layout.main')

@section('app_header')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.history.back();">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        รายการกลุ่มของฉัน
    </div>
    <div class="right"></div>
    
</div>
@endsection


@section('content')
<br>

    <div class="container p-1 my-3">
        <div class="col-12 row m-0 justify-content-center ">
            
           
                @foreach($group as $groups)
                    <a href="{{url('groupid/'.$groups->id.'')}}" style="width: 50%;">
                        <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                            @if($groups->created_by == 0)
                                <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$groups->group_img.'')}}" alt="alt" style=" height:120px;">
                            @else
                                <img class="imaged w-100 card-image-top mt-1" src="{{asset('storage/group/'.$groups->group_img.'')}}" alt="alt" style=" height:120px;">
                            @endif
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

            bottom_now(7);


            var a = "{{Session::get('success')}}";
            if (a) {
                Swal.fire({
                    text : a,
                    confirmButtonColor: "#fc684b",
                })
            }



        </script>

       
@endsection
    
