@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        คอยน์
    </div>
</div>
@endsection
@section('content')
ิ<br>
<div class="section full mt-3 mb-3">
    <div class="card bg-danger mx-3" >
        <div class="card-body p-2 pb-1">
            <div class="row justify-content-start">
                <div class="col-2">
                    <div class="m-1 ">
                        <img src="{{ asset('new_assets/icon/คอยน์.png')}}" style="width: 48px;">
                    </div>
                </div>
                <div class="col-10">
                    <div class="m-1 ml-2">
                        <div class="row">
                            จำนวนคอยน์ทั้งหมด
                        </div>
                        <div class="row mt-1 font-weight-bold" style="font-size: 22px;">
                             {{number_format($sql->customer_coin,2,'.',',')}}
                        </div>
                    </div>
                </div>
            </div>
          
            
            <a href="{{url('user/convert')}}"class="row mt-1 border-top font-weight-bold" style="color:#fff;">
                <div class="col-10 mt-2">
                    เติมคอยน์
                </div>
                <div class="col-2 mt-2 text-right">
                    <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
                </div>
            </a>
            <a href="{{url('store')}}"class="row mt-1 border-top font-weight-bold" style="color:#fff;">
                <div class="col-10 mt-2">
                    ใช้คอยน์
                </div>
                <div class="col-2 mt-2 text-right">
                    <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
                </div>
            </a>
        </div>
    </div>
</div>

   
<div class="section full mt-3 mb-3">
    <div class="row mx-3 my-3">
        <div class="col-6 text-left">
            <span class="text-dark font-weight-bold">รายการล่าสุด</span>
        </div>
        {{-- <div class="col-6 text-right">
            <span class="text-info font-weight-bold">ดูทั้งหมด</span>
        </div> --}}
    </div>

    @foreach($coin as $coins)
        
            <div class="row border-top mx-3 my-3 text-dark">
                <div class="col-6 mt-1 text-left">
                    <div class="row">
                        @if($coins->status == '1')
                            <div class="col-12"><span class="font-weight-bold" style="font-size: 18px;">เติมคอยน์</span></div>
                        @elseif($coins->status == '3')
                            <div class="col-12"><span class="font-weight-bold" style="font-size: 18px;">แลกคอยน์</span></div>
                        @else
                            <div class="col-12"><span class="font-weight-bold" style="font-size: 18px;color:red">ใช้คอยน์</span></div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12"><span>{{$coins->created_at}}</span></div>
                    </div>
                </div>
                <div class="col-6 mt-1 text-right">
                    <div class="row mt-1">
                        <div class="col-10 pr-0">
                           
                                @if($coins->status == '1')
                                    <span class="font-weight-bold" style="font-size: 18px;">+ {{number_format($coins->coin )}} คอยน์ </span>
                                @elseif($coins->status == '3')
                                    <span class="font-weight-bold" style="font-size: 18px;">+ {{number_format($coins->coin )}} คอยน์ </span>

                                @else
                                    <span class="font-weight-bold" style="font-size: 18px;color:red">- {{number_format($coins->coin )}} คอยน์ </span>
                                @endif
                        </div>
                        {{-- <div class="col-2">
                            <ion-icon name="chevron-forward-outline" style="font-size: 24px;"></ion-icon>
                        </div> --}}
                    </div>
                </div>
            </div>
            
    @endforeach
   
</div>
@endsection

@section('custom_script')
<script>
    bottom_now(7);
    var msg = "{{Session::get('msg')}}"; 
    if(msg){
        Swal.fire({
            text : msg,
            confirmButtonColor: "#fc684b",
        })
    }


    
</script>
@endsection