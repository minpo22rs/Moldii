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
                        <th style="text-align: center;">สร้างการประมูลโดย</th>
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
                        


                        @if( $item->created_by == 0)
                            <td class="text-center text-middle">Admin</td>
                        @else
                            <?php $sql = DB::Table('tb_merchants')->where('merchant_id',$item->created_by)->first();?>
                            <td class="text-center text-middle">{{ $sql->merchant_shopname }}</td>
                        @endif


                        <td class="text-center text-middle">{{ $item->product_name }}</td>
                        <td class="text-center text-middle">{{ $item->date_start }}</td>
                        <td class="text-center text-middle">{{ $item->time_start }}-{{ $item->time_finish }}</td>
                        
                        {{-- <td class="text-center text-middle">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}-{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td> --}}
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    
                                    @if(DateTimeDiff($item->date_start.$item->time_start,date('Y-m-d H:i:s')) < 0 && $item->created_by == 0)
                                        <a href="#" class="dropdown-item waves-light waves-effect"  onclick="edit_content({{$item->id_auction}})"><i class="fa fa-edit"></i> เเก้ไข</a>
                                    @endif
                                    
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="view_content({{$item->id_auction}},{{$item->created_by}})"><i class="icofont icofont-bin"></i> ดูรายละเอียด</a>
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
            <form action="{{url('admin/addauction')}}" method="POST"  id="addnews">
                @csrf
                <div class="modal-body">
                    
                  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">วันที่</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="datefrom" name="date_start" min="{{date("Y-m-d")}}" required>
                        </div>
                       
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เวลาเริ่มต้น</label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timefrom" name="time_start" min="{{date("H:i")}}" required>
                        </div>
                        <label class="col-sm-2 col-form-label text-right">สิ้นสุด</label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timeto" name="time_finish" required>
                        </div>
                    </div>

                    <div class="form-group row">
                       
                        <label class="col-sm-2 col-form-label">ราคาเริ่มต้น</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="price" required>
                        </div>

                        <label class="col-sm-2 col-form-label  text-right">บิทครั้งละ</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="bit" required>
                        </div>
                        
                    </div>
                    

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">เลือกรายการสินค้าที่จะเข้าร่วม</label>
                        
                    </div>

                    <div class="form-group row">
                        {{-- <label class="col-sm-3 col-form-label">รายการสินค้า</label> --}}
                        @foreach($product as $products)
                                <div class="col-sm-3 form-inline">
                                    <input type="checkbox" class="form-control" name="pid[]" value="{{$products->product_id}}" style="margin-right: 5px;margin-top;5px">  {{$products->product_name}}
                                </div>
                        @endforeach
                    </div>

                    
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addnews">ยืนยัน</button>
            </div>
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

    function view_content(id,t) {
        $.ajax({
            url: '{{ url('admin/detailauction') }}/' + id+'/'+t,
            type: 'GET',
           
        }).done(function (data) {
            $('#result-modal').html(data);
            if(t == 0){
                $("#detailauction").modal('show');

            }else{
                $("#detailauctionmerchant").modal('show');
                
            }
        });
    }
 

    function edit_content(id) {
        $.ajax({
            url: '{{ url('admin/editauction') }}/' + id,
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
