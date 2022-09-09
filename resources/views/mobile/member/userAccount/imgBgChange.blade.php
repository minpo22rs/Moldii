@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ภาพพื้นหลัง
    </div>
</div>
@endsection
@section('content')
<div class="mt-3 p-2 col-12">

    <form runat="server">
        <input accept="image/*" type='file' id="imgInp"  name="imgProfileChange">
        <center><br><img id="blah" src="#" alt="" width ="80%"></center>
        <button type="submit" class="btn btn-success col-12 mt-4" style="font-size:1.3rem;">บันทึก</button>
    </form>
    </div>

@endsection

@section('custom_script')
<script>
    bottom_now(7);

    imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
    }

</script>
@endsection