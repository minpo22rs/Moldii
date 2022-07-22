
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


        <div class="col-12 row m-0 justify-content-center ">
            @if( $chk != 0)

                @foreach($detail as $details)
                    <a href="{{url('auction/detail/'.$details->product_id.'/'.$details->id_auction_detail.'')}}" style="width: 50%;">
                        <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                            <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$details->product_img.'')}}" alt="alt" style=" height:120px;">
                            <div class="card-body col-12 p-1 ">
                                <div class="row pl-1">
                                    <h5 class=" font-weight-bolder m-0">{{$details->product_name}}</h5>
                                </div>
                                <div class=" row ">
                                    <h6 class="mt-1 pl-1 m-0 col-6">{{$details->product_price}}</h6>
                                    <h6 class="mt-1 pl-1 m-0 col-6 text-danger text-right result" >00:00:25</h6>
                                    
                                </div>
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

@endsection

@section('custom_script')
        <script>

            bottom_now(5);


            var a = "{{Session::get('success')}}";
            if (a) {
                alert(a);
            }


            let c = 25;
            var counter = setInterval(() => {
                var names = document.getElementsByClassName('result');

                for (var i = 0; i < names.length; i++) {
                    names[i].innerText = '00:00:'+c;
                    // or
                    // names[i].querySelector('i').textContent += ' Changed...'
                }

                // document.getElementsByClassName("result").innerHTML = '00:00:'+c;
                c--;
                if( c == -1 ) {
                    clearInterval( counter );
                    for (var i = 0; i < names.length; i++) {
                        names[i].innerHTML = 'Finish';
                        // or
                        // names[i].querySelector('i').textContent += ' Changed...'
                    }
                    // document.getElementsByClassName("result").innerHTML = "Finish";
                }
            }, 1000);

        </script>

       
@endsection
    
