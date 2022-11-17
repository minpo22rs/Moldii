@extends('mobile.main_layout.main')
@section('app_header')
<style>
    .button {
        box-shadow: 0 5px 5px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        background-color: #dee2e64f
    }

    .button:hover {background-color: #dee2e6}

   
</style>
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        เลือกโค้ดส่วนลด
    </div>
</div>
@endsection
@section('content')
<br>
        @foreach($sql as $sqls)
            
            <a href="{{url('selectcode/'.$sqls->voucher_id.'/'.$ship.'')}}">
                <div class=" p-2 col-12  border-bottom " >
                    <div class="row">
                        <div class="col-6 m-0 text-left">
                            <h5 class="font-weight-bold">{{$sqls->voucher_name}}</h5>
                        </div>
                        <div class="col-6 m-0 text-right">
                            <h5 class="font-weight-bold">ลด {{$sqls->voucher_value}} {{$sqls->voucher_unit}}</h5>

                        </div>
                    </div>
                    <div class="row col-12 p-0 m-0">
                        {{-- <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br> --}}
                        <div class="text-start col-10">
                            <h5 class="m-0 ">รายละเอียด <br><br> {{$sqls->voucher_note}} </h5>
                        </div>

                        @if(Session::get('idcode') != null && Session::get('idcode') == $sqls->voucher_id)

                            <img src="{{asset('new_assets/img/icon/check.svg')}}" style="width:1.1rem; height:1.1rem;" class="col-1 p-0 align-self-center ml-2">
                        @endif


                    </div>
                </div>
            </a>
        @endforeach
        @if(Session::get('idcode') != null)
            <br>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <a href="{{url('selectcode/0/'.$ship.'')}}">
                        <button class="btn btn-warning"> ยกเลิกการใช้โค้ดส่วนลด</button>
                    </a>

                </div>
                <div class="col-4"></div>
            </div>
        @endif
        



@endsection

@section('custom_script')
<script>
    bottom_now(3);
</script>
@endsection