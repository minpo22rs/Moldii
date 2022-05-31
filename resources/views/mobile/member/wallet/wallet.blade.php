@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        Wallet
    </div>
</div>
@endsection
@section('content')
<div class="section full mt-3 mb-3">
    <div class="card bg-danger mx-3" >
        <div class="card-body p-2 pb-1">
            <div class="row justify-content-start">
                <div class="col-2">
                    <div class="m-1 ">
                        <img src="{{ asset('new_assets/img/icon/wallet-filled-money-tool.svg')}}" style="width: 48px;">
                    </div>
                </div>
                <div class="col-10">
                    <div class="m-1 ml-2">
                        <div class="row">
                            จำนวนเงินทั้งหมด
                        </div>
                        <div class="row mt-1 font-weight-bold" style="font-size: 22px;">
                            THB {{number_format($sql->customer_wallet,2,'.',',')}}
                        </div>
                    </div>
                </div>
            </div>
          
            <a href="{{url('user/addMoney')}}"class="row mt-1 border-top font-weight-bold" style="color:#fff;">
                <div class="col-10 mt-2">
                    เติมเงินเพื่อใช้ในการชำระ
                </div>
                <div class="col-2 mt-2 text-right">
                    <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
                </div>
            </a>
        </div>
    </div>
</div>

                      



{{-- <div class="section full mt-3 mb-3">
    <div class="card bg-success mx-3" style="/* background-color: #005476; */ color: white;">
        <div class="card-body p-1">
            <div class="row font-weight-bold" style="height:2rem;">
                <div class="col-2 text-right">
                    <i class="fal fa-credit-card" style="font-size: 32px;" class="md hydrated"></i>

                </div>
                <div class="col-8 align-self-center">
                    <h5 class="m-0" style="color:#fff;">เพิ่มบัตร</h5>
                    <h6 class="m-0" style="color:#fff;">ชำระเงินด้วยบัตรเครดิต หรือบัตรเดบิต</h6>

                </div>
                <div class="col-2 text-right align-self-center">
                    <i class="far fa-angle-right" style="font-size:1.5rem;"></i>


                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="section full mt-3 mb-3">
    <div class="row mx-3 my-3">
        <div class="col-6 text-left">
            <span class="text-dark font-weight-bold">รายการล่าสุด</span>
        </div>
        {{-- <div class="col-6 text-right">
            <span class="text-info font-weight-bold">ดูทั้งหมด</span>
        </div> --}}
    </div>

    @foreach($p as $ps)
        @if($ps->payment_type == 'OUT')
            <div class="row border-top mx-3 my-3 text-dark">
                <div class="col-6 mt-1 text-left">
                    <div class="row">
                        <div class="col-12"><span class="font-weight-bold" style="font-size: 18px;">ชำระค่าสินค้า</span></div>
                    </div>
                    <div class="row">
                        <div class="col-12"><span>{{$ps->created_at}}</span></div>
                    </div>
                </div>
                <div class="col-6 mt-1 text-right">
                    <div class="row mt-1">
                        <div class="col-10 pr-0">
                            <span class="font-weight-bold" style="font-size: 18px;">
                                THB {{number_format($ps->amount )}}
                            </span>
                        </div>
                        {{-- <div class="col-2">
                            <ion-icon name="chevron-forward-outline" style="font-size: 24px;"></ion-icon>
                        </div> --}}
                    </div>
                </div>
            </div>
        @else
            <div class="row border-top mx-3 my-3 text-dark">
                <div class="col-6 mt-1 text-left">
                    <div class="row">
                        <div class="col-12"><span class="font-weight-bold" style="font-size: 18px;">เติมเงิน</span></div>
                    </div>
                    <div class="row">
                        <div class="col-12"><span>{{$ps->created_at}}</span></div>
                    </div>
                </div>
                <div class="col-6 mt-1 text-right">
                    <div class="row mt-1">
                        <div class="col-10 pr-0">
                            <span class="font-weight-bold text-success" style="font-size: 18px;">
                                THB +{{number_format($ps->amount )}}
                            </span>
                        </div>
                        {{-- <div class="col-2">
                            <ion-icon name="chevron-forward-outline" style="font-size: 24px;"></ion-icon>
                        </div> --}}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
   
</div>
@endsection

@section('custom_script')
<script>
    bottom_now(7);
    var msg = "{{Session::get('msg')}}"; 
    if(msg){
        alert(msg);
    }
</script>
@endsection