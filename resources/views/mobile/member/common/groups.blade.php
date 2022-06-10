@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        Groups
    </div>
</div>
@endsection
@section('content')
<div class="mt-3 p-2 col-md-12">
<div class="row">

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="ใส่รูปภาพตรงนี้" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">ชื่อกลุ่ม 1 </h5>
        <p class="card-text">ข้อมูลรายละเอียดของกลุ่ม โดยระบุ ที่มา / จุดประสงค์ / หรือ ความต้องการของกลุ่ม </p>
        <button type="button" class="btn btn-primary btn-sm">เข้าร่วม</button>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="ใส่รูปภาพตรงนี้" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">ชื่อกลุ่ม 2</h5>
        <p class="card-text">ข้อมูลรายละเอียดของกลุ่ม โดยระบุ ที่มา / จุดประสงค์ / หรือ ความต้องการของกลุ่ม </p>
        <button type="button" class="btn btn-primary btn-sm">เข้าร่วม</button>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="ใส่รูปภาพตรงนี้" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">ชื่อกลุ่ม 3</h5>
        <p class="card-text">ข้อมูลรายละเอียดของกลุ่ม โดยระบุ ที่มา / จุดประสงค์ / หรือ ความต้องการของกลุ่ม </p>
        <button type="button" class="btn btn-primary btn-sm">เข้าร่วม</button>
      </div>
    </div>
  </div>
</div>

</div> <!-- div row -->
</div>

@endsection

@section('custom_script')
<script>
    bottom_now(1);

    imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
    }

</script>
@endsection