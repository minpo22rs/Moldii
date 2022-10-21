
@extends('merchant.layouts.master')
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
                <h5>การประมูล</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">หน้าเเรก</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">การประมูล</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 

	 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }

?>
<div class="card">
    <div class="card-header">
        <div class="icon-btn">
            <button class="btn btn-success btn-outline-success btn-round" data-toggle="modal"
                data-target="#modal-add-news"><i class="icofont icofont-ui-add"></i>
                สร้างการประมูล</button>
        </div>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="" class="table example1" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">เลขที่การประมูล</th>
         
                        <th style="text-align: center;">วันที่</th>
                        <th style="text-align: center;">เวลาเริ่มต้นสิ้นสุด</th>
                        <th style="text-align: center;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auction as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                        
                        <td class="text-center text-middle">{{ $item->code }}</td>
                        <td class="text-center text-middle">{{ $item->date_start }}</td>
                        <td class="text-center text-middle">{{ $item->time_start }}-{{ $item->time_finish }}</td>
                        
                        {{-- <td class="text-center text-middle">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}-{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td> --}}
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    
                                    @if(DateTimeDiff($item->date_start.$item->time_start,date('Y-m-d H:i:s')) < 0 )
                                        <a href="#" class="dropdown-item waves-light waves-effect"  onclick="edit_content({{$item->id_auction}})"><i class="fa fa-edit"></i> เเก้ไข</a>
                                    @endif
                                    
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="view_content({{$item->id_auction}})"><i class="icofont icofont-bin"></i> ดูรายละเอียด</a>
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


<div class="modal fade" id="modal-add-news" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">สร้างการประมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('merchant/addauction')}}" method="POST"  id="addnews" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    
                  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">วันที่ <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="datefrom" name="date_start" min="{{date("Y-m-d")}}" required>
                        </div>
                       
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เวลาเริ่มต้น <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timefrom" name="time_start" min="{{date("H:i")}}" required>
                        </div>
                        <label class="col-sm-2 col-form-label text-right">สิ้นสุด <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timeto" name="time_finish" required>
                        </div>
                    </div>

                    <div class="form-group row">
                       
                        <label class="col-sm-2 col-form-label">ราคาเริ่มต้น <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="price" required>
                        </div>

                        <label class="col-sm-2 col-form-label  text-right">บิทครั้งละ <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="bit" required>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                       
                        <label class="col-sm-2 col-form-label">ชื่อสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <label class="col-sm-2 col-form-label  text-right">หมวดหมู่สินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control" name="category_id">
                                <option value="">เลือกหมวดหมู่สินค้า</option>
                                @foreach($cat as $cats)
                                    <option value="{{$cats->cat_id}}">{{$cats->cat_name}}</option>

                                @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รายละเอียด <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="รายละเอียดสินค้า เช่น สี วัสดุ ปีที่ผลิต แหล่งที่ผลิต ที่มาของสินค้า หรือรายละเอียดที่เกี่ยวข้องกับสินค้า..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ขนาดสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-form-label" >น้ำหนักหนัก (กรัม)</label>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label" >ความกว้าง(เซนติเมตร)</label>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label" >ความยาว (เซนติเมตร)</label>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label" >ความสูง (เซนติเมตร)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="weight" class="form-control" placeholder="น้ำหนัก..." required>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="width" class="form-control" placeholder="ความกว้าง..." required>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="length" class="form-control" placeholder="ความยาว..." required>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="height" class="form-control" placeholder="ความสูง..." required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพสินค้า<span class="text-danger">*</span><br>(สามารถเลือกหลายๆรูปพร้อมกันได้)</label>
                        <div class="col-sm-7">
                            <input type="file" name="files[]" id="filer_input" multiple="multiple" required>
                        </div>                
                    </div>

                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" form="addnews">ยืนยัน</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<div id="result-modal"></div>
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

    var chk =0;


    $('#timeto').change(function(){
        from =   $('#timefrom').val();
        to    =  $(this).val();

        if(to <= from){
            
            alert('ตั้งค่าเวลาสิ้นสุดให้มากกว่าเวลาเริ่มต้น');
            $(this).val('');
        }else{
          
        }

    });

    function view_content(id) {
        $.ajax({
            url: '{{ url('merchant/detailauction') }}/' + id,
            type: 'GET',
           
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#detailauction").modal('show');
        });
    }
 

    function edit_content(id) {
        $.ajax({
            url: '{{ url('merchant/editauction') }}/' + id,
            type: 'GET',
           
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }


    // function del_content(id) {
    //     var urlaction = '{{url('admin/auction')}}' + '/' + id;
    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //             confirmButton: 'btn btn-primary',
    //             cancelButton: 'btn btn-danger'
    //         },
    //         buttonsStyling: false
    //     })
    //     swalWithBootstrapButtons.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Submit',
    //         cancelButtonText: 'Cancel',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.value) {
    //             $("#delete_content").attr('action', urlaction);
    //             $("#delete_content").submit();
    //             swalWithBootstrapButtons.fire(
    //                 'Deleted!',
    //                 'Content has been Deleted',
    //                 'success'
    //             )
    //         } else if (
    //             /* Read more about handling dismissals below */
    //             result.dismiss === Swal.DismissReason.cancel
    //         ) {
    //             swalWithBootstrapButtons.fire(
    //                 'Canceled',
    //                 'Content has been Saved',
    //                 'error'
    //             )
    //         }
    //     })
    // };
</script>
@endsection
