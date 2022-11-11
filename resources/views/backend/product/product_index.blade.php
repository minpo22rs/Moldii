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
        margin: 0 0 10px -30px !important;
    }
    .swal2-cancel {
        margin-right: 30px;
    }

    .pointer {cursor: pointer;}

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
                <h5>{{$category->cat_name}}</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">{{$category->cat_name}}</a>
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
               เพิ่มสินค้า</button>
        </div>
    </div>
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">รหัสสินค้า</th>
                            <th style="text-align: center;">รูปภาพหน้าปก</th>
                            <th style="text-align: center;">ชื่อสินค้า</th>
                            {{-- <th style="text-align: center;">Description</th> --}}
                            <th style="text-align: center;">ร้านค้า</th>
                            <th style="text-align: center;">ราคา</th>
                            <th style="text-align: center;">จำนวน</th>
                            <th style="text-align: center;">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $item)
                        <tr>
                            <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-center text-middle">{{$item->product_code}}</td>
                            <td class="text-center text-middle">
                                <img src="{{asset('storage/app/product_cover/'.$item->product_img.'')}}" alt="" width="50%" >
                            </td>
                            <td class="text-center text-middle">{{$item->product_name}}</td>
                            {{-- <td>{{ Str::limit($item->product_description, 50) }}</td> --}}
                            <td class="text-center text-middle">
                                @if ($item->Products_belong_Merchant != null)
                                {{$item->Products_belong_Merchant->merchant_name}} {{$item->Products_belong_Merchant->merchant_lname}}
                                @else
                                Admin
                                @endif
                            </td>
                            <td class="text-center text-middle">
                                <span style="color: #2ed8b6;">ราคา: </span>{{$item->product_price}} ฿<br>
                                {{-- <span style="color: #FF5370;">คะแนน:</span> {{$item->product_gpoint}} <br> --}}
                                <span style="color: #FFB64D;">ราคาที่ลดแล้ว:</span> {{$item->product_discount!=null?$item->product_discount.'฿':'-'}} 
                            </td>
                            <td class="text-center text-middle">{{$item->product_amount}}</td>
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_product({{$item->product_id}})"><i class="fa fa-edit"></i> แก้ไข</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_product({{$item->product_id}})"><i class="icofont icofont-bin"></i> ลบ</a>
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
            <form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data" id="addproduct" onsubmit="return addproduct()">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="category_id" value="{{$category->cat_id}}">
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
                                        รูปภาพขนาด: 357 x 357 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="cover[]" style="display: none;" id="adddocument">
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
                                    <input type="text" name="name" class="form-control" placeholder="ชื่อสินค้า...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รายละเอียด <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="รายละเอียดสินค้า เช่น สี วัสดุ ปีที่ผลิต แหล่งที่ผลิต ที่มาของสินค้า หรือรายละเอียดที่เกี่ยวข้องกับสินค้า..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">หมวดหมู่สินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($cat as $cats)
                                            <option value="{{$cats->cat_id}}">{{$cats->cat_name}}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="number" name="amount" class="form-control" placeholder="จำนวนสินค้า">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ราคาสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #2ed8b6;">ราคา </label>
                                </div>
                                {{-- <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #FF5370;">คะแนน </label>
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
                                    <input type="number" name="price" class="form-control form-control-success" placeholder="ราคา...">
                                </div>
                                {{-- <div class="col-4">
                                    <input type="number" name="gpoint" class="form-control form-control-danger" placeholder="คะแนน...">
                                </div> --}}
                                <div class="col-4">
                                    <input type="number" name="discount" class="form-control form-control-warning" placeholder="(optional)...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            บริการขนส่ง<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach($s as $sc)
                                    <div class="col-5 form-inline">
                                        <input type="checkbox" name="ship[]" value="{{$sc->id_shipping_company}}"><br><p class="mt-3 ml-1">{{$sc->name_company}}</p>

                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach($s as $sc)
                                    <div class="col-4">
                                        <input type="number" name="ship[{{$sc->id_shipping_company}}][]" class="form-control" placeholder="{{$sc->name_company}}..." required>
                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div> --}}
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

                    <br>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">อัลบั้มรูปภาพ (สามารถเลือกหลายๆรูปพร้อมกันได้)</label>
                        <div class="col-sm-7">
                            <input type="file" name="files[]" id="filer_input" multiple="multiple">
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
<form action="" method="post" id="delete_category">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();

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
            url: '{{ url('admin/product') }}/' + id + '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }

    function del_product(id) {
        var urlaction = '{{url('admin/product')}}' + '/' + id;
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
                $("#delete_category").attr('action', urlaction);
                $("#delete_category").submit();
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
    };
</script>
@endsection
