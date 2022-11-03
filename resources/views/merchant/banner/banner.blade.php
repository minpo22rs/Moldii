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
        margin: 0 0 10px -30px !important;
    }
    .swal2-cancel {
        margin-right: 30px;
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
                <i class="icofont icofont-cubes"></i>
            </div>
            <div class="d-inline-block">
                <h5>แบนเนอร์</h5>
                <span>สถานะ: <label class="label label-primary">ร้านค้า</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="{{url('merchant/product')}}">สินค้า</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="icon-btn">
            <button class="btn btn-success btn-outline-success btn-round" data-toggle="modal"
                data-target="#modal-add-product"><i class="icofont icofont-ui-add"></i>
                เพิ่มแบนเนอร์</button>
        </div>
    </div>
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">รูปภาพ</th>
                            <th style="text-align: center;">ตำแหน่ง</th>
                            
                            <th style="text-align: center;">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $key => $item)
                        <tr>
                            <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-center text-middle">
                                <img src="{{asset('storage/app/merchant_banner/'.$item->banner_promote_img.'')}}" class="img-fluid" width="100" height="100">
                            </td>
                            <td class="text-center text-middle">{{$item->index_of}}</td>
                            
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="view_comment({{$item->id_banner_promote}})"><i class="icofont icofont-speech-comments"></i> ดูความคิดเห้น</a>
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_product({{$item->id_banner_promote}})"><i class="fa fa-edit"></i> แก้ไข</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_product({{$item->id_banner_promote}})"><i class="icofont icofont-bin"></i> ลบ</a>
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
</div>

<div class="modal fade" id="modal-add-product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มสินค้า</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('merchant/product')}}" method="POST" enctype="multipart/form-data" id="addproduct" onsubmit="return addproduct()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพสินค้า<span class="text-danger">*</span><br>(สามารถเลือกหลายๆรูปพร้อมกันได้)</label>
                        <div class="col-sm-7">
                            <input type="file" name="files[]" id="filer_input" multiple="multiple" required>
                        </div>                
                    </div>

                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพหน้าปก <span class="text-danger">*</span>
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">Cover <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด : 357 x 357 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="cover[]" style="display: none;" id="adddocument" required>
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> เพิ่มรูปภาพ</button> 
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" placeholder="ชื่อสินค้า..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รายละเอียด</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="รายละเอียดสินค้า เช่น สี วัสดุ ปีที่ผลิต แหล่งที่ผลิต ที่มาของสินค้า หรือรายละเอียดที่เกี่ยวข้องกับสินค้า..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ขนาดสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-form-label" >น้ำหนัก (กรัม)</label>
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
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ตัวเลือกเพิ่มเติม</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="ตัวเลือกเพิ่มเติม..." id="option">
                                        <span class="input-group-addon btn btn-primary" id="addoption">
                                            <span class="">เพิ่ม</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-control">
                                        <div id="resultappend_option"></div>
                                        <div id="resultinput_option"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">จำนวนสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="number" name="amount" class="form-control" placeholder="จำนวนสินค้า" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ราคาสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #2ed8b6;">ราคา</label>
                                </div>
                                {{-- <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #FF5370;">คะแนน</label>
                                </div> --}}
                                <div class="col-4">
                                    <label class="col-form-label" style="color: #FFB64D;">ราคาที่ลดแล้ว</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <input type="number" name="price" class="form-control form-control-success" placeholder="ราคา..." required>
                                </div>
                                {{-- <div class="col-4">
                                    <input type="number" name="gpoint" class="form-control form-control-danger" placeholder="คะแนน..." required>
                                </div> --}}
                                <div class="col-4">
                                    <input type="number" name="discount" class="form-control form-control-warning" placeholder="(optional)...">
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">แท็ก</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="แท็ก..." id="tag">
                                        <span class="input-group-addon btn btn-primary" id="addtags">
                                            <span class="">เพิ่ม</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-control">
                                        <div id="resultappend"></div>
                                        <div id="resultinput_tag"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">อัลบั้มรูปภาพ<span class="text-danger">*</span><br>(สามารถเลือกหลายๆรูปพร้อมกันได้)</label>
                        <div class="col-sm-7">
                            <input type="file" name="files[]" id="filer_input" multiple="multiple" required>
                        </div>                
                    </div> --}}
                   
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addproduct">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<div id="result-modal"></div>
<div id="result-modalview"></div>
<form action="" method="post" id="delete_product">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection



@section('js')

    @include('flash-message')
    <script>
      
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });

        var count_option = 1;
        $('#addoption').click(function () { 
            var optionname = $('#option').val();
            if (optionname != '') {
                $("#resultappend_option").append('<label class="label label-primary label-lg" id="option_'+count_option+'" data-numoption="'+count_option+'">'+
                ''+optionname+' <i class="icofont icofont-close pointer" onclick="del_option('+count_option+')"></i></label>'+
                '<input type="hidden" name="option[]" id="inputoption_'+count_option+'" value="'+optionname+'">')
                count_option++;
                optionname = $('#option').val('');
            }
        });

        function del_option(option_num) {
            $('#option_'+option_num).fadeOut();
            $('#inputoption_'+option_num).remove();
            count_option--;
        }

        var count_tag = 1;
        $('#addtags').click(function () { 
            if (count_tag <= 3) {
                var tagname = $('#tag').val();
                if (tagname != '') {
                    $("#resultappend").append('<label class="label label-primary label-lg" id="tag_'+count_tag+'" data-numtag="'+count_tag+'">'+
                    ''+tagname+' <i class="icofont icofont-close pointer" onclick="del_tag('+count_tag+')"></i></label>'+
                    '<input type="hidden" name="tag[]" id="inputtag_'+count_tag+'" value="'+tagname+'">')
                    count_tag++;
                    tagname = $('#tag').val('');
                }
            }
        });

        function del_tag(tag_num) {
            $('#tag_'+tag_num).fadeOut();
            $('#inputtag_'+tag_num).remove();
            count_tag--;
        }
        
        function edit_product(id) {
            $.ajax({
                url: '{{ url('merchant/product') }}/' + id + '/edit',
                type: 'GET',
                data: {id: id},
            }).done(function (data) {
                $('#result-modal').html(data);
                $("#editmodal").modal('show');
            });
        }

        function view_comment(id) {
            $.ajax({
                url: '{{ url('merchant/view_comment') }}/' + id + '/P',
                type: 'GET',
                data: {id: id},
            }).done(function (data) {
                $('#result-modalview').html(data);
                $("#viewmodal").modal('show');
            });
        }

        function del_product(id) {
            var urlaction = '{{url('merchant/product')}}' + '/' + id;
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณไม่สามารถกู้คืนได้อีก",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $("#delete_product").attr('action', urlaction);
                    $("#delete_product").submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Product has been Deleted',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Canceled',
                        'Product has been Saved',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection
