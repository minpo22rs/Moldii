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
    <div class="col-12 p-2">
        <div class="a-shadow">
            <a href="{{url('user/addCreditCard')}}" class="row  col-12 pl-2 p-1 my-4 mx-0  brd-10" style="height:2.8125rem;">
                <div class="text-start col-11  mr-1 row  align-self-center">
                    <h5 class="m-0 font-weight-bold">K PLUS</h5>
                    

                </div>

                <img src="{{asset('new_assets/img/icon/plus_2.svg')}}" style="width:1.48rem; height:1.48rem;" class="col-1 p-0 align-self-center"><br>



            </a>
        </div>
    </div>

</div>
@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection