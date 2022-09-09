<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เเก้ไขกลุ่ม</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/familys', $Family->id)}}" method="POST" enctype="multipart/form-data" id="edit_new">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพโปรไฟล์ </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-5">
                                    <input type="file" name="editnew[]" style="display: none;" id="editdocument{{$Family->id}}">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('editdocument{{$Family->id}}').click();">
                                        <i class="icofont icofont-image"></i> เปลี่ยนรูป</button> 
                                </div>
                                <div class="col-5">
                                    <img class="img-fluid" src="{{asset('storage/app/group_cover/'.$Family->group_img.'')}}" alt="" width="auto" height="auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพหน้าปก </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-5">
                                    <input type="file" name="editnews[]" style="display: none;" id="editdocuments{{$Family->id}}">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('editdocuments{{$Family->id}}').click();">
                                        <i class="icofont icofont-image"></i> เปลี่ยนรูป</button> 
                                </div>
                                <div class="col-5">
                                    <img class="img-fluid" src="{{asset('storage/app/group_cover/'.$Family->group_cover.'')}}" alt="" width="auto" height="auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="หัวข้อ..." value="{{$Family->name}}" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รายละเอียด</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="เขียนบางอย่าง...">{{$Family->description}}</textarea>
                        </div>
                    </div>
                    {{-- <div class="form-group row">

                        <label class="col-sm-2 col-form-label">กลุ่มประเภท</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control col-sm-12" name="type_group">
                                        <option value="1">โปรดเลือก</option>
                                        <option value="1" {{$Family->type_group==1?'selected':''}}>Model</option>
                                        <option value="2" {{$Family->type_group==2?'selected':''}}>Game</option>
                                        <option value="2" {{$Family->type_group==3?'selected':''}}>Music</option>
                                        <option value="2" {{$Family->type_group==4?'selected':''}}>Food</option>
                                        <option value="2" {{$Family->type_group==5?'selected':''}}>News</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                    
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_new">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<script>
   
</script>