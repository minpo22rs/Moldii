@extends('backend.layouts.master')
@section('css')
<style>
    .swal2-container {
        z-index: 99999999999 !important;
    }

    .mytooltip .tooltip-item2 {
        color: #ff9d10;
    }
    .tooltip-content4 {
        background-color: #2b2b2b;
        color: white;
        border-bottom: 40px solid #ff9d10;
        margin: 0 0 10px -50px !important;
    }
    .select2-container {    
        z-index: 999999999999;
    }
    .select2-dropdown .select2-dropdown--below {
        z-index: 9999999999999;
    }
    .select2-search__field {
        z-index: 99999999999999;
    }
    .swal2-cancel {
        margin-right: 30px;
    }
    .modal-xl{
        max-width:1200px;
    }

    @media only screen and (max-width: 480px) {
        .mytooltip .tooltip-content4 {
            margin: 0 0 10px -50px !important;
        }
    }


</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-ui-note"></i>
            </div>
            <div class="d-inline-block">
                <h5>Tranfer</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Tranfer</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
   
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="" class="table example1" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">รหัสออเดอร์</th>
                        <th style="text-align: center;">ชื่อผู้แจ้งชำระเงิน</th>
                        <th style="text-align: center;">ชื่อผู้โอนเงิน</th>
                      
                        <th style="text-align: center;">รูปภาพ</th>
         
                        <th style="text-align: center;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sql as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                        <td class="text-center text-middle">{{$item->id_order}}</td>
                        
                        <td class="text-center text-middle">{{ $item->customer_name }} {{ $item->customer_lname }}</td>
                        <td class="text-center text-middle">{{$item->name}}</td>
                        <td class="text-center text-middle"><img id="myImg" src="{{('https://modii.sapapps.work/storage/app/public/payment/'.$item->file.'')}}" alt="Snow" style="width:100%;max-width:300px"></td>
                       
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="javascript:"
                                    onclick="Swal.fire({
                                    title: 'ยืนยันหลักฐานถูกต้องใช่หรือไม่',
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonColor: '#377dff',
                                    cancelButtonColor: '#363636',
                                    confirmButtonText: `Yes`,
                                    denyButtonText: `No`,
                                    }).then((result) => {
                                        if (result.value) {
                                            location.href='{{url('admin/confirmslip',$item->id_tranfer)}}';
                                        } else{
                                            Swal.fire('Canceled', '', 'info')
                                        }
                                    })" class="dropdown-item waves-light waves-effect" ><i class="fa fa-edit"></i> ยืนยันหลักฐาน</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_content({{$item->id_tranfer}})"><i class="icofont icofont-bin"></i> ปฎิเสธหลักฐาน</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

{{-- <div class="modal fade" id="modal-add-news" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Group</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/addgroup')}}" method="POST" enctype="multipart/form-data" id="addnews" onsubmit="return news()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                     
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img[]" style="display: none;" id="adddocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> Add Image</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Group Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Name..." name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Write Something..." required ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label">Type Group</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control col-sm-12" name="type_group">
                                        <option value="">Please Select</option>
                                        <option value="1">Model</option>
                                        <option value="2">Game</option>
                                        <option value="3">Music</option>
                                        <option value="4">Food</option>
                                        <option value="5">News</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addnews">Submit</button>
            </div>
        </div>
    </div>
</div> --}}
<div class="modal fade" id="rejectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{url('admin/rejectslip')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ปฎิเสธหลักฐาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                    <input type="hidden" name="oid" id="oid">
                    หมายเหตุ : <br><br><input type="text" name="reason" class="form-control" required>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
            </div>
        </form>
      </div>
    </div>
</div>

<div id="result-modalview"></div>
<form action="" method="post" id="delete_content">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();

    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }


    function del_content(v){
        document.getElementById('oid').value = v;
        $('#rejectmodal').modal('show');
    }



    // $(document).ready(function () {
    //     $('.published').change(function () { 
    //         var id = $(this).val();
    //         $.ajax({
    //             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //             type: 'post',
    //             url: '{{ url('admin/publishedgroup') }}/' + id,
    //             data: {id: id},
    //             success: function (response) {
                    
    //             }
    //         });
    //     });
    // });

   
</script>
@endsection
