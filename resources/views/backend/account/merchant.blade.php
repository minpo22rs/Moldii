@extends('backend.layouts.master')
@section('css')
<style>
    .swal2-cancel {
        margin-right: 30px;
    }
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-users"></i>
            </div>
            <div class="d-inline-block">
                <h5>ร้านค้า</h5>
                <span>สถานะ: <label class="label label-primary">ระดับร้านค้า 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">บัญชีผู้ใช้</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">ร้านค้า</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-warning border-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="icofont icofont-close-line-circled"></i>
    </button>
    <strong>คำเตือน!</strong> กรุณากรอกข้อมูลให้ครบ
</div>
<div class="row">
    @foreach ($errors->all() as $message)
    <div class="col-sm-3">
        <div class="alert alert-danger border-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled"></i>
            </button>
            <strong>คำเตือน!</strong> {{ $message }}
        </div>
    </div>
    @endforeach
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="icon-btn">
            <button class="btn btn-success btn-outline-success btn-round" data-toggle="modal"
                data-target="#modal-add-product"><i class="icofont icofont-ui-add"></i>
                สร้างบัญชีร้านค้า</button>
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
                            <th style="text-align: center;">อีเมล</th>
                            <th style="text-align: center;">ชื่อ</th>

                            <th style="text-align: center;">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($merchant as $key => $item)
                        <tr>
                            <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-middle text-center">
                                <div class="img-round">
                                    <img src="{{asset('storage/app/merchant/'.$item->merchant_img.'')}}" alt="" class="img-fluid">
                                </div>
                            </td>
                            <td class="text-middle">
                                {{$item->merchant_email}}
                            </td>
                            <td class="text-center text-middle">{{$item->merchant_name}} {{$item->merchant_lname}}</td>
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_merchant({{$item->merchant_id}})"><i class="fa fa-edit"></i> เเก้ไข</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_merchant({{$item->merchant_id}})"><i class="icofont icofont-bin"></i> ลบ</a>
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
                <h4 class="modal-title">สร้างบัญชีร้านค้า</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/merchant')}}" method="POST" enctype="multipart/form-data" id="addmerchant" >
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพร้านค้า</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img[]" style="display: none;" id="adddocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> อัพโหลด</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="ชื่อเจ้าของร้านค้า...">
                                    @error('name')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="lname" class="form-control" placeholder="นามสกุลเจ้าของร้านค้า...">
                                    @error('lname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">อีเมล <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" name="email" class="form-control" placeholder="Email...">
                                    @error('email')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รหัสผ่าน <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน...">
                                    @error('password')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="phone" class="form-control" placeholder="เบอร์โทรศัพท์..." onkeyup="autoTab(this);">
                                    @error('password')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อร้านค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">

                                <div class="col-6">
                                    <input type="text" name="shopname" class="form-control" placeholder="ชื่อร้านค้า...">
                                    @error('shopname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="type" class="form-control" placeholder="ประเภทร้านค้า...">
                                    @error('shopname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ที่อยู่ร้านค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" name="address" class="form-control" placeholder="รายละเอียดที่อยู่...">
                                    @error('shopname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <br>


                                <div class="col-6">
                                    <select  class="form-control" name="province" id="province" onchange="getAmphure(this.value);" required>

                                        <option value="" >เลือกจังหวัด</option>
                                        @foreach($p as  $ps)
                                            <option value="{{$ps->id}}" >{{$ps->name_th}}</option>
                                        @endforeach

                                </select>
                                    @error('shopname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <select  class="form-control" name="district" id="county" onchange="getSubDistrict(this.value);" required>
                                        <option>เลือกเขต/อำเภอ</option>
                                    </select>
                                    @error('shopname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <br>
                                <br>
                                <div class="col-6">
                                    <select  class="form-control" name="tumbon" id="tumbon" onchange="getZipcode(this.value);" required>
                                        <option>เลือกแขวง/ตำบล</option>
                                    </select>
                                    @error('shopname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="รหัสไปรษณีย์..." readonly>
                                    @error('shopname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addmerchant">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<div id="result-modal"></div>

<form action="" method="post" id="delete_merchant">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();

    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

    function edit_merchant(id) {
        $.ajax({
            url: '{{ url('admin/merchant') }}/' + id + '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }

    function del_merchant(id) {
        var urlaction = '{{url('admin/merchant')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#delete_merchant").attr('action', urlaction);
                $("#delete_merchant").submit();
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

    function getAmphure(v){
        $.ajax({
            url: '{{ url("admin/getAmphure")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'v':v},
            success: function(data) {

                $('#county').html(data);

            }
        });

    }

    function getSubDistrict(v){
        $.ajax({
            url: '{{ url("admin/getSubDistrict")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'v':v},
            success: function(data) {

                $('#tumbon').html(data);

            }
        });

    }


    function getZipcode(v){
        $.ajax({
            url: '{{ url("admin/getZipcode")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'v':v},
            success: function(data) {
                document.getElementById('zip_code').value = data;
                // $('#zip_code').value(data);data

            }
        });

    }

    function autoTab(obj){
            /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
            หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
            4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
            รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
            หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
            ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
            */
                var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
                var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
                var returnText=new String("");
                var obj_l=obj.value.length;
                var obj_l2=obj_l-1;
                for(i=0;i<pattern.length;i++){
                    if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                        returnText+=obj.value+pattern_ex;
                        obj.value=returnText;
                    }
                }
                if(obj_l>=pattern.length){
                    obj.value=obj.value.substr(0,pattern.length);
                }
    }

</script>
@endsection
