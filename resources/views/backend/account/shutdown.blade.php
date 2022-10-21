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
                <h5>คำขอปิดบัญชีลูกค้า</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">คำขอปิดบัญชีลูกค้า</a>
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
                        <th style="text-align: center;">ชือผู้ใช้</th>
                        <th style="text-align: center;">ชือลูกค้า</th>
                        <th style="text-align: center;">เหตุผลที่ขอปิดบัญชี</th>
         
                        <th style="text-align: center;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                        <td class="text-center text-middle">{{$item->customer_username}}</td>
                        
                        <td class="text-center text-middle">{{ $item->customer_name }} {{ $item->customer_lname }}</td>
                        <td class="text-center text-middle">{{$item->reason}}</td>
                       
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                {{-- <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="#" class="dropdown-item waves-light waves-effect" ><i class="icofont icofont-check-alt" style="color: green"></i>อนุมัติ</a>
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="view_comment({{$item->id_shutdown}})"><i class="icofont icofont-close" style="color: red"></i>ไม่อนุมัติ</a>
                                </div> --}}
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="javascript:"
                                    onclick="Swal.fire({
                                    title: 'ยืนยันการปิดบัญชีผู้ใช้นี้ใช่หรือไม่',
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonColor: '#377dff',
                                    cancelButtonColor: '#363636',
                                    confirmButtonText: `Yes`,
                                    denyButtonText: `No`,
                                    }).then((result) => {
                                        if (result.value) {
                                            location.href='{{url('admin/confirmshutdown',$item->id_shutdown)}}';
                                        } else{
                                            Swal.fire('Canceled', '', 'info')
                                        }
                                    })" class="dropdown-item waves-light waves-effect" ><i class="icofont icofont-check-alt" style="color: green"></i> อนุมัติ</a>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="shut({{$item->id_shutdown}})"><i class="icofont icofont-close" style="color: red"></i>ไม่อนุมัติ</a>

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

<div class="modal" tabindex="-1" role="dialog" id="reject">
    <form action="{{url('admin/rejectshutdown')}}" method="POST">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">เหตุผลที่ไม่อนุมัติการปิดบัญชี</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    @csrf
                    เหตุผล : <input type="text" class="form-control" name="reply">
                    <input type="hidden" id="ids" name="ids">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </div>
    </form>

  </div>


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

    function shut(id) {
        document.getElementById('ids').value = id;
        $('#reject').modal('show');
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
