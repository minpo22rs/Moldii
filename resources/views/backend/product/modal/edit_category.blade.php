<div class="modal fade" id="modaleditcategory" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขหมวดหมู่</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/category', $category->cat_id)}}" method="POST" enctype="multipart/form-data" id="edit_category">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">รูปภาพปก <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 57 x 57 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="cover[]" style="display:none; " id="adddocument{{$category->cat_id}}">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument{{$category->cat_id}}').click();">
                                        <i class="icofont icofont-image"></i> เปลี่ยนรูปภาพปก</button> 
                                </div>
                                <div class="col-6">
                                    <img src="{{asset('storage/app/category_cover/'.$category->cat_img.'')}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อหมวดหมู่</label>
                        <div class="col-sm-10">
                           <input type="text" name="name" class="form-control" placeholder="Category Name..." value="{{$category->cat_name}}">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รหัสหมวดหมู่</label>
                        <div class="col-sm-4">
                           <input type="text" name="code" class="form-control" placeholder="Category Code..." value="{{$category->cat_code}}">
                        </div>
                    </div> --}}
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_category">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>