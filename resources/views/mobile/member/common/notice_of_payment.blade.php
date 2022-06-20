@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        หน้าแจ้งชำระเงิน
    </div>
</div>
@endsection
@section('content')
<div class="mt-3 p-2 col-md-12">

    <form runat="server">
        <input type="text" name="oid" placeholder="หมายเลขอ้างอิง" class="form-control"><br>
        <input type="text" name="oid" placeholder="ชื่อ-นามสกุล ของบัญชีที่ใช้ทำการโอนเงิน" class="form-control">
        <br>
        แนบสลิป :  <input accept="image/*" type='file' id="imgInp" name="imgProfileChange" accept="image/*;capture=camera">
        <center><br><img id="blah" src="#" alt="" width ="80%"></center>
        <button type="submit" class="btn btn-success col-12 mt-4" style="font-size:1.3rem;">ยันยันการชำระเงิน</button>
        <a href="#"><button type="button" class="btn btn-danger col-12 mt-2" style="font-size:1.3rem;">ยกเลิก</button></a> <!-- ให้ลิงค์กลับมาหน้าเดิม คล้ายการทำ  Reset -->
    </form>

</div>

@endsection

@section('custom_script')
<script>
    bottom_now(4);

    imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
    }

</script>
@endsection