@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ช่องทางการชำระเงิน
    </div>
</div>
@endsection
@section('content')
<br>
<div class="container m-0 p-0">




    <ul class="listview link-listview mb-2">

        {{-- บัตรเคดิต/บัตรเดบิต --}}
        <li class="multi-level">
            <a href="#" class="item">
                <h5 class="m-0  font-weight-bold align-self-center">บัตรเคดิต/บัตรเดบิต</h5>
                <div class="row">
                    <span class="font-weight-bold align-self-center mr-2" style="color:rgba(84, 84, 84, 1);">{{$on!=null?'*'.$on->num:''}}</span>


                </div>

            </a>
            <!-- sub menu -->
            <ul class="listview image-listview pb-0">
                @if($on != null)
                    <li>
                        <a href="{{url('selectpaymentmethod/1/'.$on->num.'')}}" class="item border-top pr-3">
                            @if($on->typecard == 'VIS')
                                <img src="{{ asset('new_assets/img/icon/logo_visa.svg')}}" alt="image" class="image mr-1">
                            @else
                                <img src="{{ asset('new_assets/img/icon/MasterCard_big.svg')}}" alt="image" class="image mr-1">
                            @endif
                            <div class="in" >
                                <h5 class="m-0  font-weight-bold align-self-center"></h5>
                                <div class="row">
                                    <span class="font-weight-bold align-self-center mr-1" style="color:rgba(84, 84, 84, 1);">*{{$on->num}}</span>
                                    <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.4rem; height:1.4rem;" class=" p-0 align-self-center"><br>

                                </div>

                            </div>
                        </a>
                    </li>
                @endif
                @foreach($off as $sqls)
                    <li>
                        <a href="{{url('selectpaymentmethod/1/'.$sqls->num.'')}}" class="item border-top pr-3">
                            @if($sqls->typecard == 'VIS')
                                <img src="{{ asset('new_assets/img/icon/logo_visa.svg')}}" alt="image" class="image mr-1">
                            @else
                                <img src="{{ asset('new_assets/img/icon/MasterCard_big.svg')}}" alt="image" class="image mr-1">
                            @endif

                            <div class="in" style="margin-right: 22px;">
                                <h5 class="m-0  font-weight-bold align-self-center"></h5>
                                <div class="row">
                                    <span class="font-weight-bold align-self-center mr-1" style="color:rgba(84, 84, 84, 1);">*{{$sqls->num}}</span>
                                    {{-- <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.4rem; height:1.4rem;" class=" p-0 align-self-center"><br> --}}

                                </div>

                            </div>
                        </a>
                    </li>
                @endforeach
                    
                <li>
                    <a href="{{url('user/addCreditCard_2')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/plus_2.svg')}}" alt="image" style="height:1.5rem;" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-normal align-self-center">เพิ่มบัตรเครดิต/บัตรเดบิต</h5>


                        </div>
                    </a>
                </li>

            </ul>
            <!-- * sub menu -->
        </li>

        {{-- Mobile Banking --}}
        <li class="multi-level">
            <a href="#" class="item">
                <h5 class="m-0  font-weight-bold align-self-center">Mobile Banking</h5>
               

            </a>
            <!-- sub menu -->
            <ul class="listview image-listview pb-0">

                <li>
                    <a href="{{url('selectpaymentmethod/2/004')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/Kplus.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">KPLUS </h5>
                           

                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('selectpaymentmethod/2/014')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/SCB.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">SCB EASY </h5>
                           

                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('selectpaymentmethod/2/002')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/logo_bangkok.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">BualuangM </h5>
                           

                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('selectpaymentmethod/2/025')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/Krungsri.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">Krungsri</h5>
                            

                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('selectpaymentmethod/2/006')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/logo_krungthai.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">Krungthai Next</h5>
                            

                        </div>
                    </a>
                </li>
               

            </ul>
            <!-- * sub menu -->
        </li>

        {{-- Wallet --}}
        <li class="multi-level">
            <a href="#" class="item">
                <h5 class="m-0  font-weight-bold align-self-center">Wallet</h5>
               

            </a>
            <!-- sub menu -->
            <ul class="listview image-listview pb-0">

                {{-- <li>
                    <a href="{{url('selectpaymentmethod/3/0')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/Wechat.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">Wechat Pay </h5>
                           

                        </div>
                    </a>
                </li> --}}
               
                <li>
                    <a href="{{url('selectpaymentmethod/4/0')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/Turemoney.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">TrueMoney Wallet </h5>
                           

                        </div>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{url('selectpaymentmethod/5/0')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/Shopee.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">ShopeePay</h5>
                            

                        </div>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{url('selectpaymentmethod/6/0')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/logo_bank/Rabbit.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">Rabbit Line Pay </h5>
                           

                        </div>
                    </a>
                </li> --}}
               

            </ul>
            <!-- * sub menu -->
        </li>

        {{-- moldii wallet --}}
        <li>
            @if($user->customer_wallet == 0)
                <a href="" style="background-color: lightgray">
                    <h5 class="m-0  font-weight-bold align-self-center">Moldii wallet</h5>
                    <div class="row">
                        <span class="font-weight-bold align-self-center mr-2" style="color:rgba(84, 84, 84, 1);">{{number_format($user->customer_wallet,2,'.',',');}}</span>

                    </div>
                    
                </a>
            @else
                <a href="{{url('selectpaymentmethod/7/0')}}" >
                    <h5 class="m-0  font-weight-bold align-self-center">Moldii wallet</h5>
                    <div class="row">
                        <span class="font-weight-bold align-self-center mr-2" style="color:rgba(84, 84, 84, 1);">{{number_format($user->customer_wallet,2,'.',',');}}</span>

                    </div>
                    
                </a>
            @endif
        </li>
        <li >
            <a href="{{url('selectpaymentmethod/8/0')}}" >
                <h5 class="m-0  font-weight-bold align-self-center">เก็บเงินปลายทาง</h5>
                {{-- <div class="row">
                    <span class="font-weight-bold align-self-center mr-2" style="color:rgba(84, 84, 84, 1);">{{number_format($user->customer_wallet,2,'.',',');}}</span>

                </div> --}}
                
            </a>
        </li>




    </ul>



</div>
@endsection

@section('custom_script')
<script>
    bottom_now(1);
</script>
@endsection
