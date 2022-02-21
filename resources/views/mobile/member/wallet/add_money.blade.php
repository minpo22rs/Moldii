@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        เติมเงิน
    </div>
</div>
@endsection
@section('content')
<div class="container m-0 p-0">
    <div class="col-12 p-2 border-bottom">
        <div class="col-12 mx-0 align-self-center row p-0">
            <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">Bank Account</h4>
        </div>
        <div class="" style="box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.2);border-radius: 10px;">
            <a href="{{url('user/addCreditCard')}}" class="row  col-12 pl-2 p-1 my-3 mx-0  brd-10" style="height:2.8125rem;">
                <div class="text-start col-11 p-0  mr-1 row  align-self-center">
                    <img src="{{asset('new_assets/img/icon/logo_bank/logo_K_PLUS.svg')}}" style="width:2rem; " class=" p-0 mr-1 align-self-center">
                    <h4 class="m-0 font-weight-bold align-self-center">K PLUS</h4>


                </div>

                <img src="{{asset('new_assets/img/icon/plus_2.svg')}}" style="width:1.48rem; height:1.48rem;" class="col-1 p-0 align-self-center"><br>



            </a>
        </div>
    </div>
    <a href="{{url('user/Top_upWallet')}}" class="col-12 mx-0 p-2 align-self-center border-bottom row ">
        <h4 class="m-0  font-weight-bold" style="color:rgba(84, 84, 84, 1);">Top-up wallet</h4>
    </a>
    <a href="{{url('user/bankAccount')}}" class="row py-2  pl-2 border-bottom" style="color:black; font-size:18px">
        <div class="col-6 mx-0 pl-0 align-self-center row">
            <img class="mx-2" src="{{ asset('new_assets/img/icon/$phone.svg')}}" alt="alt" >

            <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">Bank Account</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                

                <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
            </div>
        </div>
    </a>


</div>
@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection