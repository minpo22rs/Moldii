<div class="modal fade" id="modaleditfs" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เเก้ไข Flash Sale</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/flashsale', $fs->fs_id)}}" method="POST" enctype="multipart/form-data" id="edit_fs">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">หน้าปก <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 357 x 205 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="file" name="editbanner[]" style="display: none;" id="editdocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('editdocument').click();">
                                        <i class="icofont icofont-image"></i> เปลี่ยนหน้าปก</button> 
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('storage/app/flashsale/'.$fs->fs_img.'')}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" placeholder="ชื่อ..." value="{{$fs->fs_name}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">เริ่มต้นลงทะเบียน <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        These day is Registeration of Merchants before deal start.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" name="regis_datestart" class="form-control datepicker" value="{{date('d/m/Y', strtotime($fs->fs_regis_start))}}" placeholder="เริ่มเมื่อ..." required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="regis_dateend" class="form-control datepicker" value="{{date('d/m/Y', strtotime($fs->fs_regis_end))}}" placeholder="จบเมื่อ..." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เนื้อหา </label>
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control" cols="30" rows="10">{{$fs->fs_content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">เริ่มเมื่อ <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        ดีลนี้จะเริ่มเมื่อ
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="datestart" class="form-control datepicker" value="{{date('d/m/Y', strtotime($fs->fs_datestart))}}" placeholder="เริ่มวันที่..." required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="dateend" class="form-control datepicker" value="{{date('d/m/Y', strtotime($fs->fs_dateend))}}" placeholder="สิ้นสุดวันที่..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ส่วนลดสูงสุด <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="maxsale" class="form-control" value="{{$fs->fs_maximum_sale}}" min="0" max="100" placeholder="ต่ำสุด = 0%, สูงสุด = 100%" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_fs">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>