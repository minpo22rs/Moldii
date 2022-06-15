<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไข ผู้ดูแล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/admin', $employee->admin_id)}}" method="POST" enctype="multipart/form-data" id="edit_banner">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปประจำตัว</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="editimg[]" style="display: none;" id="editdocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('editdocument').click();">
                                        <i class="icofont icofont-image"></i> เปลี่ยนรูปภาพ</button> 
                                </div>
                                <div class="col-6">
                                    <img src="{{asset('storage/app/profile/'.$employee->admin_img.'')}}" alt="" class="img-fluid"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="ชื่อ ..." value="{{$employee->admin_name}}">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="lname" class="form-control" placeholder="นามสกุล ..." value="{{$employee->admin_lname}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">วันเกิด</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" name="birthday" class="form-control datepicker" placeholder="เลือกวัน ..." value="{{date('d/m/Y', strtotime($employee->admin_birthday))}}" autocomplete="off">
                                </div>
                                <div class="col-2">
                                    <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์ </label>
                                </div>
                                <div class="col-5">
                                    <input type="text" name="phone" class="form-control datepicker" placeholder="เบอร์โทรศัพท์..." value="{{$employee->admin_phone}}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เพศ </label>
                        <div class="col-sm-10">
                            <div class="form-radio m-b-30">
                                <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                        <input type="radio" name="gender" value="M" {{$employee->admin_gender == 'M' ? 'checked="checked"' : ''}}>
                                        <i class="helper"></i>ชาย
                                    </label>
                                </div>
                                <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                        <input type="radio" name="gender" value="F" {{$employee->admin_gender == 'F' ? 'checked="checked"' : ''}}>
                                        <i class="helper"></i>หญิง
                                    </label>
                                </div>
                                <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                        <input type="radio" name="gender" value="T" {{$employee->admin_gender == 'T' ? 'checked="checked"' : ''}}>
                                        <i class="helper"></i>ไม่ระบุ
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">อีเมล <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="email" class="form-control" placeholder="อีเมล ..." required value="{{$employee->admin_email}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รหัสผ่าน <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน..." autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_banner">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>