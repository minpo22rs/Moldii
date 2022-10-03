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
                <h5>Store</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Store</a>
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
                        <th style="text-align: center;">ชือร้านค้า</th>
                        <th style="text-align: center;">ชื่อ-นามสกุล เจ้าของร้าน</th>
                        <th style="text-align: center;">เบอร์โทรศัพท์</th>
                      
                        <th style="text-align: center;">อีเมล</th>
         
                        <th style="text-align: center;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchant as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                        <td class="text-center text-middle">{{$item->merchant_shopname}}</td>
                        
                        <td class="text-center text-middle">{{ $item->merchant_name }} {{ $item->merchant_lname }}</td>
                        <td class="text-center text-middle">{{$item->merchant_phone}}</td>
                        <td class="text-center text-middle">{{$item->merchant_email}}</td>
                       
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="view_comment({{$item->merchant_id}})"><i class="icofont icofont-comment"></i>ดูรายละเอียด</a>
                                </div>
                                {{-- <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
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
                                            location.href='{{url('admin/confirmslip',$item->merchant_id)}}';
                                        } else{
                                            Swal.fire('Canceled', '', 'info')
                                        }
                                    })" class="dropdown-item waves-light waves-effect" ><i class="fa fa-edit"></i> ยืนยันหลักฐาน</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_content({{$item->merchant_id}})"><i class="icofont icofont-bin"></i> ปฎิเสธหลักฐาน</a>
                                </div> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="result-modalview"></div>


@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();



    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
  
    img.onclick = function(){
    
        modalImg.src = this.src;
        $('#myModal').modal('show');
        
    }

 

    function del_content(v){
        document.getElementById('oid').value = v;
        $('#rejectmodal').modal('show');
    }

    function view_comment(id) {
        $.ajax({
            url: '{{ url('admin/store_detail') }}/' + id ,
            type: 'GET',
            // data: {id: id},
        }).done(function (data) {
            $('#result-modalview').html(data);
            $("#viewmodal").modal('show');
        });
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
