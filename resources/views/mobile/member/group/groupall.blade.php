
@extends('mobile.main_layout.main')

@section('app_header')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.history.back();">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        รายการกลุ่มทั้งหมด
    </div>
    <div class="right"></div>
    
</div>
@endsection


@section('content')
<br>

    <div class="container p-1 my-3">
        <div class="col-12 row m-0 justify-content-center ">
         
            <a href="#" style="width: 50%;"  data-toggle="modal" data-target="#addmodal">
                <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                    <img class="imaged w-100 card-image-top mt-1" src="{{ asset('new_assets/img/brows.png')}}" alt="alt" style=" height:120px;">
                    <div class="card-body col-12 p-1 ">
                        <div class="row pl-1">
                            <h5 class=" font-weight-bolder m-0" data-toggle="modal" data-target="#addmodal">ขอเปิดกลุ่ม</h5>
                            {{-- <h5 class="font-weight-bolder m-0 ml-5">{{$groups->product_price}}</h5> --}}
                        </div>
                        
                    </div>
                </div>
            </a>
                @foreach($group as $groups)
                    <a href="{{url('groupid/'.$groups->id.'')}}" style="width: 50%;">
                        <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                            <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$groups->group_img.'')}}" alt="alt" style=" height:120px;">
                            <div class="card-body col-12 p-1 ">
                                <div class="row pl-1">
                                    <h5 class=" font-weight-bolder m-0">{{$groups->name}}</h5>
                                    {{-- <h5 class="font-weight-bolder m-0 ml-5">{{$groups->product_price}}</h5> --}}
                                </div>
                                
                            </div>
                        </div>
                    </a>
                @endforeach
            

        </div>

        <!-- align-self-center justify-content-center -->

    </div>

    <div class="modal" tabindex="-1" role="dialog" id="addmodal">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ขอเปิดกลุ่ม</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{url('opengroup')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body col-12">
                    
                        @csrf
                        <p>ชื่อกลุ่ม</p>
                        <input type="text" class="form-control" name="name" >
                        <br>
                        <p>ประเภทกลุ่ม</p>
                        <select name="type" class="form-control">
                            <option value="">กรุณาเลือก</option>
                            <option value="1">กลุ่มสาธารณะ</option>
                            <option value="2">กลุ่มส่วนตัว</option>
                        </select>
                        <br>
                        <p>รายละเอียด</p>
                        <textarea  class="form-control" name="reason" rows="5"></textarea>
                        <br>
                        รูปโปรไฟล์ :  <input accept="image/*" type='file' id="imgInp" name="img" accept="image/*;capture=camera">
                        <center><br><img id="blah" src="#" alt="" width ="80%"></center>
                        <br>
                        รูปหน้าปก :  <input accept="image/*" type='file' id="imgInps" name="imgc" accept="image/*;capture=camera">
                        <center><br><img id="blahs" src="#" alt="" width ="80%"></center>
                                        

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </form>

          </div>
        </div>
      </div>

@endsection
@section('custom_script')
        <script>

            bottom_now(4);


            var a = "{{Session::get('success')}}";
            if (a) {
                Swal.fire({
                    text : a,
                    confirmButtonColor: "#fc684b",
                })
            }


            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }

            imgInps.onchange = evt => {
                const [file] = imgInps.files
                if (file) {
                    blahs.src = URL.createObjectURL(file)
                }
            }

           

        </script>

       
@endsection
    
