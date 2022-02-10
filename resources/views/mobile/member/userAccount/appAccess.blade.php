@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        
        การเข้าถึงของแอป
    </div>
</div>
@endsection
@section('content')

<div class="col-12 mx-0 mt-3 py-2 px-3 border-top border-bottom align-self-center justify-content-between row ">
    <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">อนุณาติให้ MTW เข้าถึงตำแหน่งของคุณ</h5>

    <div class="custom-control custom-switch  ">
        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
        <label class="custom-control-label" for="customSwitch1"></label>
    </div>
    
</div>
<h6 class="my-1 ml-2"><small style="color:rgba(181, 181, 181, 1);">เปิดอนุญาติเพื่อให้เราสามารถค้นหาสินค้าใกล้คุณได้</small> </h6>

<div class="col-12 mx-0 mt-3 py-2 px-3 border-top border-bottom align-self-center justify-content-between row ">
    <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">อนุญาติให้ MTW เข้าถึงรายชื่อ</h5>

    <div class="custom-control custom-switch  ">
        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
        <label class="custom-control-label" for="customSwitch1"></label>
    </div>
    
</div>
<h6 class="my-1 ml-2"><small style="color:rgba(181, 181, 181, 1);">เปิดอนุญาติเพื่อให้คุณสามารถเชื่อมต่อกับเพื่อนที่ใช้งาน MTW</small> </h6>

<div class="col-12 mx-0 mt-3 py-2 px-3 border-top border-bottom align-self-center justify-content-between row ">
    <h5 class="m-0  font-weight-bold align-self-center" style="color:rgba(84, 84, 84, 1);">อนุญาติให้ MTW เข้าถึงอัลบั้มรูปภาพ</h5>

    <div class="custom-control custom-switch  ">
        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
        <label class="custom-control-label" for="customSwitch1"></label>
    </div>
    
</div>
<h6 class="my-1 ml-2"><small style="color:rgba(181, 181, 181, 1);">เปิดอนุญาติเพื่อให้คุณสามารถอัปโหลดรูปภาพจากเครื่องของคุณลงในรีวิวสินค้าได้</small> </h6>





@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection