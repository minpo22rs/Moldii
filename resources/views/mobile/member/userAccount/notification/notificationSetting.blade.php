@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ตั้งค่าการแจ้งเตือน
    </div>
</div>
@endsection
@section('content')

    <div class="col-12 mx-0 mt-3 py-2 px-3 border-top border-bottom align-self-center justify-content-between row ">
        <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">การแจ้งเตือน</h5>

        <div class="custom-control custom-switch  ">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
            <label class="custom-control-label" for="customSwitch1"></label>
        </div>
    </div>




@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection